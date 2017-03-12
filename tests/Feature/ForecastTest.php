<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForecastTest extends TestCase
{
    public function testForecastDataAreMissing()
    {
        $this
            ->get('/api/getForecast')
            ->assertStatus(422)
            ->assertJsonFragment([
                "status" => "data are missing"
            ]);
    }

    public function testForecastNotFound()
    {
        $this
            ->get('/api/getForecast/735563/1212121211394816400')
            ->assertStatus(404)
            ->assertJsonFragment([
                "status" => "forecast not found"
            ]);
    }
}
