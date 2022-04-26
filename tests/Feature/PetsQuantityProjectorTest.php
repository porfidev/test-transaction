<?php

namespace Tests\Feature;

use App\Events\PetAdquired;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PetsQuantityProjectorTest extends TestCase
{
    use RefreshDatabase;

    public function test_model_updated_with_events()
    {
        $profile = Profile::createNew([
            'name' => 'Lifeline',
            'pets' => 2,
        ]);

        $addEvent = new PetAdquired($profile->uuid, 2);
        event($addEvent);

        $profile->refresh();
        $this->assertEquals(
            4,
            $profile->pets,
            'Profile did not update its pets quantity'
        );
    }
}
