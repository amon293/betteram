<?php

use App\Jobs\CreateFuelJob;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder
 */
class FuelTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date = Carbon::create(2016, 10, 1, 0, 0, 0);

        while ($date->year === 2016) {

            dispatch(
                new CreateFuelJob(
                    $date, rand(300, 500)
                )
            );

            $date->addHour();

        }

//        return;
//
//        $data = json_decode(
//            file_get_contents(database_path('seeds/data/fuel.json'))
//        );
//
//        foreach ($data as $year => $years) {
//            foreach ($years as $month => $months) {
//                foreach ($months as $day => $days) {
//                    foreach ($days as $entry) {
//                        dispatch(
//                            new CreateFuelJob(
//                                Carbon::create($year, $month, $day)->setTimeFromTimeString($entry->time), $entry->price
//                            )
//                        );
//                    }
//                }
//            }
//        }

    }
}
