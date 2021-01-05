<?php

namespace App\Http\Controllers;
use App\User;
use DataTables;
use App\DataTables\UsersDataTable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages.dashboard');
    }
}
