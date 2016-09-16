<?php

namespace App\Events;

use App\Models\Airline;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

/**
 * Class AirlineWasCreated
 *
 * @package App\Events
 */
class AirlineWasCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var \App\Models\Airline
     */
    private $airline;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Airline $airline
     */
    public function __construct(Airline $airline)
    {
        $this->airline = $airline;
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
