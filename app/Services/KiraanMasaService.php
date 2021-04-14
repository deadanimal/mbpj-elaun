<?php

namespace App\Services;

use App\User;
use App\PermohonanBaru;
use Carbon\Carbon;
use DateTime;

class KiraanMasaService {

public $masaMula;
public $masaAkhir;
public $siang;
public $malam;
public $day;
public $hour;
public $realhour;
public $jamkerja;
public $hourMasuk;
public $hourKeluar;
public $permohonan;
public $shiftSiang;
public $shiftSiang2;
public $shiftMalam;
public $shiftMalam2; 
public $shiftTime;
public $totalShiftHour;
public $totalShiftMHour;
public $totalShiftSiang;
public $totalShiftMalam;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PermohonanBaru $permohonan, $id_user, $id_permohonan)
    {

        $this->siang;
        $this->malam;
        $this->day = 0;
        $this->shiftTime = array(); 
        $this->shiftSiang;
        $this->shiftSiang2;
        $this->shiftMalam;
        $this->shiftMalam2;
        $this->totalShiftHour = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftMHour = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftSiang = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftMalam = 0;
        $this->id_user = $id_user;
        $this->permohonan = $permohonan;
        $this->masaMula = PermohonanBaru::find($id_permohonan)->masa_mula;
        $this->masaMula = PermohonanBaru::find($id_permohonan)->masa_akhir;

        foreach ($permohonan->users as $user) {
            if ($user->id == $id_user) {
                $this->jumlahMasaBekerjaSiang = floatval($user->permohonan_with_users->masa_sebenar_siang);
                $this->jumlahMasaBekerjaMalam = floatval($user->permohonan_with_users->masa_sebenar_malam);
            }
        }
    }

    public function kiraMasa($mulaKerja,$akhirKerja,$waktuMasuk,$waktuKeluar){
        $hour = $this->timeDiffCalc(Carbon::createFromFormat('d / m / Y', $waktuKeluar)->toDateString(),Carbon::createFromFormat('d / m / Y', $waktuMasuk)->toDateString());
        $realhour = $this->diff($mulaKerja,$akhirKerja);
        $jamkerja = intval(substr($realhour,0,2));
        $hourMasuk = substr($mulaKerja,0,2);
        $hourKeluar = substr($akhirKerja,0,2);
        $hourMasuk = intval($hourMasuk);
        $hourKeluar = intval($hourKeluar);

                if($this->day->d > 1 || $jamkerja >= 24){
                    print_r('day\n');
                    // Calculate shift siang dan malam based on hari
                    $this->siang = intval($this->day->d - 1) * 16;
                    $this->malam = intval($this->day->d - 1) * 8;
                }
                if(($jamkerja < 16 || $this->day->d <= 1) && ($hourMasuk >= 06 && $hourMasuk < 22) && ($hourKeluar < 22 && $hourKeluar >= 06 )){
                    // OT on shift siang
                    print_r('siang\n');

                    $shiftSiang = $this->diff($mulaKerja,$akhirKerja);
                }
                if(($hourMasuk >= 06 && $hourMasuk < 22) && ($hourKeluar >=22 && $hourKeluar <=24 || $hourKeluar < 06)){
                    // OT on shift siang && Keluar malam
                    print_r('siang malam\n');

                    $shiftSiang = $this->diff($mulaKerja,"22:00");
                    $shiftMalam = $this->diff("22:00",$akhirKerja);
                    print_r($shiftMalam);
                } 
                if(($jamkerja < 8 && $this->day->d <= 1) && (($hourMasuk >= 22 && $hourMasuk <=24) || $hourMasuk < 06 ) && ($hourKeluar < 06 || ($hourKeluar >=22 && $hourKeluar <=24))){
                    // OT on shift malam && Keluar malam
                    print_r('malam malam\n');

                    $shiftMalam = $this->diff($mulaKerja,$akhirKerja);
                }
                if(($hourMasuk >= 22 && $hourMasuk <=24 || $hourMasuk < 06 ) && (($hourKeluar >= 06 && $hourKeluar < 22))){
                    // OT on shift malam && Keluar siang 
                    print_r('malam siang\n');

                    $shiftMalam = $this->diff($mulaKerja,"06:00");
                    $shiftSiang = $this->diff("06:00",$akhirKerja);
                }
                if(($jamkerja >= 16 && $this->day->d >= 1) && ($hourMasuk >= 06 && $hourMasuk < 22) && ($hourKeluar >= 06 && $hourKeluar < 22)){
                    // OT on shift siang && Keluar Siang && lebih sehari
                    print_r('siang malam lebih hari\n');

                    $shiftSiang = $this->diff($mulaKerja,"22:00");
                    $shiftMalam = $this->diff("22:00","06:00");
                    $shiftSiang2 = $this->diff("06:00",$akhirKerja);
                    
                }
                if(($jamkerja >= 8 || $this->day->d >=1) && (($hourMasuk >= 22 && $hourMasuk <= 24) || $hourMasuk < 06 ) && (($hourKeluar >= 22 && $hourKeluar <= 24) || ($hourKeluar < 06))){
                    // OT on shift malam && Keluar malam && lebih sehari
                    print_r('malam malam lebih hari\n');

                    $shiftMalam = $this->diff($mulaKerja,"06:00");
                    $shiftSiang = $this->diff("06:00","22:00");
                    $shiftMalam2 = $this->diff("22:00",$akhirKerja);
                }
    
                if(isset($shiftSiang)){
                    // Total Shift Siang
                    $this->totalShiftSiang = $shiftSiang;

                }
                if(isset($shiftSiang2)){

                    $this->totalShiftSiang += $shiftSiang2;
                }

                if(isset($shiftMalam)){
                    // Total Shift Malam
                    $this->totalShiftMalam = $shiftMalam;

                }
                if(isset($shiftMalam2)){

                    $this->totalShiftMalam += $shiftMalam2;
                }
                
    
                if(isset($this->siang)){
                    // Add Shift Siang based on days to Total Shift Siang
                    $trueSiang = $this->totalShiftSiang + $this->siang;
                    $this->shiftTime["Siang"] = $trueSiang;
                }
                if(isset($this->malam)){
                    // Add Shift Malam based on days to Total Shift Malam
                    $trueMalam = $this->totalShiftMalam + $this->malam;
                    $this->shiftTime["Malam"] = $trueMalam;

                }
                if(array_key_exists("Siang",$this->shiftTime) && array_key_exists("Malam",$this->shiftTime)){
                    $this->shiftTime["masa"] = $trueSiang + $trueMalam;
                }else if(array_key_exists("Siang",$this->shiftTime) && !array_key_exists("Malam",$this->shiftTime)){
                    $this->shiftTime["masa"] = $trueSiang ;
                }else if(!array_key_exists("Siang",$this->shiftTime) && array_key_exists("Malam",$this->shiftTime)){
                    $this->shiftTime["masa"] = $trueMalam ;
                }

                return $this->shiftTime;
    }

    public function timeDiffCalc($dateFuture, $dateNow) {
        $this->day = date_diff(new DateTime($dateFuture),new DateTime($dateNow),true) ;
        return $this->day->d;
    }

    public function diff($start, $end) {
        
        $start = Carbon::createFromFormat('H:i', $start);
        $end = Carbon::createFromFormat('H:i', $end);
        if($end > $start){
        $start->toDateTimeString();
        $end->toDateTimeString();
        $timeDiff = Carbon::parse($end)->floatDiffInHours($start);  
        }else{
        $end->addDay();
        $start->toDateTimeString();
        $end->toDateTimeString();
        $timeDiff = Carbon::parse($end)->floatDiffInHours($start);  
        }
        $timeDiff = round($timeDiff,2);

        return $timeDiff;

    }

}