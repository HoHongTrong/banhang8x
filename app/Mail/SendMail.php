<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //var_dump(config('mail.mailers.smtp'));exit();
        $this->subject = "Thông báo test mail";
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('view.name');
        return $this->subject($this->subject)->replyTo('info@nguyenquan.com', 'Trong ho')->view('emails.send_mail',[
            'data' => $this->data
        ]);
    }

}
