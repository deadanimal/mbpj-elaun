<?php

namespace App\Notifications;

use App\User;
use App\PermohonanBaru;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermohonanRejectedEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $name;
    public $catatans;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, PermohonanBaru $permohonan)
    {
        $this->name = $user->name;
        $this->catatans = $permohonan->catatans;
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
        // foreach ($this->catatans as $catatan) {
        //     $catatan_latest = $catatan->catatan;
        //     break;
        // }

        return (new MailMessage)
                ->from('spelm@mbpj.gov.my', 'SPELM')
                ->subject('SPELM : Permohonan Ditolak')
                ->greeting('Selamat Sejahtera Tuan/Puan '.$this->name.',')
                // ->line('Permohonan anda telah ditolak.')
                // ->line('Catatan: '. $catatan_latest)
                // ->line('Catatan: ')
                // ->line('Sila buat permohonan baru jika perlu atau berhubung dengan Penyelia anda.')
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
