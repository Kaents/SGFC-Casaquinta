@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
  
<!-- Encabezado de la Página -->
    
    <div class="card-body-editar-ficha">
    <!-- Tarjeta de Formulario -->
    <h2 class="page-title">Editar Contraseña</h2>
    <div class="dashboard-header text-center mb-5">
        <p class="fs-5">Actualiza la contraseña del usuario seleccionado.</p>
</div>
    <div class="form-wrapper">
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

        <!-- Formulario -->
        <form method="POST" action="{{ route('admin_passwords.update', $user->id) }}">
            @csrf
            @method('PUT')

            <!-- Campo de Nombre (solo lectura) -->
            <div class="form-group mb-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" class="form-input" value="{{ $user->name }}" readonly>
            </div>

            <!-- Campo de Email (solo lectura) -->
            <div class="form-group mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-input" value="{{ $user->email }}" readonly>
            </div>

            <!-- Campo de Nueva Contraseña -->
            <div class="form-group mb-4">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Ingresa la nueva contraseña" required>
            </div>

            <!-- Campo de Confirmación de Contraseña -->
            <div class="form-group mb-4">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirma la nueva contraseña" required>
            </div>

            <!-- Botones -->
            <div class="form-actions d-flex justify-content-between">
                <a href="{{ route('admin_passwords.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
