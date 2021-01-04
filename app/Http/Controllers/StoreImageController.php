<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Images;
use Illuminate\Support\Str;

use Image;

class StoreImageController extends Controller
{

  
  public function __construct()
  {
      $this->middleware('auth');
  }
    
    function index()
    {
     $data = Images::latest()->paginate(1);
     return view('store_image', compact('data'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function insert_image(Request $request)
    {
     $request->validate([
      'user_name'  => 'required',
      'user_image' => 'required|image|max:2048|mimes:jpg,jpeg,png'
     ]);

    $file  = $request->file('user_image');
    $fileName = time().str::random(10).'.'.$file->getClientOriginalExtension();
    $file->move(public_path('admin_uploads') , $fileName);

    $requstArray = ['user_name' => $request->user_name , 'user_image' => $fileName] + $request->all() ;   

    Images::create($requstArray);

     return redirect()->back()->with('success', 'Image store in database successfully');
    }

    function fetch_image($image_id)
    {
     $image = Images::all();

     return $response;
    }





}
