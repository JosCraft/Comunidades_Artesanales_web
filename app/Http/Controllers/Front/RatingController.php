<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class RatingController extends Controller
{
    // Agregar calificación y reseña a un producto en front/products/detail.blade.php    
    public function addRating(Request $request) {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->back()->with('error_message', 'Inicia sesión para calificar este producto');
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $user_id = Auth::id(); // Obtener el ID del usuario autenticado

            // Verificar si el usuario ya ha calificado este producto
            $hasRated = Rating::where('user_id', $user_id)
                ->where('product_id', $data['product_id'])
                ->exists();

            if ($hasRated) {
                return redirect()->back()->with('error_message', '¡Ya has calificado este producto anteriormente!');
            }

            // Validación de la calificación
            if (empty($data['rating'])) {
                return redirect()->back()->with('error_message', '¡Por favor, selecciona una estrella para calificar el producto!');
            }

            // Crear una nueva calificación
            $rating = new Rating();
            $rating->user_id = $user_id;
            $rating->product_id = $data['product_id'];
            $rating->review = $data['review'] ?? ''; // Usar un valor predeterminado si no hay reseña
            $rating->rating = $data['rating'];
            $rating->status = 0; // Valor predeterminado de 0 (deshabilitado) para aprobación del administrador

            $rating->save();

            // Mensaje de éxito
            return redirect()->back()->with('success_message', '¡Gracias por calificar el producto! Se mostrará después de ser aprobado por un administrador.');
        }
    }
    
}
