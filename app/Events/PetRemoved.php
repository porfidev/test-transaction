<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class PetRemoved extends ShouldBeStored
{

    /** @var string */
    public $profileUuid;

    /** @var int */
    public $quantity;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $profileUuid, int $quantity)
    {
        //
        $this->profileUuid = $profileUuid;
        $this->quantity = $quantity;
    }
}
