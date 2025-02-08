<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:specialties,name',
        ]);

        Specialty::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Especialidad agregada con éxito.');
    }

    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:specialties,name,' . $specialty->id,
        ]);

        $specialty->update(['name' => $request->name]);

        return redirect()->route('specialties.index')->with('success', 'Especialidad actualizada con éxito.');
    }

    public function destroy(Specialty $specialty)
    {
        $specialty->delete();

        return redirect()->back()->with('success', 'Especialidad eliminada con éxito.');
    }
}
