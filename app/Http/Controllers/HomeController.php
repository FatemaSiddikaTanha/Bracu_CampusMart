<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {   
        $user = User::where('usertype','user')->count();
        $product = Product::count();
        $order = Order::count();
        $delivered = Order::where('status','Delivered')->count();
        return view('admin.index', compact('user','product','order','delivered'));
    }

    
    public function home(Request $request)
    {
    $search = $request->query('query'); 
    $priceFilter = $request->query('price_filter');

    $productQuery = Product::query();

    // Search filter with proper grouping
    if ($search) {
        $productQuery->where(function($query) use ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // Price filter
    if ($priceFilter == 'low') {
        $productQuery->orderBy('price', 'asc');  
    } elseif ($priceFilter == 'high') {
        $productQuery->orderBy('price', 'desc'); 
    }

    // Limit to 50 products
    $product = $productQuery->take(50)->get();

    // Cart count
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = '';
    }

    return view('home.index', compact('product', 'count'));
    }


    public function login_home()
    {
        $product = Product::all();
        if(Auth::id()) {
            $user=Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count(); 
        } else {
            $count ='';
        }
        return view('home.index', compact('product','count'));
    }

    public function product_details($id)
    {
        $data = Product::findOrFail($id);
        if(Auth::id()) {
            $user=Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count(); 
        } else {
            $count ='';
        }
        return view('home.product_details', compact('data','count'));
    }

    public function add_cart($id)
    {
        $user = Auth::user();
        $data = new Cart;
        $data->user_id = $user->id;
        $data->product_id = $id;
        $data->save();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Added to Cart Successfully');
        return redirect()->back();
    }

    public function mycart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart', compact('count','cart'));
    }

    public function delete_cart($id)
    {
        $data = Cart::findOrFail($id);
        $data->delete();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Deleted From Cart Successfully');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $request->name;
            $order->rec_address = $request->address;
            $order->phone = $request->phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }

        Cart::where('user_id', $userid)->delete();

        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Ordered Successfully');
        return redirect()->back();
    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->count();
        $order = Order::with('product')->where('user_id', $user)->get();

        return view('home.order', compact('count','order'));
    }
    

}
     