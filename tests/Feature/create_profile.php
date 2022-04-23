<?php

namespace Tests\Feature;

use App\Models\Profile;
use Faker\Provider\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertIsString;

class create_profile extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_profile()
    {
        $userName = Person::firstNameMale();
        \App\Models\Profile::createNew(['name' => $userName]);
        $profile = \App\Models\Profile::where(['name' => $userName])->first();

        $this->assertDatabaseHas((new Profile())->getTable(), ['name' => $userName]);
        $this->assertEquals($userName, $profile->name);
    }
}
