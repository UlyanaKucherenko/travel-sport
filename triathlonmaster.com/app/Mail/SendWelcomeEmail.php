<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_name;
    private $siteName;

    /**
     * SendWelcomeEmail constructor.
     *
     * @param string $user_name
     * @param $siteName
     */
    public function __construct(string $user_name, $siteName)
    {
        $this->user_name = $user_name;
        $this->siteName = $siteName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('mail.welcome', [
                "user_name" => $this->user_name,
                "siteName" => $this->siteName,
            ]);
    }
}
