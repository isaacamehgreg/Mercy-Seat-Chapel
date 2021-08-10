<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin get slot
Route::get('/sunday', function(Request $request){
    return DB::table('sundays')->get();
 });

//admin create slots
Route::post('/sunday', function(Request $request){
    DB::table('sundays')->insert([
        'title' =>$request->input('title'),
        'date' =>$request->input('date'),
        'slot' =>$request->input('slot'),
        'created_at'=> Carbon::now()    
    ]);
 });

//admin create slots
Route::post('/sunday', function(Request $request){
   DB::table('sundays')->insert([
       'title' =>$request->input('title'),
       'date' =>$request->input('date'),
       'slot' =>$request->input('slot'),
       'created_at'=> Carbon::now()    
   ]);
});

//admin update slots
Route::post('/sunday', function(Request $request){
    DB::table('sundays')->update([
        'title' =>$request->input('title'),
        'date' =>$request->input('date'),
        'slot' =>$request->input('slot'),
        'created_at'=> Carbon::now() 
    ]);
 });

 //admin delete slots
Route::get('/sunday/delete/{id}', function($id){
    DB::table('sundays')->where('id',$id)->delete();
 });


 //user booking
 //attend booking
Route::post('/attend', function(Request $request){
    DB::table('attendees')->insert([
        'user_id' =>Auth::user()->id,
        'sunday_id' =>$request->input('sunday_id'),
        'created_at'=> Carbon::now()    
    ]);
 });

//cancel booking
Route::get('/attend/delete/{id}', function($id){
    DB::table('attendees')->where('user_id',Auth::user()->id)->where('sunday_id',$id)->delete();
 });
