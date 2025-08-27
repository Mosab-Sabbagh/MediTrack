@extends('pages.layouts.app')
@section('title', 'إضافة دواء جديد')

@section('content')
    <div class="container align-items-center m-auto breadcrumb-container">
        <div class="breadcrumb-item">
            <a href="#">الرئيسية</a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> معلومات الصيدلي </a>
        </div>
        <span class="breadcrumb-separator">/</span>
        <div class="breadcrumb-item">
            <a href="#"> تعديل دواء </a>
        </div>
    </div>


    <section class="container py-5">
        <div class="container my-5 " dir="rtl">
            <div class="card shadow p-4 mx-auto position-relative" style="max-width: 600px;">
                <a href="{{route('medicines.index')}}" class="btn-close position-absolute top-0 end-0 m-3"
                    aria-label="إغلاق"></a>
                <h2 class="text-center mb-4 fw-bold">تعديل دواء</h2>
                <form action="{{ route('medicines.update',$medicine->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">اسم الدواء:</label>
                        <input type="text" class="form-control input-form" id="name" name="name"
                            value="{{ old('name', $medicine->name) }}">
                        @error('name')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label fw-bold">الكمية:</label>
                        <input type="number" class="form-control input-form" id="quantity" name="quantity"
                            value="{{ old('quantity', $medicine->quantity) }}">
                        @error('quantity')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">السعر:</label>
                        <input type="text" class="form-control input-form" id="price" name="price"
                            value="{{ old('price', $medicine->price) }}">
                        @error('price')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="expiry_date" class="form-label fw-bold">تاريخ الإنتهاء:</label>
                        <input type="date" class="form-control input-form" id="expiry_date" name="expiry_date"
                            value="{{ old('expiry_date', $medicine->expiry_date) }}">
                        @error('expiry_date')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">الحالة:</label>
                        <select class="form-select input-form" id="status" name="status">
                            <option value="available" {{ old('status', $medicine->status) == 'available' ? 'selected' : '' }}>
                                متوفر</option>
                            <option value="low" {{ old('status', $medicine->status) == 'low' ? 'selected' : '' }}>قليل
                            </option>
                            <option value="unavailable" {{ old('status', $medicine->status) == 'unavailable' ? 'selected' : '' }}>غير متوفر</option>
                        </select>
                        @error('status')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">تعديل</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection