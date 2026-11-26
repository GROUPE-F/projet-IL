<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class VideoStateChanged implements ShouldBroadcastNow
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $codeSalon,
        public string $etat,
        public float $position
    ) {
    }

    public function broadcastOn(): array
    {
        return [new Channel('salon.' . $this->codeSalon)];
    }
}
