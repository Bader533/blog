<?php

namespace App\Http\Controllers;

use App\Offer;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create(){

        return view('offers.offer');
    }

    public function store(Request $request){
        $rules=[
            'name' => 'required|unique:offers,name|max:255',
            'price' => 'required|numeric',
            'details' => 'required'

        ];
        $message=[
            'name.required'=>'اسم موجود',
            'price.numeric'=>'السعر ',
            'price.required'=>'مطلوب ',
            'details.required'=>'مطلوب ',
            
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details,

        ]);
        return redirect()->back()->with(['success'=>'the operation is done ..']);
    }
}
