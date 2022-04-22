<?php

namespace App\Aggregates;

use App\Events\PetAdquired;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ProfileAggregate extends AggregateRoot
{
    protected int $pets = 0;

    public function addPets($uuid, $quantity){
        $this->recordThat(new PetAdquired($uuid, $quantity));
        return $this;
    }
}
