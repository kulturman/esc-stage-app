<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyTeacherWhenNoReaction extends Notification
{
    use Queueable;
    private $depot;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($depot)
    {
        $this->depot = $depot;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
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
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $stage = $this->depot->stage;
        $message = "Rappel: Vous n'avez toujours pas réagi suite au dépot de document effectué le"
                . " le {$this->depot->created_at->format('d/m/Y')} par l'étudiant: "
                . " {$stage->etudiant->name}";
        return (new MailMessage)
                    ->subject('Rappel corrections')
                    ->salutation('Cordialement!')
                    ->from('noreply@esc-ouaga.com')
                    ->greeting('Bonjour')
                    ->line($message)
                    ->line("Merci d'utiliser notre application.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
