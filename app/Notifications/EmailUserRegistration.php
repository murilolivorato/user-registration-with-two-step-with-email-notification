<?php

namespace App\Notifications;

use App\Models\UserRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;


class EmailUserRegistration extends Notification
{
    use Queueable;
    protected $userRegistration;

    /**
     * Create a new notification instance.
     */
    public function __construct(UserRegistration $userRegistration)
    {
        $this->userRegistration = $userRegistration;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    //->to($this->userRegistration->email)
                    ->subject('User Notification')
            ->greeting('keep adding info to registry')
            ->line(new HtmlString('<b>Hello  ' . $this->userRegistration->name  . '.</b>'))
            ->line('We are sending you the link to complete your registration.')
            ->line('As part of the hiring process, we request that you fill out the information in the form that can be accessed at the link below.')
            ->line(new HtmlString('<a href="'.config('app.url') . '/link-front-form?token='. $this->userRegistration->token.'"> ' .config('app.url') . "/link-front-form?token=". $this->userRegistration->token .'</a>'))
            ->line('The validity period of this link is 5 days and during this period it is possible to save the information for later completion using this same link.')
            ->line(new HtmlString('<b><i>This form is personal and non-transferable</i></b>'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
