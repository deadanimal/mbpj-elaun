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
    public $catatan_latest;
    public $penulis_catatan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, PermohonanBaru $permohonan)
    {
        $this->name = $user->NAME;
        
        foreach ($permohonan->catatans as $catatan) {
            $this->catatan_latest = $catatan->catatan;
            $user = User::findOrFail($catatan->CUSTOMERID);
            $this->penulis_catatan = $user->name;
            break;
        }
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
                ->subject('SPELM : Permohonan Ditolak')
                ->greeting('Selamat Sejahtera Tuan/Puan '.$this->name.',')
                ->line('Permohonan anda telah ditolak.')
                ->line('Sila buat permohonan baru jika perlu atau berhubung dengan Penyelia anda.')
                ->line('Catatan: '.$this->catatan_latest)
                ->line('Ditulis oleh: '.$this->penulis_catatan)
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
