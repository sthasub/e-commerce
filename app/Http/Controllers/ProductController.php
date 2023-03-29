<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
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
        if ($req->session()->has('user')) {
            $basket = new Basket();
            $basket->user_id = $req->session()->get('user')['id'];
            $basket->product_id=$req->product_id;
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

    function basketItem(){
        $user_id = Session::get('user')['id'];
        return Basket::where('user_id',$user_id)->count();
    }

    function basketList(){
        $user_id = Session::get('user')['id'];
        $data = DB::table('basket')
            ->join('products','basket.product_id','products.id')
            ->select('products.*','basket.id as basket_id')
            ->where('basket.user_id',$user_id)->get();
        return view('basketList',['products'=>$data]);
    }

    function removebasket($id){
        Basket::destroy($id);
        return redirect('/basketList');
    }
}
