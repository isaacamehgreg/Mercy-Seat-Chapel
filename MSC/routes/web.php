<?php

use App\Http\Controllers\MailController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


////////////////////////////////////////////////////////////////////Admin Route
//admin get slot
Route::get('/slot', function(Request $request){
    $slots = DB::table('slots')->limit(15)->get();

    return view('admindash')->with(['slots' => $slots ]);
 });
 

//admin create slots
Route::post('/slot', function(Request $request){
   DB::table('slots')->insert([
       'title' =>$request->input('title'),
       'date' =>$request->input('date'),
       'slot' =>$request->input('slot'),
       'status'=>'opened',
       'created_at'=> Carbon::now()    
   ]);
   return redirect('/slot');
});

//admin update slots
Route::post('/slot/update/{id}', function(Request $request){
    DB::table('slots')->update([
        'title' =>$request->input('title'),
        'date' =>$request->input('date'),
        'slot' =>$request->input('slot'),
        'status'=>'opened',
        'created_at'=> Carbon::now() 
    ]);
    return redirect('/slots');
 });

 //admin delete slots
Route::get('/slot/delete/{id}', function($id){
    DB::table('slots')->where('id',$id)->delete();
    return redirect('/slots');
 });





//admin get all  slots
Route::get('/slots', function(Request $request){

    if(Auth::user()->role != 'admin'){
    return redirect('/');
    }

    $slots = DB::table('slots')->paginate(15); 
    return view('adminslot')->with(['slots' => $slots ]);

 });


 //users
Route::get('/users', function(Request $request){
    $users= DB::table('users')->paginate(20);
    return view('adminusers')->with(['users' => $users,]);
 });




 
////////////////////////////////////////////////////////////////////User Route
Route::get('user', function () {
    $user= DB::table('users')->where('id',Auth::user()->id)->first();
    $slots = DB::table('slots')->get();
    $attendees = DB::table('attendees')->where('user_id',Auth::user()->id)->paginate(10); 
    return view('userdash')->with([
        'user' => $user,
        'slots'=>$slots,
        'attendees' =>$attendees
    ]);
});

//cancel booking
Route::get('/attend/delete/{id}', function($id){
    DB::table('attendees')->where('id',$id)->delete();
 });


 //attend booking
Route::post('/attend', function(Request $request){
    DB::table('attendees')->insert([
        'user_id' =>Auth::user()->id,
        'sunday_id' =>$request->input('sunday_id'),
        'is_confirmed' => false,
        'created_at'=> Carbon::now()    
    ]);
 });



Route::get('/mail', [MailController::class, 'sendEmail']);