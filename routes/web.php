<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleLoginController;

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

Route::middleware([
    'auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//use socialite and GoogleLoginController redirect and callback urls
Route::get('/auth/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/callback', [GoogleLoginController::class, 'handleGoogleCallback']);


/*//socialite

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
dd($user);
});


Route::get('/auth/callback', function () {
    $GoogleUser = Socialite::driver('google')->user();
        
    $user = User::updateOrCreate([
        'github_id' => $GoogleUser->id,
    ], [
        'name' => $GoogleUser->name,
        'email' => $GoogleUser->email,
        'github_token' => $GoogleUser->token,
        'github_refresh_token' => $GoogleUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
});*/
