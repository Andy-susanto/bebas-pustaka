<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        //

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        Blade::directive('tanggal', function ($expression) {
            return "<?php echo date_format(date_create($expression),'d-M-Y'); ?>";
        });

        Blade::directive('tanggaljam', function ($expression) {
            return "<?php echo date_format(date_create($expression),'d-M-Y H:i:s'); ?>";
        });

        Blade::directive('tanggalsurat', function ($expression) {
            return Carbon::now()->isoFormat('D MMMM Y');
        });
    }
}
