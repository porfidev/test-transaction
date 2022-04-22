<?php

namespace App\Reactors;

use App\Events\PetAdquired;
use App\Models\Profile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class TooManyPetsAddedReactor extends Reactor implements ShouldQueue
{
    public function onAddPets(PetAdquired $event)
    {
        if($event->quantity < 3) {
            return;
        }

        $profile = Profile::uuid($event->profileUuid);

        // add Action
        echo "Has a lot of new Pets";
    }
}
