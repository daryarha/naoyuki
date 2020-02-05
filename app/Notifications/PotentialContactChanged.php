<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\PotentialMModel;

class PotentialContactChanged extends Notification implements ShouldQueue
{
    use Queueable;

    protected $potential;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(PotentialMModel $potential)
    {
        $this->potential = $potential;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    
    public function via($notifiable)
    {
        return ['database','broadcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $contact = $this->potential->contacted ? "YES" : "NO";
        return [            
            'name' => $this->potential->name,
            'contact' => $contact,
            'user' => $this->potential->last_change_by_user->name,
        ];
    }
}
