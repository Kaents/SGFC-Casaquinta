@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Barra superior de título -->        
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Editar Información de Especialista</h1>
    </div>

    <!-- Formulario de edición del Doctor -->
    <div class="card-body-registro">
        <div class="standard-card shadow-lg rounded-lg border-0">
            <div class="card-header bg-primary text-white text-center">
                <h2>Información de Especialista</h2>
            </div>

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

            <!-- Formulario para editar el doctor -->
            <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" class="standard-card shadow-lg rounded-lg p-4 bg-white">
                @csrf
                @method('PATCH')

                <!-- Campo Nombre -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-input" value="{{ $doctor->name }}" required>
                </div>

                <!-- Campo Email -->
                <div class="form-group mb-4">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-input" value="{{ $doctor->email }}" required>
                </div>

                <!-- Campo Especialidad (Desplegable) -->
                <div class="form-group mb-4">
                    <label for="specialty" class="form-label">Especialidad <span class="text-danger">*</span></label>
                    <select name="specialty" class="form-input" required>
                        <option value="" disabled selected>Selecciona una especialidad</option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->name }}" {{ $doctor->specialty == $specialty->name ? 'selected' : '' }}>
                                {{ $specialty->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Campo Teléfono -->
                <div class="form-group mb-4">
                    <label for="phone" class="form-label">Teléfono <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-input" value="{{ $doctor->phone }}" required>
                </div>

                <!-- Botones de Acción -->
                <div class="form-actions d-flex justify-content-between">
                    <a href="{{ route('doctors.index') }}" class="btn btn-secondary rounded-pill px-4">Cancelar</a>
                    <button type="submit" class="btn btn-success rounded-pill px-4">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
