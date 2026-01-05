<?php

namespace App\Providers;

use App\Http\Controllers\SessionBank;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
        Blade::directive('rupiah', function($expression){
            return "<?= 'Rp. '. number_format($expression, 0, ',', '.') ?>";
        });

        Blade::directive('percentage', function($expression){
            return "<?= number_format($expression, 2, ',', '.') . '%' ?>";
        });

        Blade::directive('ucfirst', function($expression){
            return "<?= ucfirst($expression) ?>";
        });

        Blade::directive('myprofile', function ($expression) {

            return "<?php echo \App\Models\Admin\Profile::where('id_profile', Session::get('bank'))->value($expression); ?>";
        });

        // Blade directive untuk menyembunyikan karakter awal
        Blade::directive('maskStart', function ($expression) {
            return "<?php echo substr($expression, -3) === false ? $expression : str_repeat('*', strlen($expression) - 3) . substr($expression, -3); ?>";
        });

        // Blade directive untuk menyembunyikan karakter akhir
        Blade::directive('maskEnd', function ($expression) {
            return "<?php echo substr($expression, 0, -3) === false ? $expression : substr($expression, 0, -3) . str_repeat('*', 3); ?>";
        });

        Blade::directive('pusat', function ($expression) {
            return "<?php echo \App\Models\Admin\Profile::where('id_profile', 1)->value($expression); ?>";
        });
    }
}
