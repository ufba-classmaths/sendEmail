<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RecoverCode2 extends Mailable
{
    use Queueable, SerializesModels;


    private $playload;
    private $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($playload)
    {
        $this->playload = $playload;
        $this->url = 'https://icia.herokuapp.com/';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject('Código de Recuperação de Acesso!');
        $this->to($this->playload['email'], $this->playload['name']);

        return $this->view(
            'mail.invitation',
            [
                'url' => $this->url,
                'userName' => $this->playload['name'],
                'token' => $this->playload['token']
            ]
        );
    }
}
