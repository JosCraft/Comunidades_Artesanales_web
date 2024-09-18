<?php



namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Comunidad;
use App\Models\Categoria;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share the 'comunidades' data with all views
        View::composer('*', function ($view) {
            $view->with('comunidades', Comunidad::all());
        });
        // Share the 'categorias' data with all views
        View::composer('*', function ($view) {
            $view->with('categorias', Categoria::all());
        });
    }

    public function register()
    {
        //
    }
}
