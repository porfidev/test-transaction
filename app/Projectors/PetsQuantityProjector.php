<?php

namespace App\Projectors;

use App\Events\PetAdquired;
use App\Events\PetRemoved;
use App\Events\ProfileCreated;
use App\Events\ProfileRemoved;
use App\Models\Profile;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PetsQuantityProjector extends Projector
{
    public function onProfileCreated(ProfileCreated $event)
    {
        Profile::create($event->profileAttributes);
    }

    public function onAddPets(PetAdquired $event)
    {
        $profile = Profile::uuid($event->profileUuid);
        $profile->pets += $event->quantity;
        $profile->save();
    }

    public function onRemovePets(PetRemoved $event)
    {
        $profile = Profile::uuid($event->profileUuid);
        $profile->pets -= $event->quantity;
        $profile->save();
    }

    public function onRemoveProfile(ProfileRemoved $event)
    {
        Profile::uuid($event->profileUuid)->delete();
    }
}
