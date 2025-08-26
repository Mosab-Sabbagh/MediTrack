@extends('pages.layouts.app')
@section('title', 'لوحة تحكم الطبيب')
@section('content')
    <h1>مرحبا دكتور {{ Auth::user()->name }}!</h1>
    <p>هذه هي لوحة تحكم الطبيب الخاصة بك.</p>
@endsection