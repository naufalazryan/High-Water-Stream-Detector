<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SensorDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sensorData;

    /**
     * Create a new message instance.
     */
    public function __construct($sensorData)
    {
        $this->sensorData = $sensorData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sensor Data Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'settings.partials.script',
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

    public function build()
    {
        return $this->view('settings.partials.script') // Sesuaikan dengan nama view Anda
                    ->subject('Data Sensor') // Subjek email
                    ->with(['sensorData' => $this->sensorData]);
    }
}
