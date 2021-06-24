<?php

namespace Tests\Feature\Login;

use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpLoginTest extends TestCase
{
    use AuthEnv;

    public function testBaseRoute()
    {
        $this->createUser();

        $response = $this->json('POST', '/login', [
            'email' => $this->user->email,
            'password' => 'secret'
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'loginUser',
                'redirect' => route('dashboard'),
            ]);
    }

}
