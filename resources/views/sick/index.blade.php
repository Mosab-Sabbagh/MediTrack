@extends('pages.layouts.app')
@section('title', 'معلومات المريض')
    
@section('content')

    <section class="py-5">
        <div class="container my-5 d-flex justify-content-center">
            <div class="card p-4 rounded-5 shadow-sm" style="max-width: 900px; background-color: #f8f9fa;">
                <div class="row align-items-center">
                    <div class="col-md-5 text-center mb-3 mb-md-0">
                        <img src="{{asset('img/doctor3.png')}}" class="img-fluid rounded-4" alt="Doctor profile picture">
                    </div>
                    <div class="col-md-7 text-end">
                        <ul class="list-unstyled fw-bold mb-0">
                            <li class="mb-2">الاسم:  {{ $patient->user->name }}</li>
                            <li class="mb-2">تاريخ الميلاد: {{ $patient->date_of_birth ?? '—' }}</li>
                            <li class="mb-2">الهوية: {{ $patient->id_number ?? '—' }}</li>
                            <li class="mb-2">الجنس: {{ $patient->gender === 'male' ? 'ذكر' : ($patient->gender === 'female' ? 'أنثى' : '—') }}</li>
                            <li class="mb-2">الهاتف: {{ $patient->phone ?? '—' }} </li>
                            <li class="mb-2">البريد الإلكتروني: {{ $patient->user->email }}</li>
                            <li class="mb-2">تاريخ الانضمام: {{ $patient->user->created_at->format('d-m-Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container py-5" dir="rtl">

        {{-- جدول الزيارات --}}
        <div class="card shadow p-4 mb-4">
            <h4 class="fw-bold mb-3">الزيارات</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>تاريخ الزيارة</th>
                        <th>الطبيب</th>
                        <th>الملاحظات/التشخيص</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patient->doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->pivot->visit_date ?? '—' }}</td>
                            <td>{{ $doctor->user->name }}</td>
                            <td>{{ $doctor->pivot->notes ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">لا توجد زيارات مسجلة</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- جدول الأدوية --}}
        <div class="card shadow p-4">
            <h4 class="fw-bold mb-3">الوصفات الطبية</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>الدواء</th>
                        <th>تاريخ الوصفة</th>
                        {{-- <th>الطبيب الواصف</th> --}}
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patient->medicines as $med)
                        @php $prescriber = $prescribers[$med->pivot->doctor_id] ?? null; @endphp
                        <tr>
                            <td>{{ $med->name }}</td>
                            <td>{{ $med->pivot->created_at ? $med->pivot->created_at->format('M d, Y h:i A') : '—' }}</td>                            {{-- <td>{{ $prescriber?->user?->name ?? ('#' . $med->pivot->doctor_id) }}</td> --}}
                            <td>{{ $med->pivot->notes ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">لا توجد وصفات مسجلة</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection