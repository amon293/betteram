<?php

namespace App\Console\Commands;

use App\Models\Airport;
use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Psr7\Response;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ImportAirports extends Command
{
    protected $signature = 'import:wac';
    protected $description = 'Import the airports from https://www.world-airport-codes.com/';
    protected $numAirports = 0;
    public $promises = [];

    // Links from site to list airports by country
    protected $numImportErrors = 0;
    private $base = 'https://www.world-airport-codes.com';
    /**
     * Remapping keys on database key name
     *
     * @var array
     */
    private $keys = [
        'iata_code' => 'iata',
        'icao_code' => 'icao',
        'faa_code' => 'faa',
        'time_zone' => 'timezone'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->line("Start to import airports from {$this->base}");
        $this->line("Start time: " . date("Y-m-d H:i:s"));

        $this->search();

        $this->info("{$this->numAirports} airports imported");

//        if ($this->numImportErrors > 0)
//            $this->error("See the error log for more info");

        $this->line("End time: " . date("Y-m-d H:i:s"));
    }

    protected function search()
    {
        $client = new Client();
        $pool = [];

        foreach (range('a', 'z') as $letter) {

            $promise = $client->getAsync(
                "https://www.world-airport-codes.com/alphabetical/country-name/{$letter}.html"
            );

            $promise->then(function ($response) {

                $crawler = new Crawler($response->getBody()->getContents());

                $nodes = $crawler->filter(
                    "table[class='responsive'] tr[class='table-link'] th a"
                );

                $client = new Client(['base_uri' => $this->base]);

                $nodes->each(function (Crawler $node) use ($client) {

                    $promise = $client->getAsync($node->attr('href'));

                    $promise->then(function ($response) {
                        $this->makeAirport($response);
                    });

                    array_push($this->promises, $promise);

                });

                $results = Promise\settle($this->promises)->wait();

            });

            array_push($pool, $promise);

        }

        $results = Promise\settle($pool)->wait();

    }

    protected function makeAirport(Response $response) : Airport
    {

        $crawler = new Crawler($response->getBody()->getContents());

        $nodes = $crawler->filter(
            "div[class='small-12 medium-6 columns']"
        );

        $data = array_collapse($nodes->filter('span[data-key]')->each(function (Crawler $node) {
            return [
                $this->normalizeCase($node->attr('data-key')) => $node->text()
            ];
        }));

        $address = explode(',', $this->clean($crawler->filter("p[class='subheader']")->text()));

        $extra = [
            'name' => $this->clean($crawler->filter("h1[class='airport-title']")->text()),
            'city' => $this->clean($address[0]),
            'country' => $this->clean($address[1])
        ];

        $this->numAirports++;

        return (new Airport())->create(
            $this->remap(array_merge($extra, $data))
        );

    }

    /**
     * Transform UPPERCASE String -> uppercase_string
     *
     * @param string $phrase
     * @return string
     */
    private function normalizeCase(string $phrase) : string
    {
        return snake_case(camel_case(strtolower($phrase)));
    }

    /**
     * Clean excess of white space in string
     *
     * @param string $string
     * @return string
     */
    private function clean(string $string) : string
    {
        return str_replace('  ', ' ', preg_replace('/\s+/', ' ', trim($string)));
    }

    /**
     * Remap Keys with desired keys uglyKeyName => prettier_key
     *
     * @param array $data
     * @return array
     */
    private function remap(array $data) : array
    {
        return collect($data)->keyBy(function ($value, $key) {
            return $this->keys[$key] ?? $key;
        })->toArray();
    }

}
