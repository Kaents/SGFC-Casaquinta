<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $patients = Patient::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();
    
        return view('patients.index', compact('patients', 'search'));
    }
    
    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'nullable|date',
            'education_level' => 'nullable|string',
            'evaluation_date' => 'nullable|date',
            'therapy_start_date' => 'nullable|date',
            'first_progress_date' => 'nullable|date',
            'professional' => 'nullable|string',
            'email' => 'required|email|unique:patients,email',
            'address' => 'nullable|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Paciente creado con éxito.');
    }

    public function show($id)
    {
        $patient = Patient::with('medicalRecords.doctor')->findOrFail($id);
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        // Calcular la edad del paciente
        $patient->age = $patient->birth_date ? Carbon::parse($patient->birth_date)->age : null;
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'birth_date' => 'nullable|date',
            'education_level' => 'nullable|string',
            'evaluation_date' => 'nullable|date',
            'therapy_start_date' => 'nullable|date',
            'first_progress_date' => 'nullable|date',
            'professional' => 'nullable|string',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'phone' => 'required',
            'address' => 'nullable|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Paciente actualizado con éxito.');
    }

    public function destroy(Patient $patient)
    {
        if (!Auth::check() || Auth::user()->role != 'admin') {
            return redirect()->route('patients.index')
                             ->with('error', 'No tienes permisos para realizar esta acción.');
        }
    
        $patient->delete();
    
        return redirect()->route('patients.index')
                         ->with('success', 'Paciente eliminado con éxito.');
    }
}
 