<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Especifica los campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'birth_date',
        'age',
        'education_level',
        'evaluation_date',
        'therapy_start_date',
        'first_progress_date',
        'professional',
        'email',
        'phone',
        'gender',
        'address',
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
