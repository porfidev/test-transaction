<?php

namespace App\Models;

use App\Events\PetAdquired;
use App\Events\PetRemoved;
use App\Events\ProfileCreated;
use App\Events\ProfileRemoved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createNew(array $attributes) {
        $attributes['uuid'] = (string) Uuid::uuid4();
        event(new ProfileCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function addPets(int $quantity){
        event(new PetAdquired($this->uuid, $quantity));
    }

    public function removePets(int $quantity){
        event(new PetRemoved($this->uuid, $quantity));
    }

    public function removeProfile(){
        event(new ProfileRemoved($this->uuid));
    }

    public static function uuid(string $uuid): ?Profile {
        return static::where('uuid', $uuid)->first();
    }
}
