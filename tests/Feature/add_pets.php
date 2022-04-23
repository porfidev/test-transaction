<?php

namespace Tests\Feature;

use App\Events\PetAdquired;
use App\Models\Profile;
use Faker\Provider\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class add_pets extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_pets()
    {
        $userName = Person::firstNameMale();
        \App\Models\Profile::createNew(['name' => $userName]);
        $profile = \App\Models\Profile::where(['name' => $userName])->first();
        $currenPets = $profile->pets;
        $profile->addPets(2);

        // TODO: INVEST HOW TO TEST EVENT LAUNCHED OR WAIT FOR
        // RESULTS IN DATABASE

        $this->expectsEvents([PetAdquired::class]);
    }
}
