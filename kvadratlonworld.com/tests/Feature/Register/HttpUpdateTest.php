<?php

namespace Tests\Feature\Login;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpUpdateTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testUpdateUser()
    {

        $this->createUser();
        $this->actingAs($this->user);

        $response = $this->json('POST', route("updateProfile"), [
            'email' => $this->faker->unique()->safeEmail,
            'password' => "secret",
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->e164PhoneNumber,
            'postal_code' => $this->faker->postcode,
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                "status" => "ok",
                "update" => true,
            ]);
    }

}
