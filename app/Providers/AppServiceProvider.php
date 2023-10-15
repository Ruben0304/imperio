<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Dato;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;

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
        if (!session()->has('cambio') && request()->cookie('moneda') && request()->cookie('moneda') == 'eur') {
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, "https://api.exchangerate-api.com/v4/latest/USD");
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $output = curl_exec($ch);
            // curl_close($ch);
            // $outputData = json_decode($output, true);
            // session()->put('cambio', $outputData['rates']['EUR']);
            session()->put('cambio', 0.9);
           
        }

        View::composer('*', function ($view) {
            $cartCount = Cart::getTotalQuantity();
            $categorias = Categoria::all();
            $color = Dato::where('nombre', 'color')->first()->valor;

            $view->with('cartCount', $cartCount);
            $view->with('categorias', $categorias);
            $view->with('color', $color);
            $view->with('exchangeRate', session('cambio'));
        });
    }
}
