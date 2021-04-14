<?php

namespace App\Notifications;

use App\User;
use App\PermohonanBaru;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermohonanNeedKemaskiniEmailNotification extends Notification implements ShouldQueue
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
            $user = User::find($catatan->id_user);
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
                ->subject('SPELM : Permohonan Perlu Kemaskini')
                ->greeting('Selamat Sejahtera Tuan/Puan '.$this->name.',')
                ->line('Permohonan anda perlu dikemaskini.')
                ->line('Catatan: '.$this->catatan_latest)
                ->line('Ditulis oleh: '.$this->penulis_catatan)
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
