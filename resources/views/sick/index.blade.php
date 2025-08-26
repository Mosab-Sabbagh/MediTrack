@extends('pages.layouts.app')
@section('title', 'لوحة تحكم المريض')
@section('content')
    <h1>مرحبا  {{ Auth::user()->name }}!</h1>
    <p>هذه هي لوحة تحكم المريض الخاصة بك.</p>
@endsection