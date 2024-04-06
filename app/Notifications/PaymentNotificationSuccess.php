<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotificationSuccess extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pembayaran Berhasil Dikonfirmasi!')
            ->line('Selamat! Pembayaran Anda telah dikonfirmasi admin rare.in. Silakan untuk mulai gunakan template pilihan Anda :)')
            ->action('Gunakan Template', url('http://127.0.0.1:5000/tambah'))
            ->line('Terima kasih!');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
