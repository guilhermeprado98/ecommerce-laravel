<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->email = $request->input('email');
        $total = 0;
        $caritems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($caritems_total as $prod) {
            $total += $prod->products->original_price;
        }
        $order->total_price = $total;
        $comissao_afiliado = $total * 0.25;
        $comissao_produtor = $total * 0.75;
        $order->comissao_afiliado = $comissao_afiliado;
        $order->comissao_produtor = $comissao_produtor;
        $order->save();

        $order->id;

        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->original_price,
            ]);

        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('/')->with('status', "Pedido realizado com sucesso!");
    }
}
