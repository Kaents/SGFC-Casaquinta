@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<div class="container-fluid">
    <!-- Encabezado del Formulario -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Crear Nueva Sesión</h1>
        <p class="dashboard-subtitle">Completa los campos para crear una nueva ficha médica para el paciente.</p>
    </div>

    <!-- Tarjeta que Contiene el Formulario -->
   
        
            <div class="card-body-crear-ficha">
            <h2>Formulario de Sesión</h2>
            <div class="registration-form">
            <!-- Mensajes de Error -->
            @if ($errors->any())
                <div class="alert alert-danger fade-in">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('medical_records.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <input type="hidden" name="doctor_id" value="{{ auth()->user()->id }}">

                <!-- Fecha -->
                <div class="form-group mb-4">
                    <label for="date" class="form-label">Fecha <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-input" required>
                </div>


                <!-- Contenido -->
                <div class="form-group mb-4">
                    <label for="content" class="form-label">Contenido <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-input" rows="3" required placeholder="Describe el contenido de la sesión "></textarea>
                </div>

                <!-- Actividad -->
                <div class="form-group mb-4">
                    <label for="activity" class="form-label">Actividad <span class="text-danger">*</span></label>
                    <textarea name="activity" class="form-input" rows="3" required placeholder="Describe las actividades realizadas"></textarea>
                </div>

                <!-- Observación -->
                <div class="form-group mb-4">
                    <label for="observation" class="form-label">Observación <span class="text-danger">*</span></label>
                    <textarea name="observation" class="form-input" rows="3" required placeholder="Observaciones adicionales"></textarea>
                </div>

     

                <!-- Adjuntar Archivos -->
                <div class="form-group mb-4">
                    <label for="attachments" class="form-label">Adjuntar Archivos</label>
                    <input type="file" name="attachments[]" class="form-input" multiple>
                </div>

                <!-- Botón de Guardar -->
               
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
