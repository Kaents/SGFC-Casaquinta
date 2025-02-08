@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid d-flex justify-content-center">
    <!-- Título del Dashboard -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Registro de Paciente</h1>
        <p class="dashboard-subtitle">Completa la información para agregar un nuevo paciente al sistema.</p>
    </div>

    <!-- Tarjeta que Contiene el Formulario de Registro -->
    <div class="card-body-registro">
        <h2>Formulario de Registro</h2>

        <!-- Mensajes de Error -->
        @if ($errors->any())
            <div class="alert alert-danger fade-in">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('patients.store') }}" class="registration-form">
            @csrf

            <!-- Agrupar los campos en filas -->
            <div class="row">
                <!-- Primera columna -->
                <div class="col-md-6">
                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="name">Nombre <span class="text-danger">*</span></label>
                        <input id="name" type="text" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Ingresa el nombre completo">
                        @error('name')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input id="email" type="email" name="email" class="form-input @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Ejemplo: nombre@dominio.com">
                        @error('email')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group">
                        <label for="phone">Teléfono <span class="text-danger">*</span></label>
                        <input id="phone" type="text" name="phone" class="form-input @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required placeholder="Ingresa el número de teléfono">
                        @error('phone')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Segunda columna -->
                <div class="col-md-6">
                    <!-- Fecha de Nacimiento -->
                    <div class="form-group">
                        <label for="birth_date">Fecha de Nacimiento <span class="text-danger">*</span></label>
                        <input id="birth_date" type="date" name="birth_date" class="form-input @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required>
                        @error('birth_date')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Edad (Mostrada como Texto) -->
                    <div class="form-group">
                        <label for="calculated_age">Edad</label>
                        <p id="calculated_age" class="form-text text-muted">Seleccione una fecha de nacimiento para calcular la edad.</p>
                    </div>

                    
                        <!-- Escolaridad -->
                        <div class="form-group">
                            <label for="education_level">Escolaridad <span class="text-danger">*</span></label>
                            <input id="education_level" type="text" name="education_level" class="form-input @error('education') is-invalid @enderror" value="{{ old('education_level') }}" required">
                            @error('education')
                                <div class="form-error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            <!-- Más filas de campos -->
            <div class="row mt-3">
                <div class="col-md-6">
                    <!-- Fecha de Evaluación -->
                    <div class="form-group">
                        <label for="evaluation_date">Fecha de Evaluación <span class="text-danger">*</span></label>
                        <input id="evaluation_date" type="date" name="evaluation_date" class="form-input @error('evaluation_date') is-invalid @enderror" value="{{ old('evaluation_date') }}" required>
                        @error('evaluation_date')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Inicio de Terapia -->
                    <div class="form-group">
                        <label for="therapy_start_date">Inicio de Terapia <span class="text-danger">*</span></label>
                        <input id="therapy_start_date" type="date" name="therapy_start_date" class="form-input @error('therapy_start_date') is-invalid @enderror" value="{{ old('therapy_start_date') }}" required>
                        @error('therapy_start_date')
                            <div class="form-error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="form-actions d-flex justify-content-end mt-4">
                <a href="{{ route('patients.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script para calcular la edad -->
<script>
    document.getElementById('birth_date').addEventListener('change', function() {
        const birthDate = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        const ageDisplay = document.getElementById('calculated_age');
        ageDisplay.textContent = age >= 0 ? `${age} años` : 'Edad no válida';
    });
</script>

@endsection
