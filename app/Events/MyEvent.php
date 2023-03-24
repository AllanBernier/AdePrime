<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\Printer;
use Illuminate\Broadcasting\PrivateChannel;


class MyEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $url;
    public Printer $printer;

    public function __construct($url,Printer $printer)
    {
        $this->url = $url;
        $this->printer = $printer;
    }

    public function broadcastOn(): array
    {
        return [$this->printer->id];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}