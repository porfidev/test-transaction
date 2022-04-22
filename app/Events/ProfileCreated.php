<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class ProfileCreated extends ShouldBeStored
{
    /** @var array */
    public $profileAttributes;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $profileAttributes)
    {
        $this->profileAttributes = $profileAttributes;
    }
}
