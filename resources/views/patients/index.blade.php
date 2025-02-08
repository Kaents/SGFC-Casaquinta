@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Lista de Pacientes</h1>
        <p class="fs-5">Visualiza y gestiona la información de tus pacientes de manera eficiente.</p>
    </div>

    <!-- Campo de Búsqueda -->
    <div class="mb-4">
        <form action="{{ route('patients.index') }}" method="GET" class="d-flex justify-content-between align-items-center">
            <input type="text" name="search" class="form-control me-2" placeholder="Buscar por nombre..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
        </form>
    </div>

    <!-- Tarjeta que Contiene la Tabla de Pacientes -->
    <div class="standard-card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">Pacientes Registrados</h2>
            <a href="{{ route('patients.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Agregar Paciente
            </a>
        </div>
        <div class="card-body">
            <!-- Mensaje de Éxito si está presente -->
            @if ($message = Session::get('success'))
                <div class="alert alert-success fade-in">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <!-- Tabla de Pacientes -->
            <div class="table-responsive table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="table-header">Nombre</th>
                            <th class="table-header">Fecha de Nacimiento</th>
                            <th class="table-header">Edad</th>
                            <th class="table-header">Fecha de Evaluación</th>
                            <th class="table-header">Inicio de Terapia</th>
                            <th class="table-header">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($patient->birth_date)->format('d/m/Y') }}</td>
                                <td>
                                    {{ $patient->birth_date ? \Carbon\Carbon::parse($patient->birth_date)->age : 'N/A' }}
                                </td>
                                <td>{{ $patient->evaluation_date ? \Carbon\Carbon::parse($patient->evaluation_date)->format('d/m/Y') : 'N/A' }}</td>
                                <td>{{ $patient->therapy_start_date ? \Carbon\Carbon::parse($patient->therapy_start_date)->format('d/m/Y') : 'N/A' }}</td>
                                
                                <td class="text-center">
                                    <!-- Grupo de botones de acciones -->
                                    <div class="btn-group">
                                        @include('components.view-button', ['url' => route('patients.show', $patient->id)])
                                        @include('components.edit-button', ['url' => route('patients.edit', $patient->id)])

                                        @if (Auth::check() && Auth::user()->role === 'admin')
                                            @include('components.delete-button', ['url' => route('patients.destroy', $patient->id)])
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay pacientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
