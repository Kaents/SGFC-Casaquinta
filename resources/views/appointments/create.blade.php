@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container-fluid">
    <div class="form-container">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Crear Nueva Cita</h2>

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="patient_id" class="form-label">Paciente</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    <option value="" disabled selected>Seleccione un paciente</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select name="doctor_id" id="doctor_id" class="form-control">
                    <option value="" disabled selected>Seleccione un doctor</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>

            <div class="mb-3">
                <label for="time" class="form-label">Hora</label>
                <input type="time" name="time" id="time" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Crear Cita</button>
        </form>
    </div>
</div>

@endsection
