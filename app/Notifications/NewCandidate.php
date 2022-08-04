<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $id_vacancy, $name_vacancy, $user_id )
    {
        $this->id_vacancy   = $id_vacancy;
        $this->name_vacancy = $name_vacancy;
        $this->user_id      = $user_id;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $url = url('/notifications');

        return (new MailMessage)
                    ->line('¡Has recibido un nuevo candidato para tu vacante!')
                    ->line('La vacante es: ' . $this->name_vacancy)
                    ->action('Ver notificaciones', $url)
                    ->line('¡Gracias por usar JobsTI!');
    }

    // Almacena las notificaciones en la BD
    public function toDatabase ( $notifiable )
    {
        return [
            'id_vacancy'    => $this->id_vacancy,
            'name_vacancy'  => $this->name_vacancy,
            'user_id'       => $this->user_id,
        ];
    }
}
