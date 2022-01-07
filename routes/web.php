<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
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

//use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Welcome');

Route::post('/save', 'AuthController@Save')->name('save');
Route::post('/check','AuthController@Check')->name('check');
Route::any('/logout','AuthController@Logout')->name('Logout');
Route::group(['middleware'=>'guest'],function(){
    Route::get('/form', 'AuthController@LoginForm')->name('Login');
    Route::get('/RegisterForm', 'AuthController@RegisterForm')->name('Register');

});

Route::get('/dashboard','AuthController@Dashboard')->name('dashboard')->middleware('auth'); 
Route::get('/verify-email/{verification_code}', 'AuthController@verify_email')->name('verify_email');   

//Route::get('/fetch','displayController@display')->name('fetch');
Route::get('/cache','displayController@insertcache')->name('cache');


  

 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/find', 'RetriveController@retrive')->name('retreve');


