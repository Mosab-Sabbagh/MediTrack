<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicinePatient extends Model
{
        protected $table = 'medicine_patient';

    protected $fillable = [
        'patient_id',
        'medicine_id',
        'doctor_id',
        'dosage',
        'duration',
        'prescribed_date',
        'notes'
    ];
}
