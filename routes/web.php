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
Route::post('/image/save', 'ImageController@save')->name('image.save');


// foto de perfil
Route::get('/image/file/{filename}','ImageController@getImage')->name('image.file');


//perfil
Route::get('/perfil/{id}', 'UserController@profile')->name('profile');

// imagen detalles

Route::get('/imagen/{id}','ImageController@detail')->name('image.detail');

//comentarios
Route::post('/commnet/save','CommentController@save')->name('comment.save');
Route::get('/commnet/delete/{id}','CommentController@delete')->name('comment.delete');


// LIKES
Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{image_id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');

// eliminar imagen

Route::get('/image/delete/{id}','ImageController@delete')->name('image.delete');
//editar imagen

Route::get('/image/editar/{id}', 'ImageController@edit')->name('image.edit');
Route::post('/image/update', 'ImageController@update')->name('image.update');

//gente

Route::get('/gente', 'UserController@index')->name('user.index');
Route::get('/gente/{search?}', 'UserController@index')->name('user.index');
