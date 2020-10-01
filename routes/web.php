<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//use App\Image;

//Route::get('/', function () {
/*
	$images = Image::all();
	foreach($images as $image){
		echo $image->image_path."<br>";
		echo $image->user->name.' '.$image->user->surname. "<br>";
		echo $image->description."<hr>";
	
			echo '<h4> Comentarios </h4>';

			foreach($image->comments as $comment){
				echo $comment->content .'<br>';
			}

	
	}
	die();
    return view('welcome'); 

    
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/cambiar-contraseña', 'ChangePasswordController@index');
Route::post('/cambiar-contraseña', 'ChangePasswordController@store')->name('change.password');


Route::get('/configuracion','UserController@config')->name('config');
Route::post('/user/update','UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}','UserController@getImage')->name('user.avatar');

Route::get('/subir-imagen', 'ImageController@create')->name('image.create');
Route::post('/image/save', 'ImageController@store')->name('image.save');


// foto de perfil


//perfil
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');
