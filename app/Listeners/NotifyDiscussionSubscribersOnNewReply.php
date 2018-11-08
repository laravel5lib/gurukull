<?php

namespace App\Listeners;

use App\Events\ReplyCreated;
use App\Notifications\DiscussionWasRepliedToNotification;

class NotifyDiscussionSubscribersOnNewReply
{
    /**
     * Handle the event.
     *
     * @param  ReplyCreated  $event
     * @return void
     */
    public function handle(ReplyCreated $event)
    {
        $event->reply->discussion->subscribers()
            ->where('users.id', '!=', $event->reply->author_id)
            ->get()
            ->each
            ->notify(
                new DiscussionWasRepliedToNotification($event->reply)
            );
    }
}
