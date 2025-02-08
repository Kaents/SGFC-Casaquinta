@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<div class="container-fluid">


    <!-- Encabezado de la Página -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">Lista de Especialistas</h1>



        <!-- Tarjeta que Contiene la Tabla de Especialistas -->
        <div class="standard-card">
            <div class="card-header">
                <h2 class="card-title">Especialistas Registrados</h2>
            </div>


            <!-- Botón para agregar un nuevo doctor (si es necesario) -->
            <!-- <a href="{{ route('doctors.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i>Agregar Doctor
        </a> -->


            <div class="card-body">
                <!-- Mensaje de éxito si está presente -->
                @if ($message = Session::get('success'))
                <div class="alert alert-success fade-in mb-4">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <!-- Tabla de Doctores -->

                <div class="table-responsive table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="table-header">Nombre</th>
                                <th class="table-header">Email</th>
                                <th class="table-header">Especialidad</th>
                                <th class="table-header">Teléfono</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->specialty }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td class="text-center">

                                    <!-- Grupo de botones de acciones -->
                                    <div class="btn-group">
                                        @include('components.view-button', ['url' => route('doctors.show', $doctor->id)])
                                        

                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                        @include('components.edit-button', ['url' => route('doctors.edit', $doctor->id)])
                                        @include('components.delete-button', ['url' => route('doctors.destroy', $doctor->id)])
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </form>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection