<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProfileRemoved extends ShouldBeStored
{

    /** @var string */
    public $profileUuid;

    public function __construct(string $profileUuid)
    {
        $this->profileUuid = $profileUuid;
    }
}
