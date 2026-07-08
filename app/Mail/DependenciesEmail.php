<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DependenciesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $output;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $output)
    {
        $this->output = $output;
    }

    /**
     * Build the message.
     */
    public function build(): static
    {
        return $this->from(config('mail.from.address'))
            ->subject(config('app.name') . ': Dependencies Email - ' . Carbon::now()->format('Y-m-d'))
            ->markdown('emails.dependencies_email');
    }
}
