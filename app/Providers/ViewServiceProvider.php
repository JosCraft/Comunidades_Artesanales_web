<?php



namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comunidad;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the 'comunidades' data with all views
        View::composer('*', function ($view) {
            $view->with('comunidades', Comunidad::all());
        });
    }

    public function register()
    {
        //
    }
}
