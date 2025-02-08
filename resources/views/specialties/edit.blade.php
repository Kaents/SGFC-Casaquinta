@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <!-- Encabezado de la Página -->
    
    <div class="card-body-editar-ficha">
        <h1 class="page-title">Editar Especialidad</h1>
        <div class="dashboard-header text-center mb-5">
        <p class="fs-5">Modifica la información de la especialidad seleccionada.</p>
    </div>

    <!-- Tarjeta de Formulario -->
    <div class="form-wrapper">
        <!-- Mensaje de errores si existen -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('specialties.update', $specialty->id) }}">
            @csrf
            @method('PUT')

            <!-- Campo de Nombre -->
            <div class="form-group mb-4">
                <label for="name" class="form-label">Nombre de la Especialidad</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="Ingresa el nombre de la especialidad" value="{{ old('name', $specialty->name) }}" required>
            </div>

            <!-- Botones -->
            <div class="form-actions d-flex justify-content-between">
                <a href="{{ route('specialties.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
