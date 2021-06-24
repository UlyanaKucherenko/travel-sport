<?php

namespace Tests\Feature\Login;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpRegisterTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testBaseRoute()
    {

        $response = $this->json('POST', route("register"), [
            'email' => $this->faker->unique()->safeEmail,
            'password' => "secret",
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->e164PhoneNumber,
            'postal_code' => $this->faker->postcode,
            'plan_id' => 1,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "user" => [
                    "email",
                    "first_name",
                    "last_name",
                    "address",
                    "city",
                    "country",
                    "phone",
                    "postal_code",
                    "plan_id",
                    "plan_name",
                    "plan_price"
                ],
                "redirect",
            ]);
    }

}
