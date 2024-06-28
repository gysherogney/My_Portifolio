<?php

use App\Http\Controllers\myProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MyPhotoController;
use App\Models\myPhoto;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

 Route::get('/', [myProjectController::class,'index']);
 Route::post('/repeat',[myProjectController::class,'uploadData']);
  // Route::post('/repeat',[myProjectController::class,'sendSms']);
 Route::post('/upload',[myPhotoController::class,'uploadImage']);
 Route::get('/image_upload',[myPhotoController::class,'Portfolio']);
//  Route::post('/repeat',[myProjectController::class,'Email_send']);
 Route::get('/image_upload',[myPhotoController::class,'login']);
 Route::get('edit_image/{id}',[myPhotoController::class,'edit']);
 Route::put('update_student/{id}',[myPhotoController::class,'update']);
 Route::get('delete_image/{id}',[myPhotoController::class,'deleteImage']);

 
Route::get('/dashboard', function () {
    $photo = myPhoto::all();
    return view('dashboard',compact('photo'));
})->name('dashboard');
//->middleware(['auth', 'verified'])
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
