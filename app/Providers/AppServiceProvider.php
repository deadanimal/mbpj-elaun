<?php

namespace App\Providers;

use App\Item;
use App\User;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);
        User::observe(UserObserver::class);

        View::composer(
            'layouts.headers.cards', 
            'App\Http\View\Composers\DashboardCardsComposer');
        View::composer(
            'core.kakitangan.cardsKakitangan',
            'App\Http\View\Composers\DashboardCardsKakitanganComposer');
        View::composer([
            'layouts.navbars.partials.2ndsidebar', 
            'layouts.navbars.navs.auth', 
            'layouts.headers.breadcrumbs', 
            'layouts.navbars.sidebar', 
            'core.kakitangan.dashboard' 
        ],
            'App\Http\View\Composers\SideBarComposer');
        View::composer([
            'core.kerani_pemeriksa.partials.formOT&EL',
            'core.kerani_semakan.partials.formOT&EL',
            'core.pelulus_pindaan_sah.partials.formOT&EL',
            'core.pelulus_pindaan_lulus.partials.formOT&EL',
            'core.pentadbir_sistem.pengurusanPengguna',
        ],
            'App\Http\View\Composers\SenaraiJabatanComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
