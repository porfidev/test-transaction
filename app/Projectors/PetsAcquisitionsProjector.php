<?php

namespace App\Projectors;

use App\Events\PetAdquired;
use App\Events\PetRemoved;
use App\Models\PetsAcquisitions;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class PetsAcquisitionsProjector extends Projector
{
    public function onAddPets(PetAdquired $event)
    {
        $adquisitionCounter = PetsAcquisitions::firstOrCreate(['profile_uuid' => $event->profileUuid]);
        $adquisitionCounter->count += 1;
        $adquisitionCounter->save();
    }

    public function onRemovePets(PetRemoved $event)
    {
        $adquisitionCounter = PetsAcquisitions::firstOrCreate(['profile_uuid' => $event->profileUuid]);
        $adquisitionCounter->count += 1;
        $adquisitionCounter->save();
    }
}
