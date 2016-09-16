<?php

namespace App\Events;

use App\Models\Airport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

/**
 * Class AirportWasCreated
 *
 * @package App\Events
 */
class AirportWasCreated
{

    use InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Airport
     */
    public $airport;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Airport $airport
     */
    public function __construct(Airport $airport)
    {
        $this->airport = $airport;
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
