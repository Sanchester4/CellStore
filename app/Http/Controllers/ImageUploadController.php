<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Image;

use App\Models\Postimage;

class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('Admin.add_image');
    }
    //Store image
    public function storeImage(Request $request){
       /*Logic to store data*/
       $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $img = Image::make($file->getRealPath());
            $destinationPath = public_path('/Image');
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
            //$img->move($destinationPath, $filename);
            //$img->move(public_path('Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');

    }
		//View image
    public function viewImage(){
        $imageData= Postimage::all();
        return view('Admin.view_image', compact('imageData'));
    }
}

?>