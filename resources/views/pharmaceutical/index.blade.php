@extends('pages.layouts.app')
@section('title', 'لوحة تحكم الصيدلي')
@section('content')
    <h1>مرحبا  {{ Auth::user()->name }}!</h1>
    <p>هذه هي لوحة تحكم الصيدلي الخاصة بك.</p>
@endsection