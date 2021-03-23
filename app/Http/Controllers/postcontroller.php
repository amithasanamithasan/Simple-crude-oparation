<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postcontroller extends Controller
{
     public function writepost()
 {
 	$category=DB::table('categories')->get();
return view('post.writepost',compact('category'));
 }

 public function storepost(Request $request)
 {
 	$validatedData = $request->validate([
        'titel' => 'required||max: 200',
        'details' => 'required',
        'image' => 'required | mimes:jpeg,jpg,png,PNG | max:100000',
       
    ]);
 $data = array();
 $data ['titel']=$request->titel;
 $data ['category_id']=$request->category_id;
$data ['details']=$request->details;
	
	 $image=$request->file('image');

	if ($image) {
		$image_name=hexdec(uniqid());
		$ext=strtolower($image->getClientOriginalExtension());
		$image_full_name=$image_name.'.'.$ext;
		$upload_path='public/frontend/image/';
		$image_url=$upload_path.$image_full_name;


		$success=$image->move($upload_path,$image_full_name);

$data['image']=$image_url;

     DB::table('posts')->insert($data);

$notification=array(
			'massage'=>'successfully category insert',
			'alert-type'=>'success'



		);
		return Redirect()->back()->with($notification);
		

	}
	else
	{

		DB::table('posts')->insert($data);
		$notification=array(
			'massage'=>'successfully category insert',
			'alert-type'=>'success'



		);
		return Redirect()->back()->with($notification);
     }
    }

public function AllPost(){

  //$post=DB::table('posts')->get();
	$post=DB::table('posts')
	->join('categories','posts.category_id','categories.id')
	->select('posts.*','categories.name')
	->get();
 	
	return view('post.allpost',compact('post'));

}

public function Viewpost($id)
{
	$post=DB::table('posts')
	->join('categories','posts.category_id','categories.id')
	->select('posts.*','categories.name')
	->where('posts.id',$id)
	->first();
	return view('post.viewpost',compact('post'));
}
    public function DeletePost($id)
    {
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;
        $delete=DB::table('posts')->where('id',$id)->delete();
        if ($delete) {
            unlink($image);
            $notification=array(
                'messege'=>'Successfully Post Deleted !',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }
    }


public function EditPost($id)

{
	$category=DB::table('categories')->get();
	$post=DB::table('posts')->where('id',$id)->first();


return view('post.editpost',compact('category','post'));
}



 public function UpdatePost(Request $request,$id)
    {
         $validatedData = $request->validate([
             'titel' => 'max:200',
             'details' => 'required',
             'image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

        $data=array();
        $data['titel']=$request->title;
        $data['category_id']=$request->category_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
        unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);
             $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
                 );
             return Redirect()->route('allpost')->with($notification);
        }else{
             $data['image']=$request->old_photo;
             DB::table('posts')->where('id',$id)->update($data);
             $notification=array(
                'messege'=>'Successfully Post Updated',
                'alert-type'=>'success'
                 );
             return Redirect()->route('allpost')->with($notification);
        }
    }
}

