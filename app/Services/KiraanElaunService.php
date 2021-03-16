<?php

namespace App\Services;

use App\User;
use App\PermohonanBaru;

class KiraanElaunService {

    const SETAHUN = 12;
    const HARI_BEKERJA = 313;
    const JAM_BEKERJA = 8.0;
    public $permohonan;
    public $id_user;
    public $jumlahMasaBekerja;
    public float $gaji;
    public float $kadarPerJam;
    // public float $jumlahTuntutan;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(PermohonanBaru $permohonan, $id_user)
    {
        $this->id_user = $id_user;
        $this->permohonan = $permohonan;
        $this->gaji = User::find($id_user)->gaji;
        $this->kadarPerJam = floatval($permohonan->kadar_jam);
        // $this->jumlahTuntutan = 0;

        foreach ($permohonan->users as $user) {
            if ($user->id == $id_user) {
                $this->jumlahMasaBekerja = floatval($user->permohonan_with_users->masa_sebenar);
            }
        }
    }

    public function kadarBayaranSejam()
    {
        $gajiSetahun = $this->gaji * self::SETAHUN;
        (float) $jamBekerja = self::HARI_BEKERJA * self::JAM_BEKERJA;

        $kadarBayaranSejam = $gajiSetahun/$jamBekerja;

        return round($kadarBayaranSejam, 2);
    } 

    public function jumlahTuntutanRounded()
    {
        $bayaranPerJam = $this->kadarBayaranSejam() * $this->kadarPerJam;
        $jumlahTuntutan = $bayaranPerJam * $this->jumlahMasaBekerja;
        
        return round($jumlahTuntutan, 2);
    }

    public function tuntutanLebihSebulanGaji()
    {
        return $this->jumlahTuntutanRounded >= $this->gaji ? TRUE : FALSE;
    }
}


