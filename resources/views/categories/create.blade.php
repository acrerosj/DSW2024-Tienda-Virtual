@extends('layouts.app')

@section('title', 'Nueva Categoría')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush

@section('content')
<h1>Nueva Categoría</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" required>
    <label for="description">Descripción</label>
    <textarea name="description" id="description" required></textarea>
    <button type="submit">Guardar</button>
</form>
@endsection
