<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PegawaiSokongApprovedEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->name = $user->NAME;
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
        return (new MailMessage)
                ->from('spelm@mbpj.gov.my', 'SPELM')
                ->subject('SPELM : Permohonan Disahkan')
                ->greeting('Selamat Sejahtera Tuan/Puan '.$this->name.',')
                ->line('Permohonan anda telah disahkan oleh Pegawai Sokong.')
                ->line('Sila semak untuk peringkat seterusnya.')
                ->action('Klik disini', url('/'))
                ->salutation('Terima kasih.');
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
