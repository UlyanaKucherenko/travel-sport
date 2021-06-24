<?php

namespace Tests\Feature\Login;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterRemoteTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testRemoteRoute()
    {
        $first_name = $this->faker->firstName;
        $response = $this->json('POST', route("register_remote"), [
            'email' => $this->faker->unique()->safeEmail,
            'password' => "secretpassword" . $first_name,
            'first_name' => $first_name,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->e164PhoneNumber,
            'postal_code' => $this->faker->postcode,
            'plan_id' => 2,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "data" => [
                    "site_url",
                    "login",
                    "password",
                ],
            ]);
    }

}
