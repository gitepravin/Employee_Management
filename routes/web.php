<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/todo_show',[TodoController::class,'show']);

Route::get('/todo_delete/{country_id}',[TodoController::class,'destroy']);

Route::get('/todo_create',[TodoController::class,'create']);

Route::post('/todo_submit',[TodoController::class,'store']);

Route::get('/todo_edit/{country_id}', [TodoController::class, 'edit']);

Route::post('todo_update/{country_id}',[TodoController::class,'update']);

Route::get('/get-all-session', function(){
    $session = session()->all();
    p($session);
});

Route::get('/set-session',function(Request $request){
    $request->session()->put('user_name1','Pravin Gite');
    $request->session()->put('age1',23);

    return redirect('get-all-session');
});

Route::get('destroy-session', function(){
    session()->flush() ;
    return redirect('get-all-session');
});

Route::get('/set-cookie',function(){
    $response=response('Hello Morning');
    $response->withCookie('name','Pravin Gite',10);
    $response->withCookie('email','Pravin@Gite.com',10);
    $response->withCookie('addrr','Pravin',10);
    return $response;
});

Route::get('/get-cookie', function(Request $request){
    //return $request->cookie(['name','email']);  //Retrieves only name value
    return $request->cookies->all();  //Retrieves all cookies
   // return $value;
   
});

Route::get('destroy-cookie', function(){
   return response('deleted')->cookie('name',null,-1);
  
});