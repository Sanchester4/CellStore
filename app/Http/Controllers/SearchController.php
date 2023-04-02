<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Phone;

  
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getSearchView()
     {
      return view ('Client.searchNegResults');
     }

    public function index()
    {
      $var = true;
      $search_text = $_GET['search'];
      $phones = Phone::where('title', 'Like', '%' . $search_text . '%')->get();
      
      foreach($phones as $phone)
      {
        $var = false;
      }

      if($var==true)
      {
        return redirect ('Search')->with('message','There is no match for your request.');
      }
        return view ('Client.searchResults', compact('phones'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Phone::select("title")
                    ->where('title', 'LIKE', "%{$request->term}%")
                    ->pluck('title');
        return response()->json($data);
    }

}

?>