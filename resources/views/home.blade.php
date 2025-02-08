@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron text-center">
                <h1>Bienvenido a la Gestión de Fichas Médicas</h1>
                <p>Administra eficientemente los registros médicos de tus pacientes.</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Enlaces Rápidos
                </div>
                <div class="card-body">
                    <a href="{{ route('patients.index') }}" class="btn btn-primary btn-block">Gestionar Pacientes</a>
                    <a href="{{ route('doctors.index') }}" class="btn btn-primary btn-block">Gestionar Doctores</a>
                    <a href="{{ route('medical_records.index') }}" class="btn btn-primary btn-block">Ver Fichas Médicas</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Estado del Sistema
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Servidor:</strong> {{ php_uname('n') }}
                        </li>
                        <li class="list-group-item">
                            <strong>PHP Version:</strong> {{ phpversion() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Base de Datos:</strong> {{ env('DB_CONNECTION') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Estado:</strong> 
                            @if(DB::connection()->getPdo())
                                Conexión a base de datos exitosa
                            @else
                                Error en la conexión a la base de datos
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Historial Reciente
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($recentMedicalRecords as $record)
                            <li class="list-group-item">
                                Ficha de {{ $record->patient->name }} atendido por Dr. {{ $record->doctor->name }} el {{ $record->date->format('d/m/Y') }}
                                <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-link float-right">Ver Ficha</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
