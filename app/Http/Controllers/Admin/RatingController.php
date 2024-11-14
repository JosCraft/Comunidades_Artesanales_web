<?php
// se cambio---------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Product;

class RatingController extends Controller
{
    public function ratings() { // Renderizar ratings.blade.php en el panel de administración
        Session::put('page', 'ratings');

        $adminType = Auth::guard('admin')->user()->type; // Obtener el tipo de usuario autenticado
        $vendor_id = Auth::guard('admin')->user()->vendor_id; // Obtener el ID del vendedor

        if ($adminType == 'vendor') { // Si el usuario autenticado es un vendedor
            $ratings = Rating::with(['user', 'product'])
                ->whereHas('product', function($query) use ($vendor_id) {
                    $query->where('vendor_id', $vendor_id);
                })->get()->toArray(); // Obtener solo las calificaciones de los productos del vendedor
        } else {
            $ratings = Rating::with(['user', 'product'])->get()->toArray(); // Obtener todas las calificaciones si es administrador
        }

        return view('admin.ratings.ratings')->with(compact('ratings')); // Renderizar la vista con las calificaciones
    }

    public function updateRatingStatus(Request $request) { // Actualizar el estado de la calificación usando AJAX
        if ($request->ajax()) {
            $data = $request->all(); // Obtener los datos de la solicitud AJAX

            // Cambiar el estado de activo a inactivo y viceversa
            $status = ($data['status'] == 'Active') ? 0 : 1;

            Rating::where('id', $data['rating_id'])->update(['status' => $status]); // Actualizar el estado de la calificación

            return response()->json([
                'status'    => $status,
                'rating_id' => $data['rating_id']
            ]);
        }
    }

    public function respondToReview(Request $request, $id) { // Responder a una reseña
        $request->validate([
            'response' => 'required|string',
        ]);
    
        $rating = Rating::findOrFail($id);
        $rating->response = $request->response;
        $rating->save();
    
        return redirect()->back()->with('success_message', 'Respuesta enviada correctamente.');
    }
}
// se cambio---------------------------------------------------------------