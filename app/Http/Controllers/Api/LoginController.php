<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'Usuario' => ['required', 'string'],
            'Pasword' => ['nullable', 'string', 'required_without:password'],
            'password' => ['nullable', 'string', 'required_without:Pasword'],
        ]);

        $usuario = DB::table('Usuarios')
            ->where('Usuario', $request->input('Usuario'))
            ->first();

        if (! $usuario) {
            return response()->json([
                'message' => 'Usuario o password incorrecto',
            ], 401);
        }

        $passwordIngresado = $request->input('Pasword', $request->input('password'));
        $passwordGuardado = $usuario->Pasword
            ?? $usuario->Password
            ?? $usuario->password
            ?? null;

        if (! $passwordGuardado || ! $this->passwordValido($passwordIngresado, $passwordGuardado)) {
            return response()->json([
                'message' => 'Usuario o password incorrecto',
            ], 401);
        }

        $datosUsuario = (array) $usuario;
        unset($datosUsuario['Pasword'], $datosUsuario['Password'], $datosUsuario['password']);

        return response()->json([
            'message' => 'Login correcto',
            'usuario' => $datosUsuario,
        ]);
    }

    private function passwordValido(string $passwordIngresado, string $passwordGuardado): bool
    {
        if (Hash::isHashed($passwordGuardado)) {
            return Hash::check($passwordIngresado, $passwordGuardado);
        }

        return hash_equals($passwordGuardado, $passwordIngresado);
    }
}
