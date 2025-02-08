<?php

namespace App\Http\Controllers;

use App\Models\CustomUser; // Asegúrate de importar el modelo correcto
use App\Models\MedicalRecord; // Importa el modelo MedicalRecord
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Filtrar para obtener solo los usuarios con el rol de 'doctor'
        $doctors = CustomUser::where('role', 'doctor')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:custom_users,email', // Cambiado para que coincida con la tabla correcta
            'specialty' => 'required',
            'phone' => 'required',
        ]);

        CustomUser::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => 'doctor', // Asegura que el rol sea doctor
            'specialty' => $request->input('specialty'),
            'password' => bcrypt('defaultpassword') // Debes definir una contraseña por defecto o solicitarla
        ]);

        return redirect()->route('doctors.index')
                         ->with('success', 'Especialista creado con éxito.');
    }

    public function show(CustomUser $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = CustomUser::findOrFail($id); // Cambiar a CustomUser
        $specialties = \App\Models\Specialty::all(); // Asegúrate de que Specialty esté importado correctamente
    
        return view('doctors.edit', compact('doctor', 'specialties'));
    }
    
    public function update(Request $request, CustomUser $doctor)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:custom_users,email,' . $doctor->id, // Cambiado para que coincida con la tabla correcta
            'specialty' => 'required',
            'phone' => 'required',
        ]);

        $doctor->update($request->all());

        return redirect()->route('doctors.index')
                         ->with('success', 'Especialista actualizado con éxito.');
    }

    public function destroy(CustomUser $doctor)
    {
        // Desvincula las fichas médicas
        MedicalRecord::where('doctor_id', $doctor->id)->update(['doctor_id' => null]);

        // Ahora, elimina al doctor sin afectar las fichas
        $doctor->delete();

        return redirect()->route('doctors.index')
                         ->with('success', 'Especialista eliminado con éxito.');
    }
}
