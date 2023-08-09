<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;

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

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'attempLogin']);

Route::middleware('auth')->group(function(){

    Route::get('/', function () {
        $frameworks = ['Laravel','Inertia','Vue'];
        return Inertia::render('Home',compact('frameworks'));
    });
    
    Route::get('/users', function (Request $request) {
        return Inertia::render('Users/Index',[
            'users' => User::when( $request->search , function ($query,$search) {
                            $query->where('name','LIKE',"%{$search}%");
                        })
                        ->paginate(10)
                        ->withQueryString()
                        ->through(fn($user) => [
                            'id' => $user->id,
                            'name' => $user->name,
                        ])
        ]);
    });
    
    Route::get('/users/create',function(){
        return Inertia::render('Users/Create');
    });
    
    Route::post('/users',function(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        User::create($request->all());
    
        return redirect('/users');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
    
    Route::post('logout',[LoginController::class,'logout']);
    
    Route::resource('customer',CustomerController::class);

});

