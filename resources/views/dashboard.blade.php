@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<div class="container-fluid d-flex justify-content-center">
    <!-- Título del Dashboard -->
    <div class="dashboard-header text-center mb-5">
    <h1 class="page-title">Gestión del Centro Médico</h1>
    <p class="fs-5">Administra la información de pacientes, doctores y fichas médicas.</p>
</div>

    <!-- Formulario de Fichas Médicas Recientes -->
    <div class="col-md-8">
        <div class="card shadow-lg rounded details-card improved-card mx-auto">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title">Fichas Médicas Recientes</h5>
                    
                    <p class="card-subtitle">Últimas fichas registradas en el sistema.</p>
                </div>
   
            </div>
            <div class="card-body">
                @if($recentMedicalRecords->isEmpty())
                    <p class="text-muted text-center">No hay fichas médicas recientes.</p>
                @else
                    <div class="list-group">
                        @foreach($recentMedicalRecords as $record)
                            <div class="list-group-item list-item mb-3 shadow-sm p-3 rounded">
                                <h6 class="list-item-title mb-2">
                                    {{ $record->date->format('d M Y') }} - Dr. {{ optional($record->doctor)->name ?? 'Sin Asignar' }}
                                </h6>
                                <p class="list-item-details mb-3">
                                    <strong>Especialidad:</strong> {{ optional($record->doctor)->specialty ?? 'No especificada' }}<br>
                                    <strong>Paciente:</strong> {{ optional($record->patient)->name ?? 'Sin Asignar' }}<br>
                                    <strong>Contenido:</strong> {{ Str::limit($record->content, 100) }}<br>
                                    <strong>Actividad:</strong> {{ $record->activity }}<br>
                                    <strong>Observación:</strong> {{ Str::limit($record->observation, 100) }}
                                </p>
                                <div class="list-item-actions d-flex justify-content-end">
                                <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-primary btn-sm btn-shadow">
    Ver Detalles
</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
