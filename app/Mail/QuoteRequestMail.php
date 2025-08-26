<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public bool $isClientNotification;

    public function __construct(array $data, bool $isClientNotification = false)
    {
        $this->data = $data;
        $this->isClientNotification = $isClientNotification;
    }

    public function build()
    {
        $subject = $this->isClientNotification 
            ? 'Your Quote Request - Agolo Steelworks'
            : 'New Quote Request - Agolo Steelworks';

        $view = $this->isClientNotification 
            ? 'emails.quote-confirmation'
            : 'emails.quote-admin';

        return $this->subject($subject)
            ->view($view)
            ->with([
                'data' => $this->data,
                'isClientNotification' => $this->isClientNotification
            ]);
    }
}
