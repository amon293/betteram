<?php

use Illuminate\Database\Seeder;
use App\Models\Airplane;
use App\Models\Manufacturer;

class AirplanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_data = [
            [
                'image' => 'http://aeromagazine.uol.com.br/media/legacy/edicoes/228/imagens/i381024.jpg',
                'model' => 'AIRBUS A320',
                'size_class' => 'N/A',
                'price' => '1000000',
                'capacity' => '100',
                'fuel' => '100',
                'cargo_load' => '100',
                'range' => '12000',
                'cruise_speed' => '100',
                'engine' => 'N/A'
            ],
            [
                'image' => 'http://aeromagazine.uol.com.br/media/legacy/edicoes/228/imagens/i381025.jpg',
                'model' => 'AIRBUS A330',
                'size_class' => 'N/A',
                'price' => '1000000',
                'capacity' => '100',
                'fuel' => '100',
                'cargo_load' => '100',
                'range' => '12000',
                'cruise_speed' => '100',
                'engine' => 'N/A'
            ],
            [
                'image' => 'http://aeromagazine.uol.com.br/media/legacy/edicoes/228/imagens/i381026.jpg',
                'model' => 'AIRBUS A380',
                'size_class' => 'N/A',
                'price' => '1000000',
                'capacity' => '100',
                'fuel' => '100',
                'cargo_load' => '100',
                'range' => '12000',
                'cruise_speed' => '100',
                'engine' => 'N/A'
            ],
        ];

        foreach ($_data as $data)
        {
            $airplane = new Airplane();
            $airplane->fill(
                $data
            );

            $airplane->manufacturer()->associate(Manufacturer::find(1));
            $airplane->save();
        }

    }
}
