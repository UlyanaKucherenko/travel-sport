<?php

namespace Tests\Feature\Contact_Us;

use App\Mail\GetIntouch;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Tests\AuthEnv;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailGetInTouchTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testSendContactUsMailSuccess()
    {
        Mail::fake();

        $this->json('POST', route('getInTouch'), [
            'email' => $this->faker->unique()->safeEmail,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'message' => $this->faker->paragraph(),
        ]);

        Mail::assertSent(GetIntouch::class, function ($mail) {
            return $mail->hasTo(env('MAIL_TO_ADDRESS'));
        });

    }

}
