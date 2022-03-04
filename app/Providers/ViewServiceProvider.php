<?php

namespace App\Providers;

use App\Models\ThuongHieu;
use App\Models\LoaiSanPham;
use App\Models\Ram;
use App\Models\BoNhoTrong;
use App\Models\ThietKe;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        View::composer('layouts.frontend', function ($view) {
            $thuonghieu = ThuongHieu::orderBy('tenthuonghieu')->get();
            $view->with('thuonghieu',$thuonghieu);
        });

        View::composer('layouts.frontend', function ($view) {
            $loaisanpham = LoaiSanPham::orderBy('tenloai')->get();
            $view->with('loaisanpham',$loaisanpham);
        });
        View::composer('layouts.frontend', function ($view) {
            $ram = Ram::orderBy('tenram')->get();
            $view->with('ram',$ram);
        });
        View::composer('layouts.frontend', function ($view) {
            $bonhotrong = BoNhoTrong::orderBy('tenbonhotrong')->get();
            $view->with('bonhotrong',$bonhotrong);
        });
        View::composer('layouts.frontend', function ($view) {
            $thietke = ThietKe::orderBy('tenthietke')->get();
            $view->with('thietke',$thietke);
        });
        
    }
}