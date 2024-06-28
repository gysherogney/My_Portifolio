<?php

namespace App\Http\Controllers;
use App\Models\myPhoto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MyPhotoController extends Controller
{ 

    public function uploadImage(Request $reqqu){
         $path='images';
       
         $myphoto= $reqqu->Photos->getClientOriginalName();
       
         $reqqu->Photos->move(public_path($path),$myphoto);
          $image = new myPhoto();
          $image->Photos = $myphoto;
          $image->save();
          return redirect()->back(); 
     }




// public function display()
// {
//     $student = myPhoto::all();
//     return view('frontend.Master',compact('student'));

// }


    public function edit($id){

        $photo = myPhoto::find($id);
        return view('edit',compact('photo')); 
    }



    public function update(Request $request,$id){
         $photo = myPhoto::find($id);
        $path='images';
         echo "imefika";
        $myphoto = $request->Photos->getClientOriginalName();
        $destination ='images'.$photo->Photos;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $request->Photos->move(public_path($path),$myphoto);
         $photo->Photos = $myphoto;
         $photo->update();
         return redirect()->back();
    }
    public function deleteImage($id){
        $photo = myPhoto::find($id);
        $destination ='images'.$photo->Photos;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $photo->delete();
        return redirect()->back()->with('status', 'portifolio image has been deleted successfully');

    }


    public function Portfolio()
  {   
    $photo  =  myPhoto::all();
    return view('frontend.Master',compact('photo'));
   
   
}
     
 
    
}
