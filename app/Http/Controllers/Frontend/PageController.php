<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;

class PageController extends Controller
{
    public function contact(){
        $breadcrumb = [
            'pages' => [

            ],
            'active'=> 'Contact'
        ];

        return view('frontend.pages.contact', compact('breadcrumb'));
    }

    public function about(){
        $about = About::where("id",1)->first();
        $breadcrumb = [
            'pages' => [

            ],
            'active'=> 'About'
        ];
        return view('frontend.pages.about', compact("about", 'breadcrumb'));
    }

    public function product(Request $request, $slug=null){

        $category = request()->segment(1) ?? null;
        $sizes = !empty($request->size) ? explode(',', $request->size) : null;
        $colors = !empty($request->color) ? explode(',', $request->color) : null;
        $start_price = $request->min ?? null;
        $end_price = $request->max ?? null;

        $order = $request->order ?? 'id';
        $sort = $request->sort ?? 'desc';


        $anaKategori = null;
        $altKategori = null;
       if(!empty($category) && empty($slug)) {
            $anaKategori = Categoria::where('slug',$category)->first();
        }else if (!empty($category) && !empty($slug)){
            $anaKategori = Categoria::where('slug',$category)->first();
            $altKategori = Categoria::where('slug',$slug)->first();
        }
       // dd('llego');
        $breadcrumb = [
            'pages' => [

            ],
            'active'=> 'Products'
        ];

        if(!empty($anaKategori) && empty($altKategori)) {
            $breadcrumb['active'] = $anaKategori->name;
        }

        if(!empty($altKategori)) {
            $breadcrumb['pages'][] = [
                'link'=> route($anaKategori->slug.'product'),
                'name' => $anaKategori->name
            ];

            $breadcrumb['active'] = $altKategori->name;
        }

        // return $breadcrumb;


        $products = Producto::where("estado","1")
        ->select(['id','nombre_producto', 'slug', 'size', 'color', 'precio', 'id_categoria', 'image'])
        // filtreleme
        ->where(function($q) use($sizes, $colors, $start_price, $end_price){
            if(!empty($sizes)){
                $q->whereIn('size', $sizes);
            }
            if(!empty($colors)){
                $q->whereIn('color', $colors);
            }
            if(!empty($start_price) && $end_price){
                // $q->whereBetween('price', [$start_price, $end_price]);
                $q->where('precio', '>=' , $start_price);
                $q->where('precio', '<=', $end_price);
            }
            return $q;
        })

        ->with('categoria')
        ->orderBy($order, $sort)->paginate(21);

        if($request->ajax()){
            $view = view('frontend.ajax.productList',compact('products'))->render();
            return response(['data'=>$view, 'paginate'=>(string) $products->withQueryString()->links('vendor.pagination.custom')]);
        }

        $sizeLists = Producto::where("estado","1")->groupBy('size')->pluck('size')->toArray();

        $colors = Producto::where("estado","1")->groupBy('color')->pluck('color')->toArray();


        $maxPrice = Producto::max('precio');

        return view('frontend.pages.products', compact('breadcrumb', 'products' , 'maxPrice', 'sizeLists', 'colors'));
    }

    public function saleproduct(){
        $breadcrumb = [
            'pages' => [

            ],
            'active'=> 'Discounted Products'
        ];

        return view('frontend.pages.products', compact('breadcrumb'));
    }

    public function productdetail($slug){
        // $product = Producto::whereSlug($slug)->first();
        $product = Producto::where("slug",$slug)->where('estado', '1')->firstOrFail();

        $products = Producto::where('id', '!=', $product->id)
        ->where('id_categoria', $product->id_categoria) // ürünün kategorisiyle aynı olan ürünleri getir
        ->where('estado', '1')
        ->limit('6')
        ->orderBy('id', 'desc')
        ->get();

        $category = Categoria::where('id',$product->id_categoria)->first();

            $breadcrumb = [
                'pages' => [

                ],
                'active'=>  $product->name
            ];

            if(!empty($category)) {
                $breadcrumb['pages'][] = [
                    'link'=> route($category->slug.'product'),
                    'name' => $category->name
                ];
            }

        return view('frontend.pages.product', compact('breadcrumb', 'product', 'products'));
    }

}
