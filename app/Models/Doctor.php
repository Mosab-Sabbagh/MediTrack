<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'specialization',
        'phone',
        'license_number',
        'working_hours',
        'section',
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'doctor_patient')
            ->withPivot('visit_date', 'notes')
            ->withTimestamps();
    }

    public function medicines()
    {
        return $this->hasManyThrough(Medicine::class, MedicinePatient::class, 'doctor_id', 'id', 'id', 'medicine_id');
    }
}
