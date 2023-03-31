<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['products' => $data]);
    }

    function AddToBasket(Request $req)
    {
        if (Auth::check()) {
            $basket = new Basket();
//            $basket->user_id = $req->session()->get('user')['id'];
            $basket->user_id = Auth::id();
            $basket->product_id = $req->product_id;
            $basket->save();
            return redirect('/');
        }
        return redirect('/login');
    }

    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }

    function basketItem()
    {
//        $user_id = Session::get('user')['id'];
        $user_id = Auth::id();
        return Basket::where('user_id', $user_id)->count();
    }

    function basketList()
    {
//        $user_id = Session::get('user')['id'];
        $user_id = Auth::id();
        $data = DB::table('basket')
            ->join('products', 'basket.product_id', 'products.id')
            ->select('products.*', 'basket.id as basket_id')
            ->where('basket.user_id', $user_id)->get();
        return view('basketList', ['products' => $data]);
    }

    function removebasket( $bid)
    {
        Basket::destroy($bid);
        return redirect('/basketList');
    }

    function orderNow()
    {
//        $user_id = Session::get('user')['id'];
        $user_id = Auth::id();
        $total = DB::table('basket')
            ->join('products', 'basket.product_id', 'products.id')
            ->where('basket.user_id', $user_id)
            ->sum('products.price');
        return view('ordernow', ['total' => $total]);
    }

    function orderPlace(Request $req, Order $order)
    {
//        $userId = Session::get('user')['id'];
        $userId = Auth::id();
        $allCart = Basket::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $req->address;
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->save();
        }
        Basket::where('user_id', $userId)->delete();
        return redirect('/');
//        return $req->input();
    }

    function myorder()
    {
//        $user_id = Session::get('user')['id'];
        $user_id = Auth::id();
        $data = Order::where('user_id',$user_id)->get();
//        $data = DB::table('orders')
//            ->join('products', 'orders.product_id', 'products.id')
//            ->where('orders.user_id', $user_id)
//            ->get();
//        return $data;
        return view('myorder',['orders'=>$data]);
    }
}
