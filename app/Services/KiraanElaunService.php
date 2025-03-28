<?php

namespace App\Services;

use App\User;
use App\PermohonanBaru;

class KiraanElaunService {

    const SETAHUN = 12;
    const JAM_BEKERJA = 8.0;
    const HARI_BEKERJA = 313;
    public $id_user;
    public $permohonan;
    public $jumlahMasaBekerja;
    public float $gaji;
    public float $bayaranPerJamSiang;
    public float $bayaranPerJamMalam;
    public float $jumlahTuntutanAkhir;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PermohonanBaru $permohonan, $id_user)
    {
        $this->id_user = $id_user;
        $this->jumlahTuntutanAkhir = 0;
        $this->permohonan = $permohonan;
        $this->gaji = User::findOrFail($id_user)->maklumat_pekerjaan->HR_GAJI_POKOK;
        $this->kadarPerJam = floatval($permohonan->kadar_jam);

        foreach ($permohonan->users as $user) {
            if ($user->CUSTOMERID == $id_user) {
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
        (float) $jumlahTuntutan = round($bayaranPerJam, 2) * $this->jumlahMasaBekerja;
        
        $this->jumlahTuntutanAkhir = round($jumlahTuntutan, 2);
        
        // assign this permohonan to DB
        if ($this->jumlahTuntutanAkhir >= $this->gaji) {
            $this->tuntutanLebihSebulanGaji();
        };

        return $this->jumlahTuntutanAkhir;
    }

    public function tuntutanLebihSebulanGaji()
    {
        $this->permohonan->is_for_datuk_bandar = 1;
        $this->permohonan->save();
    }
}


