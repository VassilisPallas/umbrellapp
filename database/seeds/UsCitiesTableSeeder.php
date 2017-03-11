<?php

use Illuminate\Database\Seeder;

class UsCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($file = fopen(storage_path() . '\json\city.list.us.json', "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                $city = json_decode($line, true);

                $cityObj = \Umbrellapp\City::find($city['_id']);
                if (!$cityObj) {
                    $cityObj = new \Umbrellapp\City();
                    $cityObj->id = $city['_id'];
                    $cityObj->name = $city['name'];
                    $cityObj->country = $city['country'];
                    $cityObj->lat = $city['coord']['lon'];
                    $cityObj->lon = $city['coord']['lat'];
                    $cityObj->save();
                }

            }
            fclose($file);
        }
    }
}
