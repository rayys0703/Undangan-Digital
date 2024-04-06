<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pembayaran Baru dari Member rare.in!')
            ->line('Terdapat transaksi baru dari pengguna, silakan konfirmasi pembayaran ini.')
            ->action('Konfirmasi', url('http://127.0.0.1:5000/admin/transaksi'))
            ->line('Terima kasih!');
    }

    public function via($notifiable)
    {
        return ['mail'];
    }
}
