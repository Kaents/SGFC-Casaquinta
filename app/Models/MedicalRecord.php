<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime',
        'attachment' => 'array', // Laravel maneja el JSON y lo convierte en un array automáticamente
    ];

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'content',
        'activity',
        'observation',
        'comments',
        'date',
        'attachment', // Campo para almacenar los archivos adjuntos
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(CustomUser::class, 'doctor_id');
    }

    
}
