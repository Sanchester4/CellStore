<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Phone;
use App\Models\WishList;
use App\Models\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ClientController extends Controller
{
     public function getProfile(){

     $id = Auth::id();
     $users = User::where('id', $id) -> get();
     $orders = Order::where('user_id', auth()->id())->get();
     $phones = Phone::all();
     return view ('user', compact('users', 'orders', 'phones'));
     }

     public function getWishlist(){
          $carts = WishList::where('user_id', auth()->id())->get();
          // dd($carts);
          $phones = Phone::all();
          return view ('Client.wishlist',compact('carts', 'phones'));
      }

      function deleteFromWishList(Request $request)
    {
        $id = $request->product_id;
        WishList::where('product_id', $id)->delete();
        return redirect()->back()->with('message', 'The phone has been deleted successfully!');
    }

    function addToWishList(Request $request)
    {
        if(empty(auth()->id()))
            {
                return redirect()->route('login');
            }

            $found = WishList::where('user_id', auth()->id())->get();
            $itIs = false;
            foreach($found as $item)
            {
                if($item->product_id == $request->product_id)
                {
                    $itIs = true;
                }
                else{
                    $itIsNot = true;
                }
            }
            if(empty($item->user_id) || $itIs == false)
            {
                $wishlist = new WishList();
                $wishlist->user_id = auth()->id();
                $wishlist->product_id = $request->product_id;
                $wishlist->save();
                return redirect()->back()->with('message','The product has been added to the WishList.');
            }
        return redirect()->back()->with('message','The product has been updated to the WishList.');
    }

        function getCheckout()
        {
            $carts = Cart::where('user_id', auth()->id())->get();
            $phones = Phone::all();
            return view('Client.checkout', compact('carts', 'phones'));
        }

        function addOrder(Request $request)
        {
            // dd($request);
            $cart = Cart::where('user_id', auth()->id())->get();
            foreach($cart as $item){
            $randomNum = substr(str_shuffle("0123456789"), 0, 9);
            $order = new Order;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->delivery = $request->delivery;
            $order->post_code = $request->post_code;
            $order->phone_number = $request->phone_number; 
            $order->product_id = $item->product_id; 
            $order->user_id = auth()->id();
            $order->order_number = $randomNum;
            $order->save();
            Cart::where('product_id', $item->product_id)->delete();
            }
            return redirect()->back()->with('message','Your order has been placed, Thank you!');

        }

        function getByCategoryApple()
        {
            $phones = Phone::where('producedBy', 'Apple')->get();
            return view ('Client.categoryView', compact('phones'));
        }

        function getByCategorySamsung()
        {
            $phones = Phone::where('producedBy', 'Samsung')->get();  
            return view ('Client.categoryView', compact('phones'));
        }

        function getByCategoryHuawei()
        {
            $phones = Phone::where('producedBy', 'Huawei')->get();
            return view ('Client.categoryView', compact('phones'));
        }
}

?>