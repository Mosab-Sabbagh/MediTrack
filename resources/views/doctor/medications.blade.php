@extends('pages.layouts.app')
@section('title', 'عرض الأدوية')

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
            <a href=""> عرض الادوية </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title">عرض الادوية</h1>
    </div>


    <section class="container py-5">

        <div class="container my-5" dir="rtl">
            <div class="row g-3 align-items-center justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <form action="{{ route('doctor.medications') }}" method="GET">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control rounded-pill pe-5" placeholder="بحث"
                                aria-label="Search" value="{{ request('search') }}">
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
                    <a href="{{route('doctor.medications')}}"
                        class="btn btn-primary btn-lg rounded-pill px-5 d-flex align-items-center justify-content-center w-100">
                        الغاء البحث
                    </a>
                </div>
            </div>
        </div>

        <div class="medicine-table">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0">
                    <thead>
                        <tr>
                            <th>اسم الدواء</th>
                            <th>الكمية</th>
                            <th>تاريخ الانتهاء</th>
                            <th>السعر</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($medicines as $medicine)
                            <tr>
                                <td>{{$medicine->name}}</td>
                                <td>{{$medicine->quantity}}</td>
                                <td>{{$medicine->expiry_date}}</td>
                                <td>{{$medicine->price}} شيكل</td>
                                <td>
                                    @if($medicine->status == 'available')
                                        <span class="status-available">متوفر</span>
                                    @elseif($medicine->status == 'low')
                                        <span class="status-low">قليل</span>
                                    @else
                                        <span class="status-unavailable">غير متوفر</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا يتوفر في المخزون أدوية</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($medicines->hasPages())
                <div class="card-footer">{{ $medicines->links() }}</div>
            @endif
        </div>
    </section>
@endsection