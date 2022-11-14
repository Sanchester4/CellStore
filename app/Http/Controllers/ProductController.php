<?php

namespace App\Http\Controllers;

use App\Models\Phone;
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
        // $phone->id = $request ->id; 
        // $phone->product_id_phone = $request ->id; 
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
        // DB::table('phones')
        //            ->where('id', $request->id)
        //            ->update(['title' => $request->name], ['price' =>  $request->price],
        //                     ['producedBy' =>  $request->factory],
        //                     ['prodYear' =>  $request->prodYear],
        //                     ['color' =>  $request->price],
        //                     ['tempUrl' =>  $request->price],
        //                     ['ramSize' =>  $request->price], 
        //                     ['romsize' =>  $request->price],
        //                     ['mainCameraPx' =>  $request->price],
        //                     ['frontCameraPx' =>  $request->price]);


        $phone = Phone ::where('id', '=', $request->id)->get();
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
        return redirect()->back()->with('message','The product has been updated successfully.');
    }

    public function showProducts(){
        $user = Auth::user();
        $phones = Phone::simplePaginate(6);  
        return view ('Admin.crud', compact('phones'));
    }

    public function getProductsShop(){
        $user = Auth::user();
        $phones = Phone::simplePaginate(6);  
        return view ('productPage', compact('phones'));
    }

    public function getProductById($id){
        $phone = Phone ::where('id', '=', $id)->get();
        return view ('singleProductPage', compact('phone'));
    }
    

    // public function getProduct(Request $request){
    //     $founds = Phone::where('id', $request->id);
    //     return view ('Admin.crud', compact('founds'));
    // }


}