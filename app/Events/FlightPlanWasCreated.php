<?php

namespace App\Events;

use App\Models\FlightPlan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;

class FlightPlanWasCreated
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var App\Models\FlightPlan
     */
    public $flightPlan;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(FlightPlan $flightPlan)
    {
        $this->flightPlan = $flightPlan;
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
