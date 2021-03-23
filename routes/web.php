<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'users'], function () {
Route::get('/', function () {
	return view('pages.index');
});



route::get('/aboutus', 'Hellocontroller@about')->name('about');

route::get('/contact', 'Hellocontroller@contact')->name('contact');

//route::get('/writepost', 'Bolocontroller@writepost')->name('writepost');
//cetegory crud are here
route::get('/allcategory', 'Bolocontroller@Allcategory')->name('all.category');
route::get('/addcategory', 'Bolocontroller@addcategory')->name('addcategory');

route::post('/storecategory', 'Bolocontroller@StoreCategory')->name('storecategory');



route::get('/view/category/{id}', 'Bolocontroller@Viewcategory')->name('viewcat');

route::get('/delete/category/{id}', 'Bolocontroller@Deletecategory')->name('deletecategory');

route::get('/edit/category/{id}', 'Bolocontroller@Editcategory')->name('editcategory');
route::post('/update/category/{id}', 'Bolocontroller@Updatecategory')->name('update.category');

///////-------------------------//////
route::get('/writepost', 'postcontroller@writepost')->name('writepost');

route::post('store/post', 'postcontroller@storepost')->name('store.post');



Route::get('all/post','PostController@AllPost')->name('all.post');


route::get('/view/post/{id}', 'postcontroller@Viewpost')->name('viewpost');

});

Route::get('/login', function () {
	return view('pages.post.login');
});

route::post('/submitlogin', 'UserlistController@submitlogin');

route::get('/edit/post/{id}', 'postcontroller@Editpost')->name('editpost');

Route::post('update/post/{id}','PostController@UpdatePost');
Route::get('delete/post/{id}','PostController@DeletePost');
//----------------------model use-----------------------------//

route::get('/student', 'StudentController@student')->name('student');
route::post('store/student', 'StudentController@store')->name('store.student');
route::get('all/student', 'StudentController@index')->name('all.student');
route::get('view/student/{id}','StudentController@show');
route::get('/delete/student/{id}','StudentController@destroy');
route::get('/edit/student/{id}','StudentController@edit');
route::post('/update/student/{id}','StudentController@update');
route::get('/search','StudentController@search');

