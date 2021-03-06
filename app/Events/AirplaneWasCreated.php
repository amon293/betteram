<?php

namespace App\Events;

use App\Models\Airplane;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

class AirplaneWasCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Airplane
     */
    private $airplane;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Airplane $airplane)
    {
        $this->airplane = $airplane;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
