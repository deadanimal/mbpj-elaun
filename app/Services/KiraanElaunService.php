<?php

namespace App\Services;

use App\User;
use App\PermohonanBaru;

class KiraanElaunService {

    protected const SETAHUN = 12;
    protected const HARI_BERKERJA = 313;
    protected const JAM_BERKERJA = 8;
    protected $permohonan;
    protected $id_user;
    protected $jumlahMasaBekerja;
    protected float $gaji;
    protected float $kadarPerJam;
    protected float $jumlahTuntutanRounded;

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
        $this->jumlahMasaBekerja = $permohonan->masa;
        $this->kadarPerJam = $permohonan->kadar_jam;
        $this->jumlahTuntutanRounded = 0;
    }

    public function kadarBayaranSejam()
    {
        $gajiSetahun = $this->gaji * SETAHUN;
        (float) $jamBekerja = HARI_BEKERJA * JAM_BEKERJA;

        $kadarBayaranSejam = $gajiSetahun/$jamBekerja;

        return round($kadarBayaranSejam, 2);
    }

    public function jumlahTuntutan()
    {
        $bayaranPerJam = $this->kadarBayaranSejam() * $this->kadarPerJam;
        $jumlahTuntutan = $bayaranPerJam * $this->jumlahMasaBekerja;

        return $this->jumlahTuntutanRounded = round($jumlahTuntutan, 2);
    }

    public function tuntutanLebihSebulanGaji()
    {
        return $this->jumlahTuntutanRounded >= $this->gaji ? TRUE : FALSE;
    }
}


