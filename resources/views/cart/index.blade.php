<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Carrito') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  @php
                      $total = 0;
                  @endphp
                  <table class="table">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>precio</th>
                        <th>cantidad</th>
                        <th>subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item )
                        @php
                          $subtotal = $item['amount'] * $item['price'];
                          $total += $subtotal;
                        @endphp
                        <tr>
                          <td>{{ $item['id'] }}</td>
                          <td>{{ $item['name'] }}</td>
                          <td class="text-right">{{ number_format($item['price'],2, ",", ".") }}€</td>
                          <td class="text-right">{{ $item['amount'] }}</td>
                          <td class="text-right">{{ number_format($subtotal,2, ",", ".") }}€</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4" class="text-right">TOTAL</td>
                        <td class="text-right">{{ number_format($total, 2, ",", ".") }}€</td>
                      </tr>
                    </tfoot>
                  </table>
                  <form action="{{ route('removeCart') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn danger">Vaciar Carrito</button>
                  </form>
                  @auth
                      <p>
                        <form action="{{ route('orders.store') }}" method="post" class="inline-block">
                          @csrf
                          <button type="submit" class="btn">Realizar Pedido</button>
                        </form>
                      </p>
                  @else
                      <p>Debes registrarte para hacer el pedido: 
                        <a href="{{ route('login') }}" class="btn">Login</a>
                      </p>
                  @endauth
              </div>
          </div>
      </div>
  </div>
</x-app-layout>