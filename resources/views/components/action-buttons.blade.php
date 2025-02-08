<!-- resources/views/components/action-buttons.blade.php -->
<div class="btn-group" role="group">
    <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i> Ver
    </a>
    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> Editar
    </a>
    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fas fa-trash-alt"></i> Eliminar
        </button>
    </form>
</div>
