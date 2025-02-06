<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Producto') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h1>{{ $product->name }}</h1>
          <p>{{ $product->description }}</p>
          <p>Precio: {{ number_format($product->price, 2) }}€</p>
          <p>Stock: {{ $product->stock }}</p>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>