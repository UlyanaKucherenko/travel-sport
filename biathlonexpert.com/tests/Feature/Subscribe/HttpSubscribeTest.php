<?php

namespace Tests\Feature\Subscribe;

use App\Facades\AdminUnsubscribe;
use App\Models\User;
use Carbon\Carbon;
use Tests\AuthEnv;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HttpSubscribeTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testSetUnsubscribeUserRoute()
    {
        $order_id = "sdsddfb";
        $email = "test@test.com";

        $this->createUser([
            'subscribe_status' => false,
            "subscribe_date" => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            'orderId' => $order_id,
            'email' => $email,
            'first_name' => "First",
            'last_name' => "Last",
        ]);
        $this->actingAs($this->user);
        $this->instance(\App\Services\AdminUnsubscribe::class, \Mockery::mock(\App\Services\AdminUnsubscribe::class, function ($mock) {
            /** @var MockInterface $mock */
            $mock->shouldReceive('sendUnsubscribeRequest')
                ->times(1)
                ->andReturn(response([
                    'result' => 'SUCCESS',
                ]));
        }));
        $response = $this->json('POST', route('unsubscribe'), ['email' => $email]);
        $response->assertStatus(200);
        $user = User::whereEmail($email)->first();
        $this->get(route('unsubscribe'))
            ->assertStatus(302);
        $this->get(route('dashboard'))
            ->assertStatus(200)
            ->assertSee('0');

        $this->assertSame(false, (bool)$user->subscribe_status);
    }


    public function testSetUnsubscribeUserPostRoute()
    {
        $this->createUser([
            'subscribe_status' => true,
            "subscribe_date" => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(2)->format('Y-m-d H:i:s'),
        ]);

        $response = $this->json('POST', route("unsubscribePost"), [
            'email' => $this->user->email,
        ]);

        $this->assertSame(false, (bool)User::where('email', $this->user->email)->first()->subscribe_status);
    }
}
