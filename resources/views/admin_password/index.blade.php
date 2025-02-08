@extends('layouts.app')

@section('content')

<!-- Incluir el archivo CSS externo -->
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<!-- Incluir Font Awesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container-fluid">
    <!-- Encabezado de la Página -->
    <div class="dashboard-header text-center mb-5">
        <h1 class="page-title">Gestionar Contraseñas</h1>
        <p class="fs-5">Administra las contraseñas de los usuarios del sistema.</p>
    </div>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success fade-in mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de gestión de contraseñas -->
    <div class="table-responsive table-container">
    <table class="table table-hover">
                    <thead class="bg-primary text-white">
            
                <tr>
                    <th class="table-header">Nombre</th>
                    <th class="table-header">Email</th>
                    <th class="table-header">Rol</th>
                    <th class="table-header text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('admin_passwords.edit', $user->id) }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-key"></i> Cambiar Contraseña
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
