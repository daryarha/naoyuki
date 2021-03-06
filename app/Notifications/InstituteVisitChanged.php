<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\InstituteModel;

class InstituteVisitChanged extends Notification implements ShouldQueue
{
    use Queueable;

    protected $institute;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(InstituteModel $institute)
    {
        $this->institute = $institute;
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
        $visit = $this->institute->visited ? "YES" : "NO";
        return [            
            'name' => $this->institute->institute,
            'visit' => $visit,
            'user' => $this->institute->last_change_by_user->name,
        ];
    }
}
