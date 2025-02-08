@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Registro de Usuario</h1>
    </div>

    <!-- Tarjeta de Registro de Usuario -->
    <div class="card-body-registro">
        <h2>Formulario de Registro</h2>

        <!-- Mostrar mensaje de éxito si existe -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

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

        <form method="POST" action="{{ route('custom_register_form') }}" class="registration-form">
            @csrf

            <!-- Nombre -->
            <div class="form-group mb-3">
                <i class="fa-solid fa-circle-user fa-lg"></i> Nombre
                <input id="name" type="text" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus autocomplete="name">
                @error('name')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="form-group mb-3">
                <i class="fa-solid fa-envelope fa-lg"></i> Correo Electrónico
                <input id="email" type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="username">
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="form-group mb-3">
                <i class="fa-solid fa-lock fa-lg"></i> Contraseña
                <input id="password" type="password" name="password" class="form-input @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div class="form-group mb-3">
                <i class="fa-solid fa-lock fa-lg"></i> Confirmar Contraseña
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" required autocomplete="new-password">
            </div>

            <!-- Teléfono -->
            <div class="form-group mb-3">
                <i class="fa-solid fa-square-phone fa-lg"></i> Teléfono
                <input id="phone" type="text" name="phone" class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="tel">
                @error('phone')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Rol -->
            <div class="form-group mb-3">
                <label for="role" class="form-label">Rol</label>
                <select id="role" name="role" class="form-input @error('role') is-invalid @enderror" required>
                    <option value="" disabled selected>Selecciona un rol</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                    <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Especialista</option>
                </select>
                @error('role')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

    <!-- Especialidad -->
<div class="form-group mb-3" id="specialty-section" style="display: none;">
    <label for="specialty" class="form-label">Especialidad</label>
    <select id="specialty" name="specialty" class="form-input @error('specialty') is-invalid @enderror">
        <option value="" disabled selected>Selecciona una especialidad</option>
        @foreach ($specialties as $specialty)
            <option value="{{ $specialty->name }}" {{ old('specialty') == $specialty->name ? 'selected' : '' }}>
                {{ $specialty->name }}
            </option>
        @endforeach
    </select>
    @error('specialty')
        <div class="form-error">{{ $message }}</div>
    @enderror
</div>

            <!-- Botones -->
            <div class="form-actions d-flex justify-content-between mt-4">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary px-4 py-2">Volver</a>
                <button type="submit" class="btn btn-primary px-4 py-2">Registrar</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Mostrar u ocultar el campo de especialidades dependiendo del rol seleccionado
    document.getElementById('role').addEventListener('change', function () {
        const specialtySection = document.getElementById('specialty-section');
        if (this.value === 'doctor') {
            specialtySection.style.display = 'block';
        } else {
            specialtySection.style.display = 'none';
        }
    });
</script>

@endsection
