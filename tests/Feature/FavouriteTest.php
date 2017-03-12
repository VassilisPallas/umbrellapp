<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavouriteTest extends TestCase
{

    public function testShowFavourites()
    {
        $this
            ->get('/api/showFavouriteCities')
            ->assertStatus(200)
            ->assertJsonFragment([
                "id" => 8133786,
                "name" => "Dimos Larissa",
                "country" => "GR",
                "lat" => "22.33606",
                "lon" => "39.62172"
            ]);
    }

    public function testSaveFavouriteCityWithoutId(){
        $this
            ->post('/api/saveFavouriteCity')
            ->assertStatus(422)
            ->assertJsonFragment([
                "id" => [
                    "The id field is required."
                ]
            ]);
    }

    public function testSaveFavouriteCity()
    {
        $this
            ->post('/api/saveFavouriteCity', ['id' => 734077])
            ->assertStatus(200)
            ->assertJsonFragment([
                "status" => "favourite city inserted"
            ]);
    }

    public function testSaveFavouriteCityConflict()
    {
        $this
            ->post('/api/saveFavouriteCity', ['id' => 734077])
            ->assertStatus(409)
            ->assertJsonFragment([
                "status" => "city is already in favourite list"
            ]);
    }
    public function testDeleteFavouriteCity()
    {
        $this
            ->delete('/api/deleteFavouriteCity/734077')
            ->assertStatus(200)
            ->assertJsonFragment([
                "status" => "favourite city deleted"
            ]);
    }

    public function testDeleteFavouriteCityError()
    {
        $this
            ->delete('/api/deleteFavouriteCity/123')
            ->assertStatus(404)
            ->assertJsonFragment([
                "status" => "city not found"
            ]);
    }

    public function testDeleteFavouriteCityIdIsMissing()
    {
        $this
            ->delete('/api/deleteFavouriteCity')
            ->assertStatus(422)
            ->assertJsonFragment([
                "status" => "id is missing"
            ]);
    }
}
