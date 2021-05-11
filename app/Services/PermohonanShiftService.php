<?php

namespace App\Services;

use App\User;
use App\PermohonanBaru;
use Carbon\Carbon;
use DateTime;

class PermohonanShiftService {

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
public $timeAkhirPagi;
public $timeAkhirMalam;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($id_user)
    {

        $this->siang;
        $this->malam;
        $this->day = 0;
        $this->shiftTime = array(); 
        $this->shiftSiang;
        $this->shiftSiang2;
        $this->shiftMalam;
        $this->shiftMalam2;
        $this->timeAkhirPagi = Carbon::create(0,0,0,22,0,0)->locale('ms');
        $this->timeAkhirMalam = Carbon::create(0,0,0,6,0,0)->locale('ms');
        $this->totalShiftHour = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftMHour = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftSiang = Carbon::create(0,0,0,0,0,0)->locale('ms');
        $this->totalShiftMalam = 0;
        $this->id_user = $id_user;
 
    }

    public function kiraMasa($mulaKerja,$akhirKerja){
    
        $formattedMulaKerja = new DateTime($mulaKerja);
        $formattedAkhirKerja = new DateTime($akhirKerja);
        $formattedMulaKerja = $formattedMulaKerja->format('Y-m-d H:i:s');
        $formattedAkhirKerja = $formattedAkhirKerja->format('Y-m-d H:i:s');
        $dateMulaKerja = substr($mulaKerja,0,10);
        $dateAkhirKerja = substr($akhirKerja,0,10);
        $dateStartMalamKerja = $dateMulaKerja.' 22:00:00';
        $dateStartPagiKerja = $dateMulaKerja.' 06:00:00';
        $dateEndMalamKerja = $dateAkhirKerja.' 22:00:00';
        $dateEndPagiKerja = $dateAkhirKerja.' 06:00:00';
        $dateStartBeforeMalamKerja = new DateTime($dateStartMalamKerja.'-1 day');
        $dateStartNextMalamKerja = new DateTime($dateStartMalamKerja.'+1 day');
        $dateStartNextPagiKerja = new DateTime($dateStartPagiKerja.'+1 day');
        $dateNextEndMalamKerja = new DateTime($dateEndMalamKerja.'+1 day');
        $dateNextMalamEndKerja = new DateTime($dateEndPagiKerja.'+1 day');
        $dateBeforeMalamEndKerja = new DateTime($dateEndMalamKerja.'-1 day');
        $dateLastKerja = new DateTime($dateEndMalamKerja.'+1 day');
        $dateLimitKerjaDay = new DateTime($mulaKerja.'+1 day');

        $dateStartBeforeMalamKerja = $dateStartBeforeMalamKerja->format('Y-m-d H:i:s');
        $dateStartNextPagiKerja = $dateStartNextPagiKerja->format('Y-m-d H:i:s');
        $dateStartNextMalamKerja = $dateStartNextMalamKerja->format('Y-m-d H:i:s');
        $dateBeforeMalamEndKerja = $dateBeforeMalamEndKerja->format('Y-m-d H:i:s');
        $dateLastKerja = $dateLastKerja->format('Y-m-d H:i:s');
        $dateNextPagiKerja = $dateNextMalamEndKerja->format('Y-m-d H:i:s');
        $dateNextMalamKerja = $dateNextEndMalamKerja->format('Y-m-d H:i:s');
        $dateLimitKerjaDay = $dateLimitKerjaDay->format('Y-m-d H:i:s');
        $dayCount = $this->timeDiffCalc($akhirKerja,$mulaKerja);
        $shiftArray = array();

        array_push($shiftArray,$dayCount);
        if($dayCount >= 1){

            if($dateStartPagiKerja <=  $formattedMulaKerja && $formattedMulaKerja < $dateStartMalamKerja ){
                array_push($shiftArray,'ss');
                // echo 'siang mula';
            }else if(($dateStartBeforeMalamKerja <= $formattedMulaKerja && $formattedMulaKerja < $dateStartPagiKerja) 
                        || ($dateStartMalamKerja <= $formattedMulaKerja && $formattedMulaKerja < $dateStartNextPagiKerja)){
                array_push($shiftArray,'ms');
                // echo 'malam mula';

            }

            if($dateEndPagiKerja <= $formattedAkhirKerja && $formattedAkhirKerja < $dateEndMalamKerja){
                array_push($shiftArray,'st');
                // echo 'siang tamat';

            }else if($dateLastKerja >  $formattedAkhirKerja && ($formattedAkhirKerja >= $dateBeforeMalamEndKerja || $formattedAkhirKerja >= $dateEndMalamKerja )){
                array_push($shiftArray,'mt');
                // echo 'malam tamat';
            
            }
            
        }else if ($dayCount < 1){
            if($formattedMulaKerja >= $dateStartPagiKerja && $formattedAkhirKerja < $dateStartMalamKerja){
                array_push($shiftArray,'sse');
                array_push($shiftArray,'nomalam');
                // echo 'mula siang hari sama sebelum 10 malam';
            }else if($formattedMulaKerja >= $dateStartMalamKerja  && $formattedAkhirKerja < $dateStartNextPagiKerja){
                array_push($shiftArray,'mse');
                array_push($shiftArray,'nosiang');
                // echo 'mula dan habis shift malam sama';
            }else if($formattedMulaKerja >= $dateStartPagiKerja && $formattedAkhirKerja < $dateStartNextPagiKerja){
                array_push($shiftArray,'ss');
                array_push($shiftArray,'m');
                // echo 'mula siang dan habis malam ';
            }else if($formattedMulaKerja >= $dateStartMalamKerja && $formattedAkhirKerja < $dateStartNextMalamKerja){
                array_push($shiftArray,'ms');
                array_push($shiftArray,'s');
                // echo 'mula malam dan habis siang ';
            }else if(
                ($formattedMulaKerja <= $dateStartPagiKerja || $formattedMulaKerja >= $dateStartMalamKerja) 
                && ($formattedAkhirKerja >= $dateStartMalamKerja || $formattedAkhirKerja <= $dateStartNextMalamKerja ) 
                && $formattedAkhirKerja <= $dateLimitKerjaDay){
                array_push($shiftArray,'mstme');
                array_push($shiftArray,'limitM');
                // echo 'mula malam dan habis shift malam esok ';
            
            }else if($formattedMulaKerja >= $dateStartPagiKerja && ($formattedAkhirKerja >= $dateStartNextPagiKerja && $formattedAkhirKerja < $dateLimitKerjaDay)){
                array_push($shiftArray,'sstpe');
                array_push($shiftArray,'limitS');
                // echo 'mula siang dan habis shift pagi esok ';
            }
        }
        return $shiftArray;
    }

    public function timeDiffCalc($dateFuture, $dateNow) {
        $this->day = date_diff(new DateTime($dateFuture),new DateTime($dateNow),true) ;
        $hour = $this->day->h/24;
        $day = $this->day->d.'.'.substr($hour,2,4);
        // dd($day);
        return $day;
    }

    public function diff($start, $end) {
        $timeDiff = Carbon::parse($end)->floatDiffInHours($start);  
        $timeDiff = round($timeDiff,2);
        return $timeDiff;
    }

    public function doPermohonanBaru($shiftType,$dayCount,$mulaKerja,$akhirKerja){
        // dd($mulaKerja,$akhirKerja);
        $dateMulaKerja = substr($mulaKerja,0,10);
        $dateAkhirKerja = substr($akhirKerja,0,10);
        $dateStartMalamKerja = $dateMulaKerja.' 22:00:00';
        $dateStartPagiKerja = $dateMulaKerja.' 06:00:00';
        $dateEndMalamKerja = $dateAkhirKerja.' 22:00:00';
        $dateEndPagiKerja = $dateAkhirKerja.' 06:00:00';
        $datePagiEsokKerja = new DateTime($dateStartPagiKerja."+1 day");
        $dateMalamEsokKerja = new DateTime($dateStartMalamKerja."+1 day");
        $dateEndMalamBeforeKerja = new DateTime($dateEndMalamKerja."-1 day");
        
        // $day = $this->kiraShiftFull($dayCount);
        $allShifts = array();
        $isStart = 0;
        $isEnd = 0;
        switch ($shiftType) {
            case 'ssst':

                    if($isStart == 0 ){
                        $start = $this->diff($mulaKerja,$dateStartMalamKerja);
                        $mid = $this->diff($dateStartMalamKerja,$datePagiEsokKerja);
                        $allShifts[$mulaKerja.';'.$dateStartMalamKerja] =  $start;
                        $allShifts[$dateStartMalamKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $mid;
                        $isStart += 1;
                    }

                    if($dayCount > 1){
                        for ($j = 1 ; $j <= $dayCount; $j++){
                            $nextDay = $j + 1;
                            $datePagiIncrement = new DateTime($dateStartPagiKerja."+".$j." day");
                            $dateMalamIncrement = new DateTime($dateStartMalamKerja."+".$j." day");
                            $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+".$nextDay." day");
                            $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                            $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                            if($j+1 <= $dayCount){
                                $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                                $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                            }else if($j+1 > $dayCount){
                                $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                                if($dateMalamIncrement->format('Y-m-d H:i:s') < $akhirKerja){
                                    $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                                }
                            }elseif($j < $dayCount){
                                $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                                $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                            }
                        }

                    }else if($dayCount < 2){
                        $datePagiIncrement = new DateTime($dateStartPagiKerja."+1 day");
                        $dateMalamIncrement = new DateTime($dateStartMalamKerja."+1 day");
                        $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+2 day");
                        $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                        $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                        $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                    }
                    if($isEnd == 0){
                        $end = $this->diff($dateEndPagiKerja,$akhirKerja);
                        $allShifts[$dateEndPagiKerja.';'.$akhirKerja] = $end;
                        $isEnd += 1;
                        
                    }
                    
                break;
            case 'ssmt':
                if($isStart == 0 ){
                    $start = $this->diff($mulaKerja,$dateStartMalamKerja);
                    $mid = $this->diff($dateStartMalamKerja,$datePagiEsokKerja);
                    $allShifts[$mulaKerja.';'.$dateStartMalamKerja] =  $start;
                    $allShifts[$dateStartMalamKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $mid;
                }

                if($dayCount > 1){
                    for ($j = 1 ; $j <= $dayCount; $j++){
                        $nextDay = $j + 1;
                        $datePagiIncrement = new DateTime($dateStartPagiKerja."+".$j." day");
                        $dateMalamIncrement = new DateTime($dateStartMalamKerja."+".$j." day");
                        $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+".$nextDay." day");
                        $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                        $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                        $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        if($akhirKerja > $dateEsokPagiIncrement->format('Y-m-d H:i:s')){
                            $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                        }
                    }

                }else if($dayCount < 2){
                    $datePagiIncrement = new DateTime($dateStartPagiKerja."+1 day");
                    $dateMalamIncrement = new DateTime($dateStartMalamKerja."+1 day");
                    $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+2 day");
                    $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                    // $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                    $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                    // $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s')] = $malamFull;
                }
                if($isEnd == 0){
                    if($akhirKerja < $dateEndMalamKerja ){
                        $end = $this->diff($dateEndMalamBeforeKerja,$akhirKerja);
                        $allShifts[$dateEndMalamBeforeKerja->format('Y-m-d H:i:s').';'.$akhirKerja] = $end;
                    }else{
                        $end = $this->diff($dateEndPagiKerja,$dateEndMalamKerja);
                        $end2 = $this->diff($dateEndMalamKerja,$akhirKerja);
                        $allShifts[$dateEndPagiKerja.';'.$dateEndMalamKerja] = $end;
                        $allShifts[$dateEndMalamKerja.';'.$akhirKerja] = $end2;
                    }
                    $isEnd += 1;
                }
                break;
            case 'msst':
                if($isStart == 0 ){
                    if($mulaKerja < $dateStartPagiKerja){
                        // dd('1st');
                        $start = $this->diff($mulaKerja,$dateStartPagiKerja);
                        $allShifts[$mulaKerja.';'.$dateStartPagiKerja] = $start;
                        // array_push($allShifts,$start);
                    }else{
                        // dd('2nd');
                        $start = $this->diff($mulaKerja,$datePagiEsokKerja);
                        $allShifts[$mulaKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $start;
                    }

                    $isStart += 1;
                }

                if($dayCount > 1){
                    for ($j = 1 ; $j <= $dayCount; $j++){
                        $nextDay = $j + 1;
                        $datePagiIncrement = new DateTime($dateStartPagiKerja."+".$j." day");
                        $dateMalamIncrement = new DateTime($dateStartMalamKerja."+".$j." day");
                        $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+".$nextDay." day");
                        $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                        $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                        $allShifts[$datePagiIncrement->format('Y-m-d H:i:s').';'.$dateMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                    }

                }else if($dayCount < 2){
                    $mid = $this->diff($dateStartMalamKerja,$datePagiEsokKerja);
                    $allShifts[$dateStartMalamKerja] = $mid;
                    $datePagiIncrement = new DateTime($dateStartPagiKerja."+1 day");
                    $dateMalamIncrement = new DateTime($dateStartMalamKerja."+1 day");
                    $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+2 day");
                    $pagiFull = $this->diff($datePagiIncrement,$dateMalamIncrement);
                    // $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                    $allShifts[$datePagiIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                    // $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s')] = $malamFull;
                }
                if($isEnd == 0){
                    $end = $this->diff($dateEndPagiKerja,$akhirKerja);
                    $allShifts[$dateEndPagiKerja.';'.$akhirKerja] = $end;
                    $isEnd += 1;
                }
                break;
            case 'msmt':
                if($isStart == 0 ){

                    if($mulaKerja < $dateStartPagiKerja){
                        $start = $this->diff($mulaKerja,$dateStartPagiKerja);
                        $mid = $this->diff($dateStartPagiKerja,$dateStartMalamKerja);
                        $allShifts[$mulaKerja.';'.$dateStartPagiKerja] =  $start;
                        $allShifts[$dateStartPagiKerja.';'.$dateStartMalamKerja] = $mid;
                    }else{
                        $start = $this->diff($mulaKerja,$datePagiEsokKerja);
                        $mid = $this->diff($datePagiEsokKerja,$dateMalamEsokKerja);
                        $allShifts[$mulaKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] =  $start;
                        $allShifts[$datePagiEsokKerja->format('Y-m-d H:i:s').';'.$dateMalamEsokKerja->format('Y-m-d H:i:s')] = $mid;
                    }
                    $isStart += 1;
                }

                if($dayCount >= 1){
                    for ($j = 1 ; $j < $dayCount; $j++){
                        $nextDay = $j + 1;
                        $dateMalamIncrement = new DateTime($dateStartMalamKerja."+".$j." day");
                        $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+".$nextDay." day");
                        $dateEsokMalamIncrement = new DateTime($dateStartMalamKerja."+".$nextDay." day");
                        $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                        $pagiFull = $this->diff($dateEsokPagiIncrement,$dateEsokMalamIncrement);
                        // dd($dateMalamIncrement->format('Y-m-d H:i:s'));
                        // $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s')] = $malamFull;
                        // $allShifts[$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        if($j+1 <= $dayCount){
                            $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                            $allShifts[$dateEsokPagiIncrement->format('Y-m-d H:i:s').';'.$dateEsokMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        }else if($j+1 > $dayCount){
                            $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                            if($dateEsokPagiIncrement->format('Y-m-d H:i:s') < $akhirKerja){
                                $allShifts[$dateEsokPagiIncrement->format('Y-m-d H:i:s').';'.$dateEsokMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                            }
                        }elseif($j < $dayCount){
                            $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                            $allShifts[$dateEsokPagiIncrement->format('Y-m-d H:i:s').';'.$dateEsokMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                        }
                    }

                }else if($dayCount < 2){
                    $dateMalamIncrement = new DateTime($dateStartMalamKerja."+1 day");
                    $dateEsokPagiIncrement = new DateTime($dateStartPagiKerja."+1 day");
                    $dateEsokMalamIncrement = new DateTime($dateStartMalamKerja."+2day");
                    $malamFull = $this->diff($dateMalamIncrement,$dateEsokPagiIncrement);
                    $pagiFull = $this->diff($dateEsokPagiIncrement,$dateEsokMalamIncrement);
                    $allShifts[$dateMalamIncrement->format('Y-m-d H:i:s').';'.$dateEsokPagiIncrement->format('Y-m-d H:i:s')] = $malamFull;
                    $allShifts[$dateEsokPagiIncrement->format('Y-m-d H:i:s').';'.$dateEsokMalamIncrement->format('Y-m-d H:i:s')] = $pagiFull;
                }
                
                if($isEnd == 0){
                    if($akhirKerja < $dateEndMalamKerja ){
                        $end = $this->diff($dateEndMalamBeforeKerja,$akhirKerja);
                        $allShifts[$dateEndMalamBeforeKerja->format('Y-m-d H:i:s').';'.$akhirKerja] = $end;
                    }else{
                        $end = $this->diff($dateEndPagiKerja,$dateEndMalamKerja);
                        $end2 = $this->diff($dateEndMalamKerja,$akhirKerja);
                        $allShifts[$dateEndPagiKerja.';'.$dateEndMalamKerja] = $end;
                        $allShifts[$dateEndMalamKerja.';'.$akhirKerja] = $end2;
                    }
                    $isEnd += 1;
                }
                break;
            case 'ssenom':
            case 'msenos':
                $shift = $this->diff($mulaKerja,$akhirKerja);
                $allShifts[$mulaKerja.';'.$akhirKerja] = $shift;
                break;
            case 'ssm':
                $start = $this->diff($mulaKerja,$dateStartMalamKerja);
                $end = $this->diff($dateStartMalamKerja,$akhirKerja);
                $allShifts[$mulaKerja.';'.$dateStartMalamKerja] = $start;
                $allShifts[$dateStartMalamKerja.';'.$akhirKerja] = $end;
                break;
            case 'mss':
                $start = $this->diff($mulaKerja,$datePagiEsokKerja);
                $end = $this->diff($datePagiEsokKerja,$akhirKerja);
                $allShifts[$mulaKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $start;
                $allShifts[$datePagiEsokKerja->format('Y-m-d H:i:s').';'.$akhirKerja] = $end;
                break;
            case 'sselims':
                $start = $this->diff($mulaKerja,$dateStartMalamKerja);
                $mid = $this->diff($dateStartMalamKerja,$datePagiEsokKerja);
                $end = $this->diff($datePagiEsokKerja,$akhirKerja);
                $allShifts[$mulaKerja.';'.$dateStartMalamKerja] = $start;
                $allShifts[$dateStartMalamKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $mid;
                $allShifts[$datePagiEsokKerja->format('Y-m-d H:i:s').';'.$akhirKerja] = $end;
                break;
            case 'mselimm':
                if($mulaKerja < $dateStartPagiKerja){
                    $start = $this->diff($mulaKerja,$dateStartPagiKerja);
                    $mid = $this->diff($dateStartPagiKerja,$dateStartMalamKerja);
                    $end = $this->diff($dateStartMalamKerja,$akhirKerja);
                    $allShifts[$mulaKerja.';'.$dateStartPagiKerja] = $start;
                    $allShifts[$dateStartPagiKerja.';'.$dateStartMalamKerja] = $mid;
                    $allShifts[$dateStartMalamKerja.';'.$akhirKerja] = $end;
                }else{
                    $start = $this->diff($mulaKerja,$datePagiEsokKerja);
                    $mid = $this->diff($datePagiEsokKerja,$dateMalamEsokKerja);
                    $end = $this->diff($dateMalamEsokKerja,$akhirKerja);
                    $allShifts[$mulaKerja.';'.$datePagiEsokKerja->format('Y-m-d H:i:s')] = $start;
                    $allShifts[$datePagiEsokKerja->format('Y-m-d H:i:s').';'.$dateMalamEsokKerja->format('Y-m-d H:i:s')] = $end;
                    $allShifts[$dateMalamEsokKerja->format('Y-m-d H:i:s').';'.$akhirKerja] = $mid;
                }
                break;
            default:
                # code...
                break;
        }
        return $allShifts;
    }

}