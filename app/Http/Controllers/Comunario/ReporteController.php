<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; 

class ReporteController extends Controller {
    public function index() {
        $reportes = Venta::all(); 
        return view('comunario.reportes.index', compact('reportes'));
    }
}