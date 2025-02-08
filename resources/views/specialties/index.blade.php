@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Gestión de Especialidades</h1>
        <p class="fs-5">Administra las especialidades disponibles en el sistema.</p>
    </div>

    <!-- Tarjeta que Contiene la Tabla de Especialidades -->
    <div class="standard-card shadow-lg rounded-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="card-title">Especialidades Registradas</h2>
        </div>
        <div class="card-body">
            <!-- Mensaje de éxito si está presente -->
            @if(session('success'))
                <div class="alert alert-success fade-in mb-4">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Botón para agregar una nueva especialidad (solo visible para administradores) -->
            <div class="d-flex justify-content-end mb-4">
                <a href="{{ route('specialties.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Agregar Especialidad
                </a>
            </div>

            <!-- Tabla de Especialidades -->
            <div class="table-responsive table-container">
                <table class="table table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($specialties as $specialty)
                        <tr>
                            <td>{{ $specialty->id }}</td>
                            <td>{{ $specialty->name }}</td>
                            <td class="text-center">
                                <!-- Botones de acción -->
                                <div class="btn-group">
                                    <a href="{{ route('specialties.edit', $specialty->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('specialties.destroy', $specialty->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta especialidad?')">
                                            <i class="fas fa-trash-alt"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No hay especialidades registradas.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
