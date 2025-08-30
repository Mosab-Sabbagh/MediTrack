<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'expiry_date',
        'status',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'medicine_patient')
                    ->withPivot('doctor_id', 'diagnosis', 'notes', 'prescribed_at')
                    ->withTimestamps();
    }



}
