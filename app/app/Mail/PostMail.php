<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($emailMatch) 
    {
        $this->id = $emailMatch->id;

    }

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = "http://localhost/change_password_form";

        return $this->view('mail.send')
        ->subject('パスワード再設定のご案内') // メールタイトル
        ->from('matching.app.info310@gmail.com') // 送信元
        ->with([
            'url' => $url,
            'id' => $this->id,
            ]);
    }
}
