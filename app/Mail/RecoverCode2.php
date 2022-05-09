<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RecoverCode2 extends Mailable
{
    use Queueable, SerializesModels;


    private $playload;
    private $url;
    private $view;
    private $subject;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($playload)
    {
        $this->playload = $playload;

        if ($this->playload['isInvite']) {
            $this->view = 'mail.invitation';
            $this->subject = 'Código de Recuperação de Acesso!';
        } else {
            $this->view = 'mail.emailRescueCode';
            $this->subject = 'Convite do ICIA';
        }

        $this->url = 'https://icia.herokuapp.com/';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->subject);
        $this->to($this->playload['email'], $this->playload['name']);

        return $this->view(
            $this->view,
            [
                'url' => $this->url,
                'userName' => $this->playload['name'],
                'token' => $this->playload['token']
            ]
        );
    }
}
