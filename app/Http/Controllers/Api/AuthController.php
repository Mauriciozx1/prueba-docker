<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        $this->beginTransaction();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $response = [
            'message' => 'Usuario registrado correctamente.',
            'user'    => $user,
        ];

        $this->commit();

        return new AuthResource((object) $response);
    }

    public function login(LoginRequest $request)
    {
        // Check email exist
        $user = User::where('email', $request->email)->first();

        // Check password
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Credenciales inválidas'
                ], 401);
        }

        $response = [
            'message' => 'Se ha iniciado sesión correctamente.',
            'user'    => $user,
        ];

        return new AuthResource((object) $response);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        $response = [
            'message' => 'Se ha cerrado la sesión correctamente.',
            'user'    => null,
        ];

        return new AuthResource((object) $response);
    }
}
