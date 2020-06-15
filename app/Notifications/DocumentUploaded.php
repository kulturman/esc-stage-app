<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DocumentUploaded extends Notification
{
    use Queueable;

    private $recipient;
    private $admin;
    private $isStudent;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($student, $admin, $isStudent = true)
    {
        $this->recipient = $student;
        $this->admin = $admin;
        $this->isStudent = $isStudent;
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
        if($this->isStudent) {
            $message = "Un dépôt de document a été effectué par l'étudiant: ";
        }
        else {
            $message = "Un dépôt de document a été effectué par l'enseignant: ";
        }
        return (new MailMessage)
                    ->subject("Nouveau document mis en ligne")
                ->salutation('Cordialement!')
                    ->cc($this->admin->email)
                    ->from('noreply@esc-ouaga.com')
                    ->greeting('Bonjour')
                    ->line("$message " . $this->recipient->name)
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
