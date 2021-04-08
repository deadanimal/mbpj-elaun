<?php

namespace App\Http\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SideBarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $name = Auth::user()->role->NAME;
        $temp = strtolower($name);
        $temp = str_replace(" ","-",$temp);
    
        $view->with('temp', $temp);
    }
}