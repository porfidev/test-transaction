<?php

namespace App\Aggregates;

use App\Events\PetAdquired;
use App\Events\ProfileUpdated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ProfileAggregate extends AggregateRoot
{
    protected int $FAN_LEVEL_PETS = 4;

    private function hasEnoughtPets(int $quantity, int $required) {
        return $quantity > $required;
    }

    public function addPets(string $uuid, int $quantity){
        $profile = \App\Models\Profile::where(['uuid' => $uuid])->first();
        $profile->addPets(5);

        // check this may be unuseful
        $this->recordThat(new PetAdquired($uuid, $quantity));

        if($this->hasEnoughtPets($profile->pets + $quantity, $this->FAN_LEVEL_PETS)){
            $this->recordThat(new ProfileUpdated(['petLoverLevel' => 'FAN']));
        }

        $this->persist();

        return $this;
    }
}
