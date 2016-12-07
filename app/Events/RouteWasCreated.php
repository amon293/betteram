<?php

namespace App\Events;

use App\Models\Route;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class RouteWasCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var App\Models\Route
     */
    public $route;

    /**
     * Create a new event instance.
     *
     * @param Route $route
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
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
