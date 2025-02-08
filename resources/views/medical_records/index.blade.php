@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    


<div class="container-fluid">


    <h1>Lista de Fichas Médicas</h1>
    

   <!-- Botón para agregar una nueva ficha (si es necesario) -->
     <!-- <a href="{{ route('medical_records.create') }}" class="btn btn-primary mb-3">Nueva Ficha Médica
        </a> -->



    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="standard-card">
        <div class="card-header">
            <h2 class="card-title">Fichas Registradas</h2>
        </div>


        

    <div class="card-body">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                   
                            <th class="table-header">Paciente</th>
                            <th class="table-header">Especialista</th>
                            <th class="table-header">Fecha</th>
                            <th class="text-center" >Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicalRecords as $record)
                    <tr>
                        <td>{{ $record->patient->name }}</td>
                        <td>{{ $record->doctor->name }}</td>
                        <td>{{ $record->date->format('d/m/Y')}}</td>
                        <td class="actions">
                          
                                <!-- Grupo de botones de acciones -->
                                <div class="btn-group">
                                        @include('components.view-button', ['url' => route('medical_records.show', $record->id)])
                                        @include('components.edit-button', ['url' => route('medical_records.edit', $record->id)])
                                        @include('components.delete-button', ['url' => route('medical_records.destroy', $record->id)])
                                    </div>
                            
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
