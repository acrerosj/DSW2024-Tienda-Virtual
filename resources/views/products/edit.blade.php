<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                        class="form">
                        @csrf
                        @method('PUT')
                        <label for="category_id">Categoría</label>
                        <select name="category_id" id="category_id" required>
                            <option value="" disabled>Selecciona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" required>{{ $product->description }}</textarea>
                        <label for="price">Precio</label>
                        <input type="number" name="price" id="price" step="0.01" value="{{ $product->price }}"
                            required>
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
                        <button type="submit" class="btn">Guardar</button>
                        <button type="reset" class="btn danger">Restablecer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
