<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Bolocontroller extends Controller
{

 public function Addcategory()
 {
 	return view('post.add_category');
 }
 

 public function StoreCategory(Request $request)
    {
       $validatedData = $request->validate([
             'name' => 'required|unique:categories|max:25|min:4',
             'slug' => 'required|unique:categories|max:25|min:4',
         ]);

      $data=array();
      $data['name']=$request->name;
      $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if ($category) {
           $notification=array(
                'messege'=>'Successfully Category Inserted',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.category')->with($notification);   
        }else{
            $notification=array(
                'messege'=>'Something went wrong!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);   
        }

    }

 
 public function Allcategory()
 {
 	//return view('pages.post.all_category');
 	$category= DB::table('categories')->get();
return view('post.all_category',compact('category'));

 }
 public function Viewcategory($id)
 {

    
    $category=DB::table('categories')->WHERE('id',$id)->first();

    return view('post.categoryview',['cat'=>$category]);
 }
  public function Deletecategory($id){
  	

   $delete =DB::table('categories')->where ('id',$id)->delete();
  // DB::table('users')->where('votes', '>', 100)->delete();

 $notification=array(
'messege'=>'Sucessfully category Deleted',
'atert-type'=>'success');
  return Redirect()->back()->with($notification);

  }
     public function Editcategory($id)
     {
      $category=DB::table('categories')->WHERE('id',$id)->first();
      return view('post.editcategory',compact('category'));
     }
 
 public function Updatecategory (Request $request,$id)
 {


  $validatedData = $request->validate([
        'name' => 'required|max:25|min:4',
        'slug' => 'required|max:25|min:4',
       
    ]);


  $data = array();
  $data['name']= $request->name;
 $data ['slug']= $request->slug;
  $category=DB::table('categories')->where('id',$id)->update($data);
  //$data = mysqli_query($data, "SELECT * FROM categories WHERE id='$data'");
 
//return response()->jeson($data);
if ($category) {
           $notification=array(
                'messege'=>'Successfully Category Updated',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.category')->with($notification);   
        }else{
            $notification=array(
                'messege'=>'Nothing to updated',
                'alert-type'=>'error'
                 );
               return Redirect()->route('all.category')->with($notification);   
        }




//return Redirect()->back()->with('success','category inserd');


	  }



     }
