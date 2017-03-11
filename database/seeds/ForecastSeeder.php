<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($file = fopen(storage_path() . '\json\daily_16.json', "r")) {
            while (!feof($file)) {
                $line = fgets($file);
                $forecast = json_decode($line, true);
                $data = $forecast['data'];

                $city = \Umbrellapp\City::find($forecast['city']['id']);
                if ($city) {
                    $forecastObj = new \Umbrellapp\Forecast();
                    $forecastObj->time = date('Y-m-d H:i:s', $forecast['time']);
                    $forecastObj->city_id = $forecast['city']['id'];
                    $forecastObj->save();

                    foreach ($data as $jsonObj) {
                        $dt = date('Y-m-d H:i:s', $jsonObj['dt']);

                        $temperature = new \Umbrellapp\Temperature();
                        $temperature->min = $jsonObj['temp']['min'];
                        $temperature->max = $jsonObj['temp']['max'];
                        $temperature->save();

                        $forecastTemperature = new \Umbrellapp\ForecastsTemperature();
                        $forecastTemperature->forecast_id = $forecastObj->id;
                        $forecastTemperature->temperature_id = $temperature->id;
                        $forecastTemperature->dt = $dt;
                        $forecastTemperature->save();

                        foreach ($jsonObj['weather'] as $weatherJsonObj) {
                            $weather = \Umbrellapp\Weather::find($weatherJsonObj['id']);
                            if (!$weather) {
                                $weather = new \Umbrellapp\Weather();
                                $weather->id = $weatherJsonObj['id'];
                                $weather->main = $weatherJsonObj['main'];
                                $weather->description = $weatherJsonObj['description'];
                                $weather->icon = $weatherJsonObj['icon'];
                                $weather->save();
                            }

                            $forecastWeather = new \Umbrellapp\ForecastsWeather();
                            $forecastWeather->forecast_id = $forecastObj->id;
                            $forecastWeather->weather_id = $weather->id;
                            $forecastWeather->dt = $dt;
                            $forecastWeather->save();
                        }
                    }
                }

            }
            fclose($file);
        }
    }
}
