@extends('pages.layouts.app')
@section('title', 'عرض المرضى')

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="{{route('home')}}">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="{{route('doctor.index')}}"> معلومات الطبيب </a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> عرض المرضى </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title">عرض المرضى</h1>
    </div>


    <section class="container py-5">
        <div class="container my-5" dir="rtl">
            <div class="row g-3 align-items-center justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <form action="{{ route('doctor.patients') }}" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control rounded-pill pe-5"
                                placeholder="ابحث بالاسم أو الهاتف" aria-label="Search" value="{{ request('search') }}">
                            <span class="position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"
                                style="z-index: 5;">
                            </span>
                            <button type="submit" class="btn btn-primary rounded-pill me-2">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-auto text-center">
                    <a href="{{route('doctor.patients')}}"
                        class="btn btn-primary btn-lg rounded-pill px-5 d-flex align-items-center justify-content-center w-100">
                        الغاء البحث
                    </a>
                </div>

                <div class="col-sm-12 col-md-auto text-center">
                    <a href="{{route('doctor.patients.create')}}" class="btn btn-success rounded-pill">
                        <i class="fas fa-add"></i>
                        اضافة مريض جديد
                    </a>
                </div>
            </div>
        </div>

        <div class="medicine-table">
            <div class="table-responsive">

                <table class="table table-hover align-middle text-center mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>الاسم</th>
                            <th>العمر</th>
                            <th>الجنس</th>
                            <th>الهاتف</th>
                            <th class="text-center">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($patients as $patient)
                            <tr>
                                <td>{{ $patient->user->name }}</td>
                                <td>{{ $patient->age }}</td>
                                <td>{{ $patient->gender === 'male' ? 'ذكر' : ($patient->gender === 'female' ? 'أنثى' : '—') }}
                                </td>
                                <td>{{ $patient->phone ?? '—' }}</td>
                                <td class="text-center">
                                    <a href="{{route('doctor.patients.show', $patient->id)}}"
                                        class="btn btn-sm btn-outline-primary">
                                        عرض
                                    </a>

                                    <a href="{{ route('doctor.prescribe.create', $patient->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        اضافة وصفة
                                    </a>
                                    <a href="{{ route('doctor.visit.create', $patient->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        اضافة زيارة
                                    </a>

                                </td>


                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">لا توجد بيانات</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($patients->hasPages())
                <div class="card-footer">{{ $patients->links() }}</div>
            @endif
        </div>
        </div>
    </section>
@endsection