<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Rating;

class IndexController extends Controller
{
    public function index() {
        // Obtener todos los banners activos (habilitados)
        $sliderBanners = Banner::where('type', 'Slider')->where('status', 1)->get()->toArray(); 
        $fixBanners    = Banner::where('type', 'Fix')->where('status', 1)->get()->toArray(); 
        
        // Obtener los productos nuevos
        $newProducts = Product::orderBy('id', 'Desc')->where('status', 1)->limit(8)->get();
        
        // Calcular el promedio de calificaciones y el conteo de reseñas para los productos nuevos
        foreach ($newProducts as $product) {
            $ratings = Rating::where('product_id', $product->id)->get();
            $avgRating = $ratings->avg('rating'); // Promedio de calificaciones
            $ratingsCount = $ratings->count(); // Conteo de calificaciones
            $product->avgRating = $avgRating; // Agregar promedio a cada producto
            $product->ratings_count = $ratingsCount; // Agregar conteo a cada producto
        }

        // Obtener los productos más vendidos
        $bestSellers = Product::where([
            'is_bestseller' => 'Yes',
            'status'        => 1 // producto habilitado (activo)
        ])->inRandomOrder()->get();

        // Calcular el promedio de calificaciones y el conteo de reseñas para los productos más vendidos
        foreach ($bestSellers as $product) {
            $ratings = Rating::where('product_id', $product->id)->get();
            $avgRating = $ratings->avg('rating');
            $ratingsCount = $ratings->count();
            $product->avgRating = $avgRating;
            $product->ratings_count = $ratingsCount;
        }

        // Obtener productos con descuento
        $discountedProducts = Product::where('product_discount', '>', 0)->where('status', 1)->limit(6)->inRandomOrder()->get();

        // Calcular el promedio de calificaciones y el conteo de reseñas para los productos con descuento
        foreach ($discountedProducts as $product) {
            $ratings = Rating::where('product_id', $product->id)->get();
            $avgRating = $ratings->avg('rating');
            $ratingsCount = $ratings->count();
            $product->avgRating = $avgRating;
            $product->ratings_count = $ratingsCount;
        }

        // Obtener productos destacados
        $featuredProducts = Product::where([
            'is_featured' => 'Yes',
            'status'      => 1 // producto habilitado (activo)
        ])->limit(6)->get();

        // Calcular el promedio de calificaciones y el conteo de reseñas para los productos destacados
        foreach ($featuredProducts as $product) {
            $ratings = Rating::where('product_id', $product->id)->get();
            $avgRating = $ratings->avg('rating');
            $ratingsCount = $ratings->count();
            $product->avgRating = $avgRating;
            $product->ratings_count = $ratingsCount;
        }

        // Static SEO (HTML meta tags)
        $meta_title       = 'Multi Vendor E-commerce Website';
        $meta_description = 'Online Shopping Website which deals in Clothing, Electronics & Appliances Products';
        $meta_keywords    = 'eshop website, online shopping, multi vendor e-commerce';

        return view('front.index')->with(compact('sliderBanners', 'fixBanners', 'newProducts', 'bestSellers', 'discountedProducts', 'featuredProducts', 'meta_title', 'meta_description', 'meta_keywords'));
    }    
}
