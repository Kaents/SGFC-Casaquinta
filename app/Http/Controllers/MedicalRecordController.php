<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $medicalRecords = MedicalRecord::with(['patient', 'doctor'])->get();
        return view('medical_records.index', compact('medicalRecords'));
    }

    public function create(Request $request)
    {
        if ($request->has('patient_id')) {
            $patient = Patient::findOrFail($request->patient_id);
            return view('medical_records.create', compact('patient'));
        }

        return redirect()->route('medical_records.index')
            ->with('error', 'Debe seleccionar un paciente para crear una ficha médica.');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'content' => 'required',
            'activity' => 'required',
            'observation' => 'required',
            'comments' => '',
            'attachments.*' => '',
        ]);

        // Obtener el usuario autenticado desde la tabla custom_users
        $currentUser = Auth::guard('web')->user();

        // Manejo de archivos adjuntos
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                // Guarda el archivo en storage/app/public/attachments
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
        }

        // Crear la ficha médica asociada con el paciente y el doctor
        MedicalRecord::create([
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $currentUser->id,
            'doctor_name' => $currentUser->name,
            'doctor_specialty' => $currentUser->specialty,
            'date' => $request->input('date'),
            'content' => $request->input('content'),
            'activity' => $request->input('activity'),
            'observation' => $request->input('observation'),
            'comments' => $request->input('comments'),
            'attachment' => $attachments,
        ]);
        

        return redirect()->route('patients.show', $request->input('patient_id'))
            ->with('success', 'Ficha médica creada con éxito.');
    }

    public function show(MedicalRecord $medicalRecord)
    {
        // Obtén el paciente asociado con la ficha médica
        $patient = $medicalRecord->patient;

        // Verifica si $medicalRecord->attachment es una cadena antes de decodificar
        if (is_string($medicalRecord->attachment)) {
            $medicalRecord->attachment = json_decode($medicalRecord->attachment, true);
        }

        // Pasa tanto el medicalRecord como el patient a la vista
        return view('medical_records.show', compact('medicalRecord', 'patient'));
    }

    public function edit(MedicalRecord $medicalRecord)
    {
        $patients = Patient::all();
        $doctors = CustomUser::where('role', 'doctor')->get(); // Obtener solo los usuarios con rol de doctor

        return view('medical_records.edit', compact('medicalRecord', 'patients', 'doctors'));
    }

    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        $request->validate([
            'patient_id' => '|exists:patients,id',
            'date' => '|date',
            'content' => '',
            'activity' => '',
            'observation' => '',
            'comments' => '',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx',
        ]);

        // Manejo de archivos adjuntos
        $attachments = $medicalRecord->attachment; // Cargar los adjuntos existentes
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
        }

        // Mantener el nombre y especialidad del doctor almacenados, si el doctor ya no existe
        $doctor = $medicalRecord->doctor;
        $doctorName = $doctor ? $doctor->name : $medicalRecord->doctor_name;
        $doctorSpecialty = $doctor ? $doctor->specialty : $medicalRecord->doctor_specialty;

        $medicalRecord->update([
            'patient_id' => $request->input('patient_id'),
            'doctor_id' => $doctor ? $doctor->id : $medicalRecord->doctor_id,
            'doctor_name' => $doctorName, // Asegura que el nombre almacenado se mantenga
            'doctor_specialty' => $doctorSpecialty, // Asegura que la especialidad almacenada se mantenga
            'date' => $request->input('date'),
            'content' => $request->input('content'),
            'activity' => $request->input('activity'),
            'observation' => $request->input('observation'),
            'comments' => $request->input('comments'),
            'attachment' => json_encode($attachments), // Actualizar adjuntos
        ]);

        return redirect()->route('medical_records.index')
            ->with('success', 'Ficha médica actualizada con éxito.');
    }

    public function destroy(MedicalRecord $medicalRecord)
    {
        // Obtener el usuario autenticado
        $currentUser = Auth::user();
    
        // Verificar si el usuario autenticado es el doctor que creó la ficha
        if ($currentUser->id !== $medicalRecord->doctor_id) {
            return redirect()->route('medical_records.index')
                ->with('error', 'No tienes permisos para eliminar esta ficha médica.');
        }
    
        // Eliminar la ficha médica
        $medicalRecord->delete();
    
        return redirect()->route('medical_records.index')
            ->with('success', 'Ficha médica eliminada con éxito.');
    }
    
}