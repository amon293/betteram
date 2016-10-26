<?php

namespace App\Console\Commands;

use App\Models\Airport;
use Illuminate\Console\Command;

class ImportAirports extends Command
{
    protected $signature = 'import:wac';
    protected $description = 'Import the airports from https://www.world-airport-codes.com/';

    // Links from site to list airports by country
    protected $links = [
        'https://www.world-airport-codes.com/alphabetical/country-name/a.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/b.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/c.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/d.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/e.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/f.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/g.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/h.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/i.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/j.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/k.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/l.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/m.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/n.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/o.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/p.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/q.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/r.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/s.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/t.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/u.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/v.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/x.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/w.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/y.html',
        'https://www.world-airport-codes.com/alphabetical/country-name/z.html'
    ];

    protected $numAirports = 0;
    protected $numImportErrors = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->line("Start to import airports from https://www.world-airport-codes.com/");
        $this->line("Start time: " . date("Y-m-d H:i:s"));
        $this->search();
        $this->info($this->numAirports . " found");
        $this->info(($this->numAirports - $this->numImportErrors) . " airports imported");

        if ($this->numImportErrors>0)
            $this->error("See the error log for more info");

        $this->line("End time: " . date("Y-m-d H:i:s"));
    }

    protected function search()
    {
        foreach ($this->links as $link) {

            try {
                $dom = new \DOMDocument();
                $dom->loadHTMLFile($link);
                $dom->preserveWhiteSpace = false;

                $xPath = new \DOMXPath($dom);
                $nodes = $xPath->query("//table[@class='responsive']//tr[@class='table-link']//th//a");
            } catch (\Exception $e) {
                $this->error($e->getMessage());
                $this->numImportErrors++;
                continue;
            }

            foreach ($nodes as $node) {
                try {
                    $page = "https://www.world-airport-codes.com" . $node->getAttribute('href');
                    $airport = $this->makeAirport($page);

                    $airport->save();

                    $this->numAirports++;
                } catch (\Exception $e) {
                    $this->error($e->getMessage());
                    $this->numImportErrors++;
                    continue;
                }
            }
        }
    }

    protected function makeAirport($page) : Airport
    {

        $dom = new DOMDocument();
        $dom->loadHTMLFile($page);
        $dom->preserveWhiteSpace = false;

        $xPath = new DOMXPath($dom);

        $runways = 0;
        $elements = $xPath->query("//div[@class='small-12 medium-6 columns']");
        foreach ($elements as $element) {
            if (strstr($element->nodeValue, 'Runway')) {
                $runways++;
            }
        }

        $airPortName = trim($xPath->query("//h1[@class='airport-title']")[0]->nodeValue);

        $cityCountry = explode(',', trim($xPath->query("//p[@class='subheader']")[0]->nodeValue));
        $airPortCity = trim($cityCountry[0]) ?? "";
        $airPortCountry = trim($cityCountry[1]) ?? "";

        $airport = array(
            'name' => $airPortName,
            'city' => $airPortCity,
            'country' => $airPortCountry,
            'iata' => $xPath->query("//span[@data-key='IATA Code']")[0]->getAttribute('data-value'),
            'icaoCode' => $xPath->query("//span[@data-key='ICAO Code']")[0]->getAttribute('data-value'),
            'faaCode' => $xPath->query("//span[@data-key='FAA Code']")[0]->getAttribute('data-value'),
            'phone' => $xPath->query("//span[@data-key='Phone']")[0]->getAttribute('data-value'),
            'fax' => $xPath->query("//span[@data-key='Fax']")[0]->getAttribute('data-value'),
            'latitude' => $xPath->query("//span[@data-key='Latitude']")[0]->getAttribute('data-value'),
            'longitude' => $xPath->query("//span[@data-key='Longitude']")[0]->getAttribute('data-value'),
            'timezone' => $xPath->query("//span[@data-key='Time Zone']")[0]->getAttribute('data-value'),
            'email' => $xPath->query("//span[@data-key='Email']")[0]->getAttribute('data-value'),
            'twitter' => $xPath->query("//span[@data-key='Twitter']")[0]->getAttribute('data-value'),
            'facebook' => $xPath->query("//span[@data-key='Facebook']")[0]->getAttribute('data-value'),
            'runways' => $runways
        );

        return new Airport($this->fix($airport));
    }

    protected function fix($airport) {
        // Sanatize the name of airport
        $linksArray = explode(" ", html_entity_decode($airport['name']));
        $linksArray = array_filter($linksArray);
        $airport['name'] = implode(" ", $linksArray);

        $newTimeZone = explode(' ', $airport['timezone']);
        $airport['timezone'] = trim($newTimeZone[0]);

        return $airport;
    }
}
