<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\RolesUserController;

use Illuminate\Http\Request;
use App\Models\Comunidad;
use App\Models\Delivery;

class GestionDeliveryController extends Controller{

    public function index()
{
    $deliveries = Delivery::all();
    return view('admin.gestion_delivery', compact('deliveries'))
        ->with('success', session('success'))
        ->with('error', session('error'));
}

public function indexMessage($response)
{
    $deliveries = Delivery::all();
    if ($response->status == 'success') {
        return view('admin.gestion_delivery', ['deliveries' => $deliveries])
            ->with('success', $response->message);
    } else {
        return view('admin.gestion_delivery', ['deliveries' => $deliveries])
            ->with('error', $response->message); // Aquí corregí 'gestion_producto' a 'gestion_delivery'
    }
}

public function edit($id)
{
    $delivery = Delivery::find($id);

    if (!$delivery) {
        return redirect()->route('admin.gestion_delivery')->with('error', 'Delivery no encontrado'); // Corregí la ruta
    }
    return view('admin/delivery/edit_delivery', ['delivery' => $delivery]); // Cambié 'deliveries' a 'delivery' ya que es solo un registro
}

public function update(Request $request, $id)
{
    $response = app(DeliveriesController::class)->update($request, $id);

    if ($response->status == 'success') {
        return redirect()->route('admin.gestion_delivery')->with('success', $response->message); // Corregí 'gestion_delivey' a 'gestion_delivery'
    } else {
        return back()->with('error', $response->message);
    }
}

public function destroy($id)
{
    $response = app(DeliveriesController::class)->destroy($id);

    if ($response->status == 'success') {
    app(RolesUserController::class)->destroy(5,$id);
        return redirect()->route('admin.gestion_delivery')->with('success', $response->message);
    } else {
        return back()->with('error', $response->message);
    }
}




}
