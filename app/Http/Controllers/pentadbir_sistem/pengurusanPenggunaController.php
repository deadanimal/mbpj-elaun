<?php

namespace App\Http\Controllers\pentadbir_sistem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class pengurusanPenggunaController extends Controller
{
    public function index()
    {
        $users = User::with('maklumat_pekerjaan')->get();
        $userWithPaddedCustomerID = $users->map(function($user) {
                                            $user->CUSTOMERID = sprintf('%05d', $user->CUSTOMERID);
                                            return $user;
                                        });
        if(request()->ajax()) {
            return datatables()->of($userWithPaddedCustomerID)->make(true);
        }

        return view('core.pentadbir_sistem.pengurusanPengguna');
    }
}
