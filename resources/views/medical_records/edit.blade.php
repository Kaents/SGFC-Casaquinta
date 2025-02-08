@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <!-- Encabezado de la Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    </div>

    <!-- Tarjeta de Registro de Usuario -->
    <div class="card-body-editar-ficha">
        <!-- Título Principal -->
        <h2 class="page-title">Editar Ficha Médica</h2>

        <!-- Mostrar errores si existen -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para editar la ficha médica -->
        <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST" class="standard-card shadow-lg rounded-lg p-4 bg-white" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Selección de Paciente -->
            <div class="form-group mb-4">
                <label for="patient_id" class="form-label">Paciente</label>
                <select name="patient_id" class="form-input">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $medicalRecord->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Especialista -->
            <div class="form-group mb-4">
                <label for="doctor_id" class="form-label">Especialista</label>
                <select name="doctor_id" class="form-input">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $medicalRecord->doctor_id == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }} - {{ $doctor->specialty }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha -->
            <div class="form-group mb-4">
                <label for="date" class="form-label">Fecha <span class="text-danger">*</span></label>
                <input type="date" name="date" class="form-input" value="{{ $medicalRecord->date->format('Y-m-d') }}" required>
            </div>

            <!-- Contenido -->
            <div class="form-group mb-4">
                <label for="content" class="form-label">Contenido <span class="text-danger">*</span></label>
                <input type="text" name="content" class="form-input" value="{{ $medicalRecord->content }}" required>
            </div>

            <!-- Actividad -->
            <div class="form-group mb-4">
                <label for="activity" class="form-label">Actividad <span class="text-danger">*</span></label>
                <input type="text" name="activity" class="form-input" value="{{ $medicalRecord->activity }}" required>
            </div>

            <!-- Observación -->
            <div class="form-group mb-4">
                <label for="observation" class="form-label">Observación <span class="text-danger">*</span></label>
                <input type="text" name="observation" class="form-input" value="{{ $medicalRecord->observation }}" required>
            </div>

            <!-- Adjuntar Archivos -->
            <div class="form-group mb-4">
                <label for="attachments" class="form-label">Adjuntar Archivos</label>
                <input type="file" name="attachments[]" class="form-input" multiple>
            </div>
            <!-- Botones de Acción -->
            <div class="form-actions d-flex justify-content-between">
                <a href="{{ route('medical_records.show', $medicalRecord->id) }}" class="btn btn-secondary rounded-pill px-4">Cancelar</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Actualizar</button>
            </div>
        </form>
    </div>
</div>

@endsection
