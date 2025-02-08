@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <!-- Tarjeta que Contiene los Detalles de la Ficha Médica -->
    <div class="standard-card shadow-lg p-4 rounded bg-white w-75">
        <!-- Título Principal -->
        <h3 class="text-center mb-4 text-primary">Detalles de la Ficha Médica</h3>

        <!-- Información General -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <strong>Información General</strong>
            </div>
            <div class="card-body">
                <p><strong>Fecha:</strong> {{ $medicalRecord->date->format('d/m/Y') }}</p>
                <p><strong>Contenido:</strong> {{ $medicalRecord->content }}</p>
                <p><strong>Actividad:</strong> {{ $medicalRecord->activity }}</p>
            </div>
        </div>

        <!-- Observaciones y Comentarios -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <strong>Observaciones</strong>
            </div>
            <div class="card-body">
                <p><strong>Observación:</strong> {{ $medicalRecord->observation }}</p>
            </div>
        </div>

        <!-- Mostrar archivos adjuntos -->
        @if(!empty($medicalRecord->attachment))
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <strong>Archivos Adjuntos</strong>
            </div>
            <div class="card-body">
                <div class="p-3">
                    @if(is_array($medicalRecord->attachment))
                    <ul class="list-group">
                        @foreach($medicalRecord->attachment as $file)
                        
                            <div class="btn-group">
                                <!-- Botón para ver adjunto -->
                                <button onclick="window.location.href='{{ asset('storage/' . $file) }}'" download class="text-primary">
                               <i class="fas fa-file-alt"></i> Ver Archivo

                                </button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                   
                        <div class="btn-group">
                            <!-- Botón para ver adjunto -->
                            <button onclick="window.location.href='{{ asset('storage/' . $medicalRecord->attachment) }}'" download class="text-primary">
                            <i class="fas fa-file-alt"></i> Ver Archivo
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> No hay archivos adjuntos disponibles.
        </div>
        @endif

        <!-- Botones de Acción -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('patients.show', $medicalRecord->patient_id) }}" class="btn btn-secondary d-flex align-items-center gap-2">
                <i class="fas fa-arrow-left"></i> Volver al Paciente
            </a>
            <a href="{{ route('medical_records.edit', $medicalRecord->id) }}" class="btn btn-warning d-flex align-items-center gap-2">
                <i class="fas fa-edit"></i> Editar Ficha Médica
            </a>
        </div>
    </div>
</div>

@endsection
