<?php

namespace App\Http\Controllers;

use App\User;
use App\Jawatan;
use App\PermohonanBaru;
use Illuminate\Support\Arr;
use Illuminate\Http\Request; 
use App\permohonan_with_users;
use App\Services\KiraanMasaService;
use App\Services\KiraanElaunService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Events\PermohonanStatusChangedEvent;
use App\Notifications\PermohonanRejectedEmailNotification;

class PermohonanBaruController extends Controller
{
    public function findPermohonan($idPermohananBaru)
    {
        $senaraiKakitangan = array();
        $permohonan = PermohonanBaru::with('users')->findOrFail($idPermohananBaru);
        $tarikhPermohonan = $permohonan->created_at->format('d/m/Y');

        foreach ($permohonan->users as $user) {
            if ($user->permohonan_with_users->is_rejected_individually != 1) {
                array_push($senaraiKakitangan, $user);
            }
        }

        return response()->json([
                    'error' => false,
                    'permohonan'  => $permohonan,
                    'tarikh_permohonan' => $tarikhPermohonan,
                    'arrayKelulusan' => $this->getKelulusanWithData($permohonan),
                    'senaraiKakitangan' => $senaraiKakitangan
                ], 200);
    }

    public function getKelulusanWithData($permohonan)
    {
        $arrayKelulusan = array();

        $pegSokong = User::with('maklumat_pekerjaan')->findOrFail($permohonan->id_peg_sokong); 
        $namaJawatanpegSokong = Jawatan::where('HR_KOD_JAWATAN', $pegSokong->maklumat_pekerjaan->HR_JAWATAN)
                                    ->first()
                                    ->HR_NAMA_JAWATAN;
        $arrayKelulusan = Arr::prepend($arrayKelulusan, [$pegSokong, $namaJawatanpegSokong], 'peg_sokong');

        $pegPelulus = User::with('maklumat_pekerjaan')->findOrFail($permohonan->id_peg_pelulus);
        $namaJawatanpegPelulus = Jawatan::where('HR_KOD_JAWATAN', $pegPelulus->maklumat_pekerjaan->HR_JAWATAN)
                                    ->first()
                                    ->HR_NAMA_JAWATAN;
        $arrayKelulusan = Arr::prepend($arrayKelulusan, [$pegPelulus, $namaJawatanpegPelulus], 'peg_pelulus');
        
        return $arrayKelulusan;
    }

    public function approvedKelulusan($idPermohonanBaru)
    {
        $permohonan = PermohonanBaru::findOrFail($idPermohonanBaru);
        
        event(new PermohonanStatusChangedEvent($permohonan, 1, 0, 0));

        $this->saveElaun($permohonan);
    }

    public function saveElaun(PermohonanBaru $permohonan)
    {
        $jenisPermohonan = array('PS1', 'PS2');
        $sahP1 = $permohonan->progres == 'Sah P1' ? TRUE : FALSE;

        if (in_array($permohonan->jenis_permohonan, $jenisPermohonan) && $sahP1) {
            $tuntutan = ($permohonan->users)->filter(function($user) {
                return $user->permohonan_with_users->is_rejected_individually != 1;

            })->each(function($user) use ($permohonan) {
                $elaun = new KiraanElaunService($permohonan, $user->CUSTOMERID);
                $permohonan->users()
                            ->updateExistingPivot($user->CUSTOMERID, array('jumlah_tuntutan_elaun' => $elaun->jumlahTuntutanRounded()), false);

            })->map(function ($user) {
                return $user->permohonan_with_users
                            ->jumlah_tuntutan_elaun;

            });
        }
    }

    public function findGajiElaun(Request $request, $id_user)
    {
        $id_permohonan_baru = $request->input('id_permohonan_baru');
        $permohonan = PermohonanBaru::findOrFail($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if ($user->CUSTOMERID == $id_user){ 
                $jumlah_tuntutan_elaun = $user->permohonan_with_users->jumlah_tuntutan_elaun;
            }
        };

        $user = User::with('maklumat_pekerjaan')->findOrFail($id_user);

        return response()->json([
            'error' => false,
            'gaji' => $user->maklumat_pekerjaan->HR_GAJI_POKOK,
            'jumlah_tuntutan_elaun' => $jumlah_tuntutan_elaun
        ], 200);

    }

    public function rejectIndividually(Request $request, $id_permohonan_baru)
    {
        $idUser = $request->input('id_user');
        $permohonan = PermohonanBaru::findOrFail($id_permohonan_baru);

        foreach ($permohonan->users as $user) {
            if($user->CUSTOMERID == $idUser) {
                $permohonan->users()->updateExistingPivot($idUser, array('is_rejected_individually' => 1), false);
                $user->notify(new PermohonanRejectedEmailNotification($user));
            }
        }
    }

    public function retrieveMasaSebenar(Request $request, $id_user)
    {
        $id_permohonan_baru = $request->input('id_permohonan_baru');
        $permohonan = PermohonanBaru::findOrFail($id_permohonan_baru);
        $masa_mula_sebenar = 0.0;
        $masa_akhir_sebenar = 0.0;

        foreach ($permohonan->users as $user) {
            if($user->CUSTOMERID == $id_user) {
                $masa_mula_sebenar = $user->permohonan_with_users->masa_mula_sebenar;
                $masa_akhir_sebenar = $user->permohonan_with_users->masa_akhir_sebenar;
            }
        }

        return response()->json([
            'error' => false,
            'masa_mula_sebenar' => $masa_mula_sebenar,
            'masa_akhir_sebenar' => $masa_akhir_sebenar
        ], 200);
    }

    public function kemaskiniModal(Request $request, $id_permohonan_baru)
    {
        $idUser = $request->input('id_user');
        $permohonan = PermohonanBaru::findOrFail($id_permohonan_baru);
        $permohonan->kadar_jam = $request->input('kadar_jam');
        $permohonan->jenis_hari = $request->input('jenis_hari');

        foreach ($permohonan->users as $user) {
            if($user->CUSTOMERID == $idUser) {
                $permohonan->users()
                            ->updateExistingPivot($idUser, array(
                                    'masa_mula_sebenar' => $request->input('masa_mula_sebenar'),
                                    'masa_akhir_sebenar' => $request->input('masa_akhir_sebenar')
                                ));
            }
        }

        $permohonan->save();
    }

    public function saveMasaSebenar(Request $request){
        $jenisPermohonan = array('PS1', 'PS2');
        $idPermohananBaru = $request->input('id_permohonan_baru');
        $waktuKeluar = $request->input('waktuKeluar');
        $waktuMasuk = $request->input('waktuMasuk');
        $mulaKerja = $request->input('mulaKerja');
        $akhirKerja = $request->input('akhirKerja');
        $permohonan = PermohonanBaru::findOrFail($idPermohananBaru);

        if (in_array($permohonan->jenis_permohonan, $jenisPermohonan)) {
            $tuntutan = ($permohonan->users)->filter(function($user) {
                return $user->permohonan_with_users->is_rejected_individually != 1;
            })->each(function($user) use ($permohonan,$mulaKerja,$akhirKerja,$waktuKeluar,$waktuMasuk) {
                $masa = new KiraanMasaService($permohonan, $user->CUSTOMERID);
                $masaSebenar = $masa->kiraMasa($mulaKerja,$akhirKerja,$waktuMasuk,$waktuKeluar);
                // $permohonan->update(['masa' => $masaSebenar["masa"]]);
                $permohonan->users()
                            ->updateExistingPivot($user->CUSTOMERID, array(
                                'masa_sebenar' => $masaSebenar["masa"]),
                                false);
            })->map(function ($user)  use ($permohonan){
                return $user->permohonan_with_users
                            ->masa_sebenar_siang;
            });
        }

    }
}
