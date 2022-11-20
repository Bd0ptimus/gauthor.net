<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;


Route::group(['prefix' => 'image', 'as'=>'image.'], function($route){
    $route->post('/change-status', [ ImageController::class, 'changeStatus'])->name('changeStatus');
});
