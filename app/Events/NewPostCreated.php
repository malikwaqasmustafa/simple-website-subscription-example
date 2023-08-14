<?php

namespace App\Events;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewPostCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $website;
    public $post;

    /**
     * Create a new event instance.
     */

    public function __construct(Website $website, Post $post)
    {
        $this->website = $website;
        $this->post = $post;
    }
}
