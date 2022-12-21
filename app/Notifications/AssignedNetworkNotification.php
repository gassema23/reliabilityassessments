<?php

namespace App\Notifications;

use App\Models\Network;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AssignedNetworkNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(protected Network $network, protected User $user) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->success()
            ->subject(__('mail.network.subject').' | '.$this->network->network_name)
            ->greeting(__('mail.generals.hi').' '.$this->user->name->FullName())
            ->line(__('mail.network.title'))
            ->line(__('mail.generals.details').':')
            ->line(__('mail.network.prime').': '.$this->network->project->prime->name->FullName())
            ->line(__('mail.network.planner').': '.$this->network->project->planner->name->FullName())
            ->line(__('mail.network.clli').': '.$this->network->city->clli)
            ->line(__('mail.network.element').': '.$this->network->network_element)
            ->line(__('mail.network.due-date').': '.$this->network->network_due_date)
            ->line(__('mail.generals.tankyou').' '.config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
