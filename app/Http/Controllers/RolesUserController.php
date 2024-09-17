<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

use App\Models\User;
use App\Models\Rol;
use App\Models\UserRol;

class RolesUserController extends Controller
{
    // CRUD
    public function store(Request $request)
    {
        try {
            $userRol = new UserRol();
            $userRol->user_id = $request->input('user_id');
            $userRol->role_id = $request->input('rol_id');
            $userRol->save();

            return (object) [
                'status' => 'success',
                'message' => 'UserRol created successfully',
                'data' => $userRol
            ];
        } catch (QueryException $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Database query error: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Unexpected error: ' . $e->getMessage()
            ];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $userRol = UserRol::findOrFail($id);
            $userRol->user_id = $request->input('user_id');
            $userRol->role_id = $request->input('rol_id');
            $userRol->save();

            return (object) [
                'status' => 'success',
                'message' => 'UserRol updated successfully',
                'data' => $userRol
            ];
        } catch (ModelNotFoundException $e) {
            return (object) [
                'status' => 'error',
                'message' => 'UserRol not found: ' . $e->getMessage()
            ];
        } catch (QueryException $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Database query error: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Unexpected error: ' . $e->getMessage()
            ];
        }
    }

    public function destroy($rol_id, $id)
    {
        try {
            $userRol = UserRol::where('user_id', $id)
            ->where('role_id', $rol_id)
            ->first();
            $userRol->delete();

            return (object) [
                'status' => 'success',
                'message' => 'UserRol deleted successfully'
            ];
        } catch (ModelNotFoundException $e) {
            return (object) [
                'status' => 'error',
                'message' => 'UserRol not found: ' . $e->getMessage()
            ];
        } catch (QueryException $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Database query error: ' . $e->getMessage()
            ];
        } catch (\Exception $e) {
            return (object) [
                'status' => 'error',
                'message' => 'Unexpected error: ' . $e->getMessage()
            ];
        }
    }
}
