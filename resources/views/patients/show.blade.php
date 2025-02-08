@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Detalles del Paciente</h1>
        <p class="dashboard-subtitle">Visualiza la información detallada y el historial de sesiones del paciente.</p>
    </div>

    <!-- Tarjeta que Contiene la Información del Paciente -->
    <div class="standard-card mb-5">
        <div class="card-header">
            <h2 class="card-title">Información de {{ $patient->name }}</h2>
            <div class="btn-group">
                <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar toda la información de este paciente?');" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i> Eliminar Todo
                    </button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="details-row">
                <!-- Columna Izquierda: Información Personal -->
                <div class="details-item">
                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $patient->phone }}</p>
                    <p><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}</p>
                    <p><strong>Edad:</strong> 
                        {{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->age : 'N/A' }}
                    </p>
                    <p><strong>Escolaridad:</strong> {{ $patient->education_level }}</p>
                </div>
                <!-- Columna Derecha: Información de Terapia -->
                <div class="details-item">
                    <p><strong>Fecha de Evaluación:</strong> {{ \Carbon\Carbon::parse($patient->evaluation_date)->format('d/m/Y') }}</p>
                    <p><strong>Inicio de Terapia:</strong> {{ \Carbon\Carbon::parse($patient->therapy_start_date)->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjeta que Contiene el Historial de sesiones o Fichas Médicas -->
    <div class="standard-card mb-5">
        <div class="card-header">
            <h2 class="card-title">Historial de Sesiones</h2>
        </div>
        <div class="card-body">
            @if($patient->medicalRecords && $patient->medicalRecords->isNotEmpty())
            <div class="medical-records-list">
                <!-- Ordenar las sesiones del más reciente al más antiguo -->
                @foreach($patient->medicalRecords->sortByDesc('date') as $record)
                <div class="standard-card medical-record-card mb-4">
                    <div class="card-header">
                        <h3 class="record-title">Sesión del {{ \Carbon\Carbon::parse($record->date)->format('d/m/Y') }}</h3>

                        <!-- Verificar si el usuario es el creador de la ficha -->
                        @if(Auth::id() === $record->doctor_id)
                            <form action="{{ route('medical_records.destroy', $record->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta Sesion?');" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <!-- Botón ver sesión -->
                                <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>

                                <!-- Botón eliminar sesión -->
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        @else
                            <!-- Solo muestra el botón "Ver" si no es el creador -->
                            <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="details-row">
                            <!-- Información de la Consulta -->
                            <div class="details-item">
                            <p><strong>Especialista:</strong> {{ optional($record->doctor)->name ?? $record->doctor_name ?? 'Sin Asignar' }}</p>
                            <p><strong>Contenido:</strong> {{ $record->content }}</p>
                                <p><strong>Actividad:</strong> {{ $record->activity }}</p>
                                <p><strong>Observación:</strong> {{ $record->observation }}</p>
                                <p><strong>Especialización:</strong> {{ optional($record->doctor)->specialty ?? $record->doctor_specialty ?? 'N/A' }}</p>
                            </div>

                            @if($record->attachment && is_array($record->attachment))
                            <div class="details-item">
                                <p><strong>Archivos Adjuntos:</strong></p>
                                <ul>
                                    @foreach($record->attachment as $attachment)
                                    <li>
                                        <!-- Verificar si el archivo existe en storage -->
                                        @if(Storage::exists('public/' . $attachment))
                                        <a href="{{ Storage::url($attachment) }}" target="_blank" class="text-primary">
                                            <i class="fas fa-file-alt"></i> Ver Archivo
                                        </a>
                                        @else
                                        <span class="text-danger">Archivo no disponible</span>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
             <div class="col-md-6">
            <div class="col-md-6">
            @else
            <p class="text-muted">No hay registros médicos disponibles para este paciente.</p>
            @endif
        </div>
    </div>
    
    <!-- Botones de Acción Adicionales -->
    <div class="form-actions mt-4 d-flex justify-content-between">
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver a la Lista
        </a>
        <a href="{{ route('medical_records.create', ['patient_id' => $patient->id]) }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Agregar Sesión
        </a>
    </div>
</div>

@endsection
