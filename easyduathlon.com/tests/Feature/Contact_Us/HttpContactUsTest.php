<?php

namespace Tests\Feature\Contact_Us;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpContactUsTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testSendContactUsFormSuccess()
    {
        $response = $this->json('POST', route('contact'), [
            'email' => $this->faker->unique()->safeEmail,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'phone' => $this->faker->e164PhoneNumber,
            'message' => $this->faker->paragraph(),
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'ok',
            ]);
    }
}
