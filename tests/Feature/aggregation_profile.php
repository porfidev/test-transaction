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
        Profile::createNew(['name' => $this->userName]);
        $profile = Profile::where(['name' => $this->userName])->first();

        $profileAggregator = ProfileAggregate::fake();
        $profileAggregator->addPets($profile->uuid, 5);

        $profile = Profile::where(['name' => $this->userName])->first();
        $this->assertEquals('FAN', $profile->petLoverLevel);
    }
}
