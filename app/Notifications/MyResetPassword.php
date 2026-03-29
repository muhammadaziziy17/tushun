<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends Notification
{
    use Queueable;

    // 1. Tokenni saqlash uchun o'zgaruvchi e'lon qilamiz
    public $token;

    /**
     * Konstruktor orqali tokenni qabul qilamiz
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Parolni tiklash linkini yasaymiz
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->subject('Parolni tiklash - TUSHUN')
            ->view('emails.reset', [
                'url' => $url,
                'name' => $notifiable->name // User ismini yuborish uchun
            ]);
    }
}
