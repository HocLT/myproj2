<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class HomeController extends Controller
{
    public function index()
    {
        /*
        $role1 = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        $role2 = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'User',
            'slug' => 'user',
        ]);

        $credentials = [
            'email'    => 'admin@gmail.com',
            'password' => '123',
        ];
        
        $user1 = \Sentinel::create($credentials);
        $activation = \Activation::create($user1);
        $role1->users()->attach($user1);

        $credentials = [
            'email'    => 'user@gmail.com',
            'password' => '123',
        ];
        $user2 = \Sentinel::create($credentials);
        $activation = \Activation::create($user2);
        $role2->users()->attach($user2);
        */

        $prods = Product::all();
        return view('fe.index', compact('prods'));
    }

    public function productDetails($slug) 
    {
        // hàm where() sẽ trả về 1 mảng
        $prod = Product::where('slug', $slug)->first();
        return view('fe.product_details', compact('prod'));
    }

    public function addCart(Request $request) 
    {
        try {
            $pid = $request->pid;
            $quantity = $request->quantity;
            $cart = []; // khai báo biến lưu cart
            // kiểm tra session
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            }

            $prod = Product::find($pid);    // tìm product theo id
            // tạo đối tượng CartItem
            $item = new CartItem($prod, $quantity);

            // add item to cart
            $cart[] = $item;
            // lưu lại thông tin vào session
            $request->session()->put('cart', $cart);
            return 1;
        } catch (\Exception $e) {
            return 0;   // nên trả về mã 404, hiện tại vẫn trả về mã 200
        }
    }

    public function clearCart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $request->session()->forget('cart');
        }
    }

    public function viewCart(Request $request)
    {
        return view("fe.view_cart");
        // if ($request->session()->has('cart')) {
        //     dd($request->session()->get('cart'));
        // }
    }

    public function updateCart(Request $request)
    {
        $pids = $request->pids;
        $quantities = $request->quantities;
        $cart = $request->session()->get('cart');
        for ($i = 0; $i < count($pids); $i++) {
            foreach ($cart as $item) {
                if ($item->product->id == $pids[$i]) {
                    $item->quantity = $quantities[$i];
                    break;
                }
            }
        }
        $request->session()->put('cart', $cart);
    }
}
