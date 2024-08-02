<?php

namespace App\Providers;

use App\Models\Students;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        $total_numbers = Students::where("status","=",(bool)false)->count();
        if($total_numbers===null){
            $total_numbers = 0 ;
        }
        View::share(["total_numbers"=> $total_numbers]);
    }
}
