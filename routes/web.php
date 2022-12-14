<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Helper\Util;

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

if (env('APP_ENV') === 'production') {
    \URL::forceScheme('https');
}


require_once 'component/auth/auth.php';
require_once 'component/profile/profile.php';

Route::get('/', function(){ /*\Auth::guard('admin')->logout();*/ return view('main'); })->name('main');


Route::get('/setpass', [
    Util::class,
    'addPasswordForAdmin'
]);


Route::get('/testprofile', function(){ return view('profile.index'); })->name('profile');
Route::get('/testmailui', function(){ return view('auth.mail.mailInterface'); });
Route::get('/testsetting', function(){ return view('templates.settings.infoSetting'); });




