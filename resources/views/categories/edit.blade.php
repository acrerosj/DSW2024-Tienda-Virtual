@extends('layouts.app')

@section('title', 'Editar Categoría: ' . $category->name)

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush

@section('content')
<h1>Editar Categoría</h1>
<form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" required>
    <label for="description">Descripción</label>
    <textarea name="description" id="description" required>{{ $category->description }}</textarea>
    <button type="submit">Guardar</button>
</form>
@endsection
