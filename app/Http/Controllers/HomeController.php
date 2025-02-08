<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;

class HomeController extends Controller
{
    public function index()
    {
        $recentMedicalRecords = MedicalRecord::with('patient', 'doctor')->latest()->take(5)->get();

        return view('home', compact('recentMedicalRecords'));
    }
}
