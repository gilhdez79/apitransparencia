<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function validar(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'Usuario' => ['required', 'string'],
            'Pasword' => ['required', 'string'],
        ]);

        $usuario = DB::table('Usuarios')
            ->where('Usuario', $datos['Usuario'])
            ->first();

        if (! $usuario || ! $this->passwordValido($datos['Pasword'], $usuario->Pasword ?? null)) {
            return response()->json([
                'message' => 'Usuario o password incorrecto',
            ], 401);
        }

        $datosUsuario = (array) $usuario;
        unset($datosUsuario['Pasword'], $datosUsuario['Password']);

        return response()->json([
            'message' => 'Usuario validado correctamente',
            'usuario' => $datosUsuario,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'Usuario' => ['required', 'string', 'max:255', 'unique:Usuarios,Usuario'],
            'Nombre' => ['required', 'string', 'max:255'],
            'ApellidoP' => ['required', 'string', 'max:255'],
            'Amaterno' => ['required', 'string', 'max:255'],
            'Pasword' => ['required', 'string', 'min:8'],
            'CorreoElectronico' => ['required', 'email', 'max:255', 'unique:Usuarios,CorreoElectronico'],
        ]);

        $usuario = Usuario::create([
            'Usuario' => $datos['Usuario'],
            'Nombre' => $datos['Nombre'],
            'ApellidoP' => $datos['ApellidoP'],
            'Amaterno' => $datos['Amaterno'],
            'Pasword' => Hash::make($datos['Pasword']),
            'CorreoElectronico' => $datos['CorreoElectronico'],
        ]);

        return response()->json([
            'message' => 'Usuario creado correctamente',
            'usuario' => [
                'id' => $usuario->getKey(),
                'Usuario' => $datos['Usuario'],
            ],
        ], 201);
    }

    private function passwordValido(string $passwordIngresado, ?string $passwordGuardado): bool
    {
        if (! $passwordGuardado) {
            return false;
        }

        if (Hash::isHashed($passwordGuardado)) {
            return Hash::check($passwordIngresado, $passwordGuardado);
        }

        return hash_equals($passwordGuardado, $passwordIngresado);
    }
}
