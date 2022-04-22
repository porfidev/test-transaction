<?php

namespace Tests\Unit;

use App\Models\Profile;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_create_profile() {
        Profile::create(['name' => 'Octate']);
    }
}
