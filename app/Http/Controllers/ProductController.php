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


class ProductController extends Controller
{
    public function storeNewPhone(Request $request){
        $phone = new Phone;
        $phone->title = $request->name;
        $phone->price = $request->price;
        $phone->producedBy = $request->factory;
        $phone->prodYear = $request->prodYear;
        $phone->color = $request->color;
        $phone->tempUrl = $request->tempUrl;
        $phone->ramSize = $request->ramSize;
        $phone->romSize = $request->romSize;
        $phone->mainCameraPx = $request->mainCamera;
        $phone->frontCameraPx = $request->secondCamera;
        $phone->save();
        return redirect()->back()->with('message','The product has been added successfully.');
    }

    public function updatePhone(Request $request){
        $phone = Phone::where('id',  $request->id)->first();
        DB::table('phones')
                   ->where('id', $request->id)
                   ->update(['title' => $request->title,
                             'tempUrl' => $request->tempUrl,
                             'price' => $request->price,
                             'color' => $request->color,
                             'producedBy' => $request->producedBy,
                             'prodYear' => $request->prodYear,
                             'ramSize' => $request->ramSize,
                             'romSize' => $request->romSize,
                             'mainCameraPx' => $request->mainCameraPx,
                             'frontCameraPx' => $request->frontCameraPx]);
        return redirect()->back()->with('message','The product has been updated successfully.');
    }

    public function showProducts(){
        $user = Auth::user();
        $phones = Phone::simplePaginate(12);  
        return view ('Admin.crud', compact('phones'));
    }

    public function getProductsShop(){
        $user = Auth::user();
        $phones = Phone::simplepaginate(12);  
        return view ('productPage', compact('phones'));
    }

    public function getProductById($id){
        $phone = Phone ::where('id', '=', $id)->get();
        $carts = Cart::all();
        return view ('singleProductPage', compact('phone','carts'));
    }
}

?>