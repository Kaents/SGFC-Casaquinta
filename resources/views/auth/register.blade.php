@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">



<div class="container-fluid">
    <div class="form-container shadow-lg p-4 rounded bg-white">

        <!-- Barra verde superior -->
        <div class="card-header bg-success text-white mb-4">
            <h2 class="text-center mb-0">Sección de Registros</h2>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Información Personal -->
            <div class="mb-3">
                <div class="card-header bg-info text-white">
                    <strong>Información Personal</strong>
                </div>
                <div class="p-3">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" type="text" name="name" class="form-input" value="{{ old('name') }}" required autofocus autocomplete="name">
                        @if($errors->has('name'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required autocomplete="username">
                        @if($errors->has('email'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input id="phone" type="text" name="phone" class="form-input" value="{{ old('phone') }}" required autocomplete="tel">
                        @if($errors->has('phone'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <div class="card-header bg-info text-white">
                    <strong>Seguridad</strong>
                </div>
                <div class="p-3">
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password" name="password" class="form-input" required autocomplete="new-password">
                        @if($errors->has('password'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Cssssontraseña</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" required autocomplete="new-password">
                        @if($errors->has('password_confirmation'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Rol y Especialidad -->
            <div class="mb-3">
                <div class="card-header bg-info text-white">
                    <strong>Rol y Especialidad</strong>
                </div>
                <div class="p-3">
                    <div class="mb-3">
                        <label for="role" class="form-label">Rol</label>
                        <select id="role" name="role" class="form-input" required>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                            <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                        </select>
                        @if($errors->has('role'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('role') }}</div>
                        @endif
                    </div>

                    <div class="mb-3 hidden" id="specialty-group">
                        <label for="specialty" class="form-label">Especialidad</label>
                        <input id="specialty" type="text" name="specialty" class="form-input" value="{{ old('specialty') }}" autocomplete="specialty">
                        @if($errors->has('specialty'))
                            <div class="alert alert-danger mt-2">{{ $errors->first('specialty') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleSpecialtyField() {
            const specialtyGroup = document.getElementById('specialty-group');
            const specialtyInput = document.getElementById('specialty');
            if (document.getElementById('role').value === 'doctor') {
                specialtyGroup.style.display = 'block';
                specialtyInput.required = true;
            } else {
                specialtyGroup.style.display = 'none';
                specialtyInput.required = false;
            }
        }

        // Inicializar el campo al cargar la página
        toggleSpecialtyField();

        // Escuchar cambios en el campo de rol
        document.getElementById('role').addEventListener('change', toggleSpecialtyField);
    });
</script>

@endsection
