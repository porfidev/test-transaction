<?php

namespace Tests\Feature;

use App\Aggregates\ProfileAggregate;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class aggregation_profile extends TestCase
{
    private $userName = 'Margarino';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_reach_fan_level()
    {
        Profile::createNew(['name' => $this->userName]);
        \App\Models\Profile::createNew(['name' => $this->userName]);
        $profile = \App\Models\Profile::where(['name' => $this->userName])->first();

        $profileAggregator = ProfileAggregate::fake();
        $profileAggregator->addPets($profile->uuid, 5);

        $profile = \App\Models\Profile::where(['name' => $this->userName])->first();
        $this->assertEquals('FAN', $profile->petLoverLevel);
    }
}
