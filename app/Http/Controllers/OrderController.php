<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        echo "order index";
    }

    public function show(Order $order) {
        echo "order show";
    }

    public function store() {
        echo "order store";
        echo "<br>";
        $user = Auth()->user();
        echo $user;
        echo "<br>";
        $cart = session()->get('cart', []);
        var_dump($cart);

        DB::beginTransaction();
        try {
            // Crear el pedido:
            $order = new Order();
            $order->user_id = $user->id;
            $order->save();
            
            // Crear una línea de pedido por cada línea del carrito
            foreach($cart as $product_id => $amount) {
                $product = Product::find($product_id);
                $detail = new OrderDetail();
                $detail->order_id = $order->id;
                $detail->product_id = $product_id;
                $detail->amount = $amount;
                $detail->price = $product->price;
                $detail->save();
            }
            DB::commit();
            session()->put('cart', []); 
        } catch(Exception $e) {
            DB::rollBack();
            die('Error en la transacción: ' . $e);
        }
    }
}
