<?php
namespace App\Http\Controllers\Comunario;

use Illuminate\Http\Request;
use App\Models\Venta;

use App\Http\Controllers\Controller;

class ReporteController extends Controller {
    public function index() {
        $reportes = Venta::all();
        return view('comunario.reportes.index', compact('reportes'));
    }
}
