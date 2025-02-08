<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class CustomUser extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $table = 'custom_users'; // Especifica la tabla correcta

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'specialty',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class, 'doctor_id');
    }
    



}
