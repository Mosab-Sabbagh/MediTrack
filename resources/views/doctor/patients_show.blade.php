@extends('pages.layouts.app')
@section('title', 'معلومات المريض')

@section('content')
<div class="container" style="display:grid; gap:1rem;">
    {{-- معلومات المريض --}}
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3">بيانات المريض</h5>
            <div class="row g-3">
                <div class="col-md-3"><strong>الاسم:</strong> {{ $patient->user->name }}</div>
                <div class="col-md-3"><strong>العمر:</strong> {{ $patient->age ?? '—' }}</div>
                <div class="col-md-3"><strong>الجنس:</strong> {{ $patient->gender === 'male' ? 'ذكر' : ($patient->gender === 'female' ? 'أنثى' : '—') }}</div>
                <div class="col-md-3"><strong>الهاتف:</strong> {{ $patient->phone ?? '—' }}</div>
            </div>
        </div>
    </div>

    {{-- زيارات/تشخيصات (doctor_patient) --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">الزيارات والتشخيصات</h5>
                {{-- لاحقًا زر إضافة تشخيص جديد --}}
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>الطبيب</th>
                        <th>تاريخ الزيارة</th>
                        <th>الملاحظات/التشخيص</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patient->doctors as $doc)
                        <tr>
                            <td>{{ $doc->user->name ?? '—' }}</td>
                            <td>{{ $doc->pivot->visit_date ?? '—' }}</td>
                            <td>{{ $doc->pivot->notes ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="text-center py-3">لا توجد زيارات بعد</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- الوصفات (medicine_patient) --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">الوصفات الدوائية</h5>
                {{-- لاحقًا زر "وصف دواء" --}}
            </div>
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>الدواء</th>
                        <th>تاريخ الوصفة</th>
                        <th>الطبيب الواصف</th>
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($patient->medicines as $med)
                        @php $prescriber = $prescribers[$med->pivot->doctor_id] ?? null; @endphp
                        <tr>
                            <td>{{ $med->name }}</td>
                            <td>{{ $med->pivot->created_at->format('d-m-Y') ?? '—' }}</td>
                            <td>{{ $prescriber?->user?->name ?? Auth::user()->name}}</td>

                            <td>{{ $med->pivot->notes ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-3">لا توجد وصفات بعد</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
