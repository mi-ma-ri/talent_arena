<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
  use Queueable, SerializesModels;
  public $mail;

  /**
   * Create a new message instance.
   */
  public function __construct($mail)
  {
    $this->mail = $mail;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: $this->mail['subject'],
      from: new Address($this->mail['from'], $this->mail['from_name']),
      bcc: $this->mail['bcc'],
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      text: "emails/{$this->mail['text']}",
      with: $this->mail['params'],
    );
  }

  /**
   * Get the attachments for the message.
   *
   * @return array<int, \Illuminate\Mail\Mailables\Attachment>
   */
  public function attachments(): array
  {
    return [];
  }
}
