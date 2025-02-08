<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomRegisterController extends Controller
{
    public function showRegisterForm()
    {
        // Carga todas las especialidades desde la tabla specialties
        $specialties = \App\Models\Specialty::all();
    
        // Envía las especialidades a la vista
        return view('custom_auth.register', compact('specialties'));
    }
    

    public function register(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:custom_users', // Validación correcta
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:admin,user,doctor',
            'specialty' => 'nullable|string|max:255|required_if:role,doctor',
        ]);

        // Crear el nuevo usuario
        $user = CustomUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
            'specialty' => $request->input('role') === 'doctor' ? $request->input('specialty') : null,
        ]);

        // Mostrar mensaje de éxito sin iniciar sesión
        Session::flash('success', 'Registro completado con éxito.');

        // Redirigir a la página actual del formulario de registro
        return redirect()->route('custom_register_form');
    }
}
