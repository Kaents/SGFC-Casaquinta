@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Detalles de Especialista</h1>
        <a href="{{ route('doctors.index') }}" class="btn btn-secondary btn-lg">
            <i class="fas fa-arrow-left"></i> Volver a la Lista
        </a>
    </div>

    <!-- Tarjeta de Información del Doctor -->
    <div class="standard-card">
        <div class="card-header bg-primary text-white">
            <h2>Información de {{ $doctor->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $doctor->email }}</p>
                    <p><strong>Teléfono:</strong> {{ $doctor->phone }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Especialidad:</strong> {{ $doctor->specialty }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
