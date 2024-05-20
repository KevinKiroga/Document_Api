<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Verificar con los parametros del request sin son iguales con la de base de datos
       if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'No autorizado'
            ], 401);
       }

       // Buscar en la BD el usuario con ese email
       $user = User::where('email', $request['email'])->firstOrFail();
       // Crear el token de autenticacion
       $token = $user->createToken('auth_token')->plainTextToken;

       // Respuesta de la peticion en JSON
        return response()->json([
            'message' => 'Autorizado',
            'token'  => $token,
            'user'  => $user
        ]);
    }

    public function logout()
    {
        // Todos los token del usuario autenticado va a ser eliminado
        auth()->user()->tokens()->delete();

        // Respuesta del JSON
        return response()->json([
            'message' => 'Se ha cerrado la session'
        ], 200);
    }
}
