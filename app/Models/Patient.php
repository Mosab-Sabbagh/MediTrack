<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender',
        'user_id',
        'phone',
        'id_number', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_patient')
            ->withPivot('visit_date', 'notes')
            ->withTimestamps();
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'medicine_patient')
                ->withPivot('doctor_id', 'diagnosis', 'notes', 'prescribed_at')
                ->withTimestamps();
    }

// app/Models/Patient.php

public function getAgeAttribute()
{
    // التحقق من وجود تاريخ الميلاد
    if (is_null($this->date_of_birth)) {
        return '—';
    }

    // إنشاء كائن Carbon من تاريخ الميلاد
    $birthDate = \Carbon\Carbon::parse($this->date_of_birth);

    // حساب الفرق بين تاريخ الميلاد والتاريخ الحالي بالسنوات
    $age = $birthDate->diffInYears(\Carbon\Carbon::now());

    // إرجاع العمر كرقم صحيح (integer)
    return intval($age);
}
}
