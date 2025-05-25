<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para registrar nuevos usuarios
    public function register(Request $request)
    {
        // Validar los datos del formulario de registro
        $request->validate([
            'username' => 'required|unique:users,name', // El nombre de usuario es obligatorio y único en la columna 'name'
            'email' => 'required|email|unique:users,email', // El email es obligatorio, debe ser válido y único
            'password' => 'required|min:6', // La contraseña es obligatoria y debe tener al menos 6 caracteres
        ]);

        // Crear un nuevo usuario en la base de datos
        User::create([
            'name' => $request->username, // Asignar el username al campo 'name'
            'email' => $request->email, // Asignar el email
            'password' => Hash::make($request->password), // Encriptar la contraseña antes de guardarla
        ]);

        // Redireccionar al login con mensaje de éxito
        return redirect('/login')->with('success', 'Usuario registrado con éxito.');
    }

    // Método para iniciar sesión (login)
    public function login(Request $request)
    {
        // Validar que los campos estén presentes y correctos
        $request->validate([
            'email' => 'required|email', // El email es obligatorio y debe tener formato válido
            'password' => 'required', // La contraseña es obligatoria
        ]);

        // Obtener solo el email y la contraseña del formulario
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario con las credenciales
        if (Auth::attempt($credentials)) {
            // Si es exitoso, regenerar la sesión para mayor seguridad
            $request->session()->regenerate();

            // Redirigir a la ruta protegida (por defecto, /home)
            return redirect()->intended('/home');
        }

        // Si la autenticación falla, regresar con mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
}
