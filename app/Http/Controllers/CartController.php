<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Html\FormFacade;
use Illuminate\Html\HtmlFacade;
use Illuminate\Support\Facades\DB;
use App\Support\Collection;


class CartController extends Controller
{
    public function getCart(){
        $carts = Cart::all();
        $phones = Phone::all();
        return view ('cart',compact('carts', 'phones'));
    }

    function deleteFromCart(Request $request)
    {
        $id = $request->product_id;
        Cart::where('product_id', $id)->delete();
        return redirect()->back()->with('message', 'The phone has been deleted successfully!');
    }

    function addToCart(Request $request)
     {
            if(empty($request->user_id))
            {
                return redirect()->route('login');
            }
            else{
            $found = Cart::where('product_id', $request->product_id) ->first();
            if(empty($found->id))
            {
                $cart = new Cart();
                $cart->user_id = auth()->id();
                $cart->product_id = $request->product_id;
                $cart->quantity = $request->quantity ;
                $cart->save();
                return redirect()->back()->with('message','The product has been added to the Cart.');
            }
            else {
                DB::table('cart')
                ->where('product_id', $request->product_id)
                ->update(array(
                    'quantity' => DB::raw('quantity + 1'),
                ));
                return redirect()->back()->with('message','The product has been updated to the Cart.');
            }  
        }
     }
}

?>