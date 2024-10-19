<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmailSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;

    /**
     * Create a new event instance.
     *
     * @param string $email
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}
