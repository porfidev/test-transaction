<?php

namespace App\Aggregates;

use App\Events\PetAdquired;
use App\Events\ProfileUpdated;
use App\Models\Profile;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class ProfileAggregate extends AggregateRoot
{
    protected int $FAN_LEVEL_PETS = 4;

    private function hasEnoughtPets(int $currentPets, int $required) {
        return $currentPets > $required;
    }

    public function addPets(Profile $profile, int $quantity){
//        $profile = \App\Models\Profile::where(['uuid' => $uuid])->first();
       // $profile->addPets($quantity);

        // check this may be unuseful

        $this->recordThat(new PetAdquired($profile->uuid, $quantity));

        if($this->hasEnoughtPets($profile->pets + $quantity, $this->FAN_LEVEL_PETS)){
            $this->recordThat(new ProfileUpdated(['petLoverLevel' => 'FAN']));
        }

        $this->persist();

        return $this;
    }
}
