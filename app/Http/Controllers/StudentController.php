<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Student;

class StudentController extends Controller
{
  public function student(){
  	return view('student.create');
  }
  /////view data\\\\\\
  public function index(){
    $student=Student:: all();
   //  return response()->json($student);
    return view('student.index',compact('student'));
  }


   public function store(Request $request)
   {
   	 
       $validatedData = $request->validate([
             'name' => 'required|max:25|min:4',
             'phone' => 'required|unique:students|max:12|min:4',
             'email' => 'required|unique:students',
         ]);
///----------MOdel name---------///
   $student = new  Student;
  $student->name =$request->name;
    $student->email =$request->email;
     $student->phone =$request->phone;
      /// return response()->json($student);

         $student->save();

           $notification=array(
                'messege'=>'Successfully Category Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);   

   }

   public function show ($id)
   {

     $student=Student::find($id);
 // return response()->json($student);
     return view('student.view')->with('amit',$student);
     return Redirect()->route('all.student'); 
            
 
   }
   public function destroy($id)
   {
   //  $student=DB::table('students')->where ('id',$id)->delete();
  // DB::table('users')->where('votes', '>', 100)->delete();


    // $student=\App\Student::findorfile($id);
     $student=Student::findorfail($id);
         $student->delete();

          $notification=array(
                'messege'=>'Successfully Category Delete',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);   

   }
   public function edit($id)
   {
     $student=Student::findorfail($id);
 return view('student.edit', compact('student')); 

   }

   public function update(Request $request, $id)
   {
     $student=Student::find($id);
     $student->name =$request->name;
    $student->email =$request->email;
     $student->phone =$request->phone;
     
$student->save();
 $notification=array(
                'messege'=>'Successfully UPDATE',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.student')->with($notification);  
   }
   public function search(Request $request)
   {
    $search = $request->get('search');
    $student =DB::table('students')->where('phone','like','%'.$search.'%')->paginate(5);
    return view('student.index',['student'=>$student]);
      


   }
}
