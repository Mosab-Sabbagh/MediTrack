@extends('pages.layouts.app')
@section('title', 'عرض الأدوية')

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="{{route('home')}}">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="{{route('medicines.index')}}"> معلومات الصيدلي </a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="{{route('medications')}}"> عرض الادوية </a>
        </div>
    </div>

    <div class="text-center mt-5">
        <h1 class="title">عرض الادوية</h1>
    </div>


    <section class="container py-5">

        <div class="container my-5" dir="rtl">
            <div class="row g-3 align-items-center justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <form action="{{ route('medications') }}" method="GET">
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
                    <a href="{{route('medications')}}"
                        class="btn btn-primary btn-lg rounded-pill px-5 d-flex align-items-center justify-content-center w-100">
                        الغاء البحث
                    </a>
                </div>

                <div class="col-sm-12 col-md-auto text-center">
                    <a href="{{route('medicines.create')}}"
                        class="btn btn-success rounded-pill">
                        <i class="fas fa-add"></i>
                        اضافة دواء جديد
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
                            <th>الإجراءات</th>
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
                                <td>
                                    <a href="{{route('medicines.edit', $medicine->id)}}"
                                        class="action-btn rounded-4 text-decoration-none"
                                        style="background-color: #1364FF; color: white;">
                                        <i class="bi bi-pencil-square me-1"></i>تعديل
                                    </a>
                                    <button type="button" class="action-btn rounded-4 text-decoration-none"
                                        style="background-color: #DEE9FF; color: black; border: none;" data-bs-toggle="modal"
                                        data-bs-target="#deleteConfirmationModal" data-medicine-id="{{ $medicine->id }}">
                                        <i class="bi bi-trash me-1"></i>حذف
                                    </button>

                                    <form id="deleteForm-{{ $medicine->id }}"
                                        action="{{ route('medicines.destroy', $medicine->id) }}" method="post"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                @include('pages.layouts.delete')


                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">لا يتوفر في المخزون أدوية</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection