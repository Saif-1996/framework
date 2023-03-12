<?php


use App\Exports\UsersExport;
use App\Http\Controllers\Ajax\ApiController;
use App\Http\Controllers\first;
use App\Http\Controllers\InsertControler;
use App\Http\Controllers\OrmController;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/first', function () {
//     return 'welcome';
// });

//Route::get('fir','first@showstring');
//Route::get('fir','App\Http\Controllers\FirstController@first');
//Route::namespace('App\Http\Controllers\Front')->group(function (){
//    Route::get('fir','tow@take')->middleware('auth');
//    Route::get('fir1','tow@take2');
//
//
//
//});
//Route::get('/login',function (){
//   return view('login');
//});

//Route controller in laravel 10     ***************

//Route::get('test',[first::class,'showstring']);

//
route::get('tow','App\Http\Controllers\SecondController@index');
//Route::get('first',function (){
//    return view('test');
//
//});
Route::get('first2',function (){
    return view('test2');

});




//Query builder------------------------

//Route::resource('first.edit{id}',[\App\Http\Controllers\TableConrtoller::class])->name('edit');
//Route::resource('first.store',[\App\Http\Controllers\TableConrtoller::class])->name('insert');
//Route::resource('first.destroy',[\App\Http\Controllers\TableConrtoller::class])->name('delete');

//               OR
//Route::controller(\App\Http\Controllers\TableConrtoller::class)->group(function (){
//    Route::post('first/insert','store')->name('insert');
//    Route::get('first','show')->name('first');
//    Route::get('first/edit/{id}','edit')->name('edit');
//    Route::PUT('first/update/{id}','update')->name('update');
//    Route::get('first/delete/{id}','destroy')->name('delete');
//
//
//});
//                       OR
//Route::get('first',);
//Route::post('first/edit',[\App\Http\Controllers\TableConrtoller::class,'edit'])->name('edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//ORM -----------------------------------------
Route::resource('orm', OrmController::class);
Route::resource('orm', OrmController::class);
//    Route::get('orm',[\App\Http\Controllers\OrmController::class,'index']);



//AJX   -----------------


Route::get('show',[ApiController::class,'show']);
Route::get('p',[ApiController::class,'toex']);
Route::get('p',function (){

        Excel::import(new UsersImport, 'users.xlsx');

        return redirect('/')->with('success', 'All good!');

});

Route::post('/export',[ApiController::class,'exportForm'])->name('export.form');




