<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostByAuthorMail extends Mailable
{
    use Queueable, SerializesModels;

    private $emailData = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData = null)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new-blog-email')
            ->from('bill@microsoft.com')
            ->subject('New Blog posted by ' . $this->emailData['author_name'])
            ->with([
                'follower_name' => $this->emailData['follower_name'],
                'author_name' => $this->emailData['author_name'],
                'blog_link' => $this->emailData['blog_link'],
                'blog_title' => $this->emailData['blog_title']
            ]);
    }
}
