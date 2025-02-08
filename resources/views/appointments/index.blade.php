@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">


<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-3xl font-bold">Lista de Citas</h1>
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">
            + Agregar Cita
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-container">
        <table class="table min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="text-left">Fecha</th>
                    <th class="text-left">Hora</th>
                    <th class="text-left">Paciente</th>
                    <th class="text-left">Doctor</th>
                    <th class="text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->doctor->name }}</td>
                        <td class="actions">
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-link">
                                Ver
                            </a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-link">
                                Editar
                            </a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
