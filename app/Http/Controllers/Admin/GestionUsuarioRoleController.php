<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RolesUserController;
use App\Http\Controllers\ComunariosController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\DeliveriesController;
use App\Http\Controllers\CompradoresController;

use App\Models\User;
use App\Models\UserRol;

use Illuminate\Http\Request;
use App\Http\Requests\AdministradorRequest;
use App\Http\Requests\ComunarioRequest;
use App\Http\Requests\DeliveryRequest;

class GestionUsuarioRoleController extends Controller
{
    protected $rolesUserController;
    protected $comunariosController;
    protected $administradoresController;
    protected $deliveriesController;
    protected $compradoresController;

    public function __construct(
        RolesUserController $rolesUserController,
        ComunariosController $comunariosController,
        AdministradoresController $administradoresController,
        DeliveriesController $deliveriesController,
        CompradoresController $compradoresController
    ) {
        $this->rolesUserController = $rolesUserController;
        $this->comunariosController = $comunariosController;
        $this->administradoresController = $administradoresController;
        $this->deliveriesController = $deliveriesController;
        $this->compradoresController = $compradoresController;
    }

    public function index()
    {
        $users = User::all();
        $rolesUser = UserRol::all();

        return view('admin.add_role', ['users' => $users, 'rolesUser' => $rolesUser]);
    }

    public function create_user_role($id)
    {
        $user = User::find($id);

        return view('admin.user.add_role')->with([
            'user' => $user,
        ]);
    }

    public function store($role, $user, Request $request)
    {
        $role_id = $this->roleID($role);

        $requestRolU = new Request([
            'rol_id' => $role_id,
            'user_id' => $user,
        ]);
        // Save the role association
        $this->rolesUserController->store($requestRolU);

        $response = null;

        switch ($role_id) {
            case 2: // Comunario
                $comunarioRequest = new ComunarioRequest([
                    'user_id' => $user,
                    'especialidad' => $request->especialidad,
                    'id_comunidad' => $request->id_comunidad,
                ]);
                $response = $this->comunariosController->store($comunarioRequest);
                break;

            case 3: // Administrador
                $adminRequest = new AdministradorRequest([
                    'user_id' => $user,
                    'cod_Adm' => $request->cod_Adm,
                ]);
                $response = $this->administradoresController->store($adminRequest);
                break;

            case 5: // Delivery
                $deliveryRequest = new DeliveryRequest([
                    'user_id' => $user,
                    'servicio' => $request->servicio,
                    'salario' => $request->salario,
                    'turno' => $request->turno,
                    'id_comunidad' => $request->id_comunidad,
                ]);
                $response = $this->deliveriesController->store($deliveryRequest);
                break;
        }

        return $this->handleResponse($response, 'agregar');
    }

    public function update(Request $request, $user, $role)
    {
        $role_id = $this->roleID($role);
        // Update the role association
        $this->rolesUserController->update([
            'rol_id' => $role_id,
            'user_id' => $user,
        ]);

        $response = null;

        switch ($role_id) {
            case 2: // Comunario
                $comunarioRequest = new ComunarioRequest([
                    'user_id' => $user,
                    'especialidad' => $request->especialidad,
                    'id_comunidad' => $request->id_comunidad,
                ]);
                $response = $this->comunariosController->update($comunarioRequest, $user);
                break;

            case 3: // Administrador
                $adminRequest = new AdministradorRequest([
                    'user_id' => $user,
                    'cod_Adm' => $request->cod_Adm,
                ]);
                $response = $this->administradoresController->update($adminRequest, $user);
                break;

            case 5: // Delivery
                $deliveryRequest = new DeliveryRequest([
                    'user_id' => $user,
                    'servicio' => $request->servicio,
                    'salario' => $request->salario,
                    'turno' => $request->turno,
                    'id_comunidad' => $request->id_comunidad,
                ]);
                $response = $this->deliveriesController->update($deliveryRequest, $user);
                break;
        }

        return $this->handleResponse($response, 'update');
    }

    public function destroy($role, $user)
    {
        $role_id = $this->roleID($role);

        $this->rolesUserController->destroy( $role_id ,$user);

        $response = null;

        switch ($role_id) {
            case 2: // Comunario
                $response = $this->comunariosController->destroy($user);
                break;

            case 3: // Administrador
                $response = $this->administradoresController->destroy($user);
                break;

            case 4: // Comprador
                $response = $this->compradoresController->destroy($user);
                break;

            case 5: // Delivery
                $response = $this->deliveriesController->destroy($user);
                break;
        }

        return $this->handleResponse($response, 'delete');
    }

    private function roleID($role)
    {

        switch ($role) {
            case 'comunario':
                return 2;
            case 'admin':
                return 3;
            case 'comprador':
                return 4;
            case 'delivery':
                return 5;
            default:
                throw new \InvalidArgumentException("Invalid role: $role");
        }
    }

    private function handleResponse($response, $action)
    {
        if ($response->status === 'success') {
            return redirect()->back()->with('message', $response->message);
        } else {
            return redirect()->back()->with('error', 'Error al ' . $action . ': ' . $response->message);
        }
    }
}
