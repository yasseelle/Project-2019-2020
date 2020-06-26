<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','news_controller@hommefun');

//user
Route::get('kitnews/register','userscontroller@create');
Route::post('kitnews/register/store','userscontroller@store');
Route::get('kitnews/login','userscontroller@logincreate');
Route::post('kitnews/login/store','userscontroller@loginstore');
Route::get('/kitnews/logout','userscontroller@logout');
Route::post('/kitnews/dashbord/users/search','userscontroller@usersearch');


//category
Route::get('/kitnews/category/create','category_controller@create');
Route::post('/kitnews/category/store','category_controller@store');
Route::post('/kitnews/dashbord/category/search','category_controller@searchcatdashbord');


// news per category filred
Route::get('/kitnews/news/id/{catnom}/','news_controller@createid');
// news Detaild
Route::get('/kitnews/news/{newsid}','news_controller@newsdtails');



//coment
Route::post('/kitnews/news/{newsid}/commentstore','news_controller@insertcomment');

//news
Route::get('    ','news_controller@index');
Route::get('/kitnews/news/new/create','news_controller@create');
Route::post('/kitnews/news/new/store','news_controller@store');

//dashbord 
Route::get('/kitnews/dashbord','news_controller@dashbord');//done


//dashbord users
Route::get('/kitnews/dashbord/users','userscontroller@index');//donne
Route::get('/kitnews/dashbord/users/edit/{id}','userscontroller@edit');//done
Route::post('/kitnews/dashbord/users/update/{id}','userscontroller@update');//done
Route::delete('/kitnews/dashbord/users/delete/{id}','userscontroller@destroy');//done


//dashbord category
Route::get('/kitnews/dashbord/category','category_controller@index');
Route::get('/kitnews/dashbord/category/edit/{id}','category_controller@edit');//done
Route::post('/kitnews/dashbord/category/update/{id}','category_controller@update');//done
Route::delete('/kitnews/dashbord/category/delete/{id}','category_controller@destroy');//done


//dashbord news
Route::get('/kitnews/dashbord/news','news_controller@dashindex');
Route::get('/kitnews/dashbord/news/edit/{id}','news_controller@edit');//done
Route::post('/kitnews/dashbord/news/update/{id}','news_controller@update');//done
Route::delete('/kitnews/dashbord/news/delete/{id}','news_controller@destroy');//done
Route::post('kitnews/dashbord/search_user','news_controller@dashbordusersearch');//done

//img
Route::delete('/kitnews/img/delete/{id}/{idpost}','news_controller@destroyimg');//done
Route::post('addphoto/{id}','news_controller@addphoto');//done

//search
Route::post('kitnews/search','news_controller@search');//done