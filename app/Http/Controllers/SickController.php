<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SickController extends Controller
{
    public function index() {
         // جيب المريض الحالي من المستخدم المسجّل
        $patient = Auth::user()->patient;

        if (!$patient) {
            abort(404, 'لا يوجد ملف لهذا المستخدم كمريض');
        }

        // حمّل العلاقات المطلوبة
        $patient->load([
            'user',
            'doctors.user', // لعرض اسم الطبيب في الزيارات
            'medicines'     // سنجلب أسم الطبيب الواصف أدناه
        ]);

        // جهّز فهرس للأطباء الذين كتبوا وصفات للمريض
        $doctorIds = $patient->medicines->pluck('pivot.doctor_id')->unique()->filter();
        $prescribers = Doctor::with('user')
            ->whereIn('id', $doctorIds)
            ->get()
            ->keyBy('id');

        // معرّف الطبيب الحالي (لو المستخدم طبيب)
        $myDoctorId = Auth::user()->doctor->id ?? null;

        return view('sick.index', compact('patient', 'prescribers', 'myDoctorId'));
    }


    public function myProfile()
    {
        // جيب المريض الحالي من المستخدم المسجّل
        $patient = Auth::user()->patient;

        if (!$patient) {
            abort(404, 'لا يوجد ملف لهذا المستخدم كمريض');
        }

        // حمّل العلاقات المطلوبة
        $patient->load([
            'user',
            'doctors.user', // لعرض اسم الطبيب في الزيارات
            'medicines'     // سنجلب أسم الطبيب الواصف أدناه
        ]);

        // جهّز فهرس للأطباء الذين كتبوا وصفات للمريض
        $doctorIds = $patient->medicines->pluck('pivot.doctor_id')->unique()->filter();
        $prescribers = Doctor::with('user')
            ->whereIn('id', $doctorIds)
            ->get()
            ->keyBy('id');

        // معرّف الطبيب الحالي (لو المستخدم طبيب)
        $myDoctorId = Auth::user()->doctor->id ?? null;

        return view('patient.my_profile', compact('patient', 'prescribers', 'myDoctorId'));
    }
}
