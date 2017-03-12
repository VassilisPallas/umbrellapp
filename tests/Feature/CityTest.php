<?php

namespace Tests\Feature;

use Tests\TestCase;

class CityTest extends TestCase
{
    public function testCityByName()
    {
        $this
            ->get('/api/searchCityName/larissa')
            ->assertStatus(200)
            ->assertJsonFragment([
                "id" => 8133786,
                "name" => "Dimos Larissa",
                "country" => "GR",
                "lat" => "22.33606",
                "lon" => "39.62172"
            ]);
    }

    public function testCityByNameNameIsMissing()
    {
        $this
            ->get('/api/searchCityName')
            ->assertStatus(422)
            ->assertJsonFragment([
                "status" => "name is missing"
            ]);
    }

    public function testCityByNameEmpty()
    {
        $this
            ->get('/api/searchCityName/largfgkuissa')
            ->assertStatus(404)
            ->assertJsonFragment([
                "status" => "city not found"
            ]);
    }

    public function testCityByCoords()
    {
        $this
            ->get('/api/searchCityByCoords/40.300581/21.789813')
            ->assertStatus(200)
            ->assertJsonFragment([
                "id" => 735563,
                "name" => "Kozani",
                "country" => "GR",
                "lat" => "21.78639",
                "lon" => "40.30111"
            ]);
    }

    public function testCityByCoordsEmpty()
    {
        $this
            ->get('/api/searchCityByCoords/40.300581/121.789813')
            ->assertStatus(404)
            ->assertJsonFragment([
                "status" => "city not found"
            ]);
    }

    public function testCityByNameCoordsAreMissing()
    {
        $this
            ->get('/api/searchCityByCoords')
            ->assertStatus(422)
            ->assertJsonFragment([
                "status" => "data are missing"
            ]);
    }
}
