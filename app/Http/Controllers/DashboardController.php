<?php
namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener las fichas médicas más recientes, por ejemplo, las últimas 10
        $recentMedicalRecords = MedicalRecord::with(['patient', 'doctor'])
            ->orderBy('date', 'desc')
            ->take(10)
            ->get();

        // Obtener la lista de pacientes
        $patients = Patient::all();  // Asegúrate de que esta línea esté presente para definir la variable $patients

        // Pasar tanto las fichas médicas recientes como la lista de pacientes a la vista del dashboard
        return view('dashboard', compact('recentMedicalRecords', 'patients'));
    }
}
