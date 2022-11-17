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
        $carts = Cart::where('user_id', auth()->id())->get();
        // dd($carts);
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
        // dd($request);
        $this->validate(request(), [
            'quantity' => 'required',
        ]);
            if(empty(auth()->id()))
            {
                return redirect()->route('login');
            }

            $found = Cart::where('user_id', auth()->id())->get();
            $itIs = false;
            foreach($found as $item)
            {
                if($item->product_id == $request->product_id)
                {
                    $itIs = true;
                    DB::table('cart')
                ->where('product_id', $request->product_id)
                ->update(array(
                    'quantity' => $request->quantity,
                ));
                }
                else{
                    $itIsNot = true;
                }
            }
            if(empty($item->user_id) || $itIs == false)
            {
                $cart = new Cart();
                $cart->user_id = auth()->id();
                $cart->product_id = $request->product_id;
                $cart->quantity = $request->quantity;
                $cart->save();
                return redirect()->back()->with('message','The product has been added to the Cart.');
            }
                return redirect()->back()->with('message','The product has been updated to the Cart.');
            }  
}
?>