<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Profile\ProfileController;


Route::group(['prefix' => 'profile'], function($route){
    $route->get('/', [ ProfileController::class, 'index'])->name('profile.index');
    $route->group(['prefix' => 'setting'], function ($route){
        $route->any('/', [ ForgotPasswordController::class, 'index'])->name('profile.setting.update');
    });
});
