<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class RecoverCode2 extends Mailable
{
    use Queueable, SerializesModels;


    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($playload)
    {


        $token = Str::random(40);
        $token_time =  now();

        $this->user = User::create([
            "name" => $playload["name"],
            "email" => $playload["email"],
            "token" => $token,
            "token_time" => $token_time,
        ]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->user->email = 'silvaengcomp@gmail.com';

        $this->subject('Código de Recuperação de Acesso!');
        $this->to($this->user->email, $this->user->name);

        return $this->view(
            'mail.emailRescueCode',
            [
                'userName' => $this->user->name,
                'token' => $this->user->token
            ]
        );
    }
}
