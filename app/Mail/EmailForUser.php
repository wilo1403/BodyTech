<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailForUser extends Mailable
{
    use Queueable, SerializesModels;

    protected $link;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('wilo@gmail.com', 'Wilo')
                    ->subject('Completa tu registro')
                    ->view('email.email')
                    ->with([
                        'link' => $this->link
                    ]);
    }
}
