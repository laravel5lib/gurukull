<?php

namespace App\Events;

use App\Discussion;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class DiscussionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Discussion
     */
    public $discussion;

    /**
     * Create a new event instance.
     *
     * @param Discussion $discussion
     */
    public function __construct(Discussion $discussion)
    {
        $this->discussion = $discussion;
    }
}
