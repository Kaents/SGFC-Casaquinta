@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">
           
            <h1 class="page-title">Editar Información del Paciente</h1>
        </div>

        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT')
           
            <div class="card-body-registro">
            <div class="standard-card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Información del Paciente</h2>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" name="name" class="form-input" id="name" value="{{ $patient->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-input" id="email" value="{{ $patient->email }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" name="phone" class="form-input" id="phone" value="{{ $patient->phone }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="birth_date" class="form-input" id="birth_date" value="{{ $patient->birth_date }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="education_level" class="form-label">Escolaridad</label>
                            <input type="text" name="education_level" class="form-input" id="education_level" value="{{ $patient->education_level }}">
                        </div>
                        <div class="col-md-6">
                            <label for="evaluation_date" class="form-label">Fecha de Evaluación</label>
                            <input type="date" name="evaluation_date" class="form-input" id="evaluation_date" value="{{ $patient->evaluation_date }}">
                        </div>
                        <div class="col-md-6">
                            <label for="therapy_start_date" class="form-label">Inicio de Terapia</label>
                            <input type="date" name="therapy_start_date" class="form-input" id="therapy_start_date" value="{{ $patient->therapy_start_date }}">
                        </div>
                    </div>
               <br>

            <div class="form-actions mt-4 d-flex justify-content-between">
                <a href="{{ route('patients.index') }}" class="btn btn-secondary rounded-pill px-3 py-1 btn-sm" style="min-width: 100px;">
                    <i class="fas fa-times"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success rounded-pill px-3 py-1 btn-sm" style="min-width: 100px;">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
