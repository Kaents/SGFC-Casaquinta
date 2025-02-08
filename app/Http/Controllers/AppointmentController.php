<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['patient', 'doctor'])->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        // Obtén los pacientes y doctores para mostrarlos en el formulario de creación
        $patients = Patient::all();
        $doctors = Doctor::all();

        return view('appointments.create', compact('patients', 'doctors'));
    }

    public function store(Request $request)
    {
        // Validar y crear la nueva cita
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        Appointment::create($validated);

        return redirect()->route('appointments.index')->with('success', 'Cita creada con éxito.');
    }
}
