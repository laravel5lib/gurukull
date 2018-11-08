<?php

namespace App\Notifications;

use App\Member;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MemberCompletedAllObjectivesNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /** @var Member */
    protected $member;

    /**
     * Create a new notification instance.
     *
     * @param Group $objective
     * @param Collection $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $notifiable->should_not_notify ? [] : ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->member->user->name." has completed ALL objectives...")
            ->from(config('mail.from.address'),$this->member->group->name)
            ->markdown('mail.member-completed-all-objectives', [
                'member' => $this->member,
            ]);
    }
}
