<!-- resources/views/components/delete-button.blade.php -->
<form action="{{ $url }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este elemento?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 py-2" style="font-size: 14px; display: inline-flex; align-items: center;">
        <i class="fas fa-trash-alt mr-2"></i> Eliminar
    </button>
</form>
