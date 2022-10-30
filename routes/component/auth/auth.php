<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\auth\ForgotPasswordController;


Route::group(['prefix' => 'auth'], function($route){
    $route->any('/', [ AuthController::class, 'login'])->name('auth.login');
    $route->any('/logout', [ AuthController::class, 'logout'])->name('auth.logout');
    $route->group(['prefix' => 'forgot'], function ($route){
        $route->any('/', [ ForgotPasswordController::class, 'index'])->name('auth.forgot.index');
        $route->get('/reset/{token}',[ForgotPasswordController::class, 'reset'])->name('auth.forgot.reset');
        $route->post('/set-password/{id}',[ForgotPasswordController::class, 'setPassword'])->name('auth.forgot.setpassword');

    });
});
