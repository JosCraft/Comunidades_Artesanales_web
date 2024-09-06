<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use Symfony\Component\HttpFoundation\Response;

use App\Models\Rol;
use App\Models\UserRol;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Get the current authenticated user
        $user = Auth::user();

        // Get the role from the database
        $rol = $this->getRol($role);

        // Check if the user has the specified role
        if (Auth::check() && $this->checkUserRol($rol, $user)) {
            return $next($request);
        }

        // If the user does not have the required role
        abort(403, 'Unauthorized action.');
    }

    /**
     * Get the role by name.
     *
     * @param  string  $role
     * @return \App\Models\Rol|null
     */
    private function getRol($role)
    {
        return Rol::where('name', $role)->first();
    }

    /**
     * Check if the user has the specified role.
     *
     * @param  \App\Models\Rol|null  $rol
     * @param  \App\Models\User|null  $user
     * @return bool
     */
    private function checkUserRol($rol, $user)
    {
        // If the role exists, check if the user has that role
        if ($rol && $user) {
            return UserRol::where('user_id', $user->id)
                ->where('role_id', $rol->id)
                ->exists();  // Use `exists()` instead of `first()` for a boolean check
        }

        return false;
    }
}

