<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\students;
use App\grades;
use Illuminate\Support\Str;

class StudentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request )
    {
        

        $rules=[
            'name' => 'required|max:255', 
            'age'=>'required|numeric',
            'department'=>'required|max:255',
            'grade'=>'required|numeric',
            'money'=>'required|numeric',
            'image'=>'required|image|max:2048|mimes:jpg,jpeg,png',

        ];
        $message=[
            'name.required'=>'مطلوب',
            'age.required'=>'مطلوب ',
            'age.required'=>'مطلوب ',
            'department.required'=>'مطلوب ',
            'grade.required'=>'مطلوب ',
            'money.required'=>'مطلوب ',
            
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $file  = $request->file('image');
        $fileName = time().str::random(10).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads') , $fileName);
    

        students::create([
            'name'=>$request->name,
            'age'=>$request->age,
            'department'=>$request->department,
            'grade'=>$request->grade,
            'money'=>$request->money,
            'image' => $fileName,
        ]);
        // return redirect();
        return redirect()->to('show');
    }

    public function show()
    {
        $students=students::select('id','name','age','department','grade','money','image')->get();

        return view('show',compact('students'));
    }

    public function search(Request $request )
    {
        $rules=[
             
            'search'=>'required|numeric'
            

        ];
        $message=[
            'search.required'=>'مطلوب'
            
            
        ];

        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $students=students::select('id','name','age','department','grade','money','image')->get();
        $grades=grades::select('id','course','grate')->get();

        $idit=$request->search;

        return view('information',compact('idit','students','grades'));

        

        
    }

    public function grade()
    {
        return view('grade');

        
    }


    public function gradestore(Request $request)
    {

        grades::create([
            'id'=>$request->id,
            'course'=>$request->course,
            'grate'=>$request->grade,
            

            
        ]);
        return redirect()->to('show');

        
    }



}
