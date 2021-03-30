<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
         
        // Check user role
        switch (Auth::user()->role_id) {
            case '1':
                    return 'pentadbir-sistem/dashboard';
                break;
            case '2':
                    return 'penyelia/dashboard';
                break; 
            case '3':
                    return 'datuk-bandar/dashboard';
                break; 
            case '4':
                    return 'ketua-bahagian/dashboard';
                break; 
            case '5':
                    return 'ketua-jabatan/dashboard';
                break; 
            case '6':
                    return 'kerani-semakan/dashboard';
                break; 
            case '7':
                    return 'kerani-pemeriksa/dashboard';
                break; 
            case '8':
                    return 'kakitangan/dashboard';
                break; 
            case '9':
                    return 'pelulus-pindaan/dashboard';
                break; 
            default:
                    return '/login'; 
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
