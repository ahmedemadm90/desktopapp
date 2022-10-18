<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\File;
use Illuminate\Support\Facades\Auth;



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

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','verified']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('files', FileController::class);
    Route::prefix('comments')->group(function () {
        Route::get('/index', [CommentController::class, "index"])->name('comments.index');
        Route::get('/create/{id}', [CommentController::class, "create"])->name('comments.create');
        Route::post('/store/{id}', [CommentController::class, "store"])->name('comments.store');
        Route::get('/edit/{id}', [CommentController::class, "edit"])->name('comments.edit');
        Route::post('/update/{id}', [CommentController::class, "update"])->name('comments.update');
    });
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [ProfileController::class, "edit"])->name('profile');
        Route::POST('/update/{id}', [ProfileController::class, "update"])->name('profile.update');
    });
    Route::get('download/{id}',function($id){
        $file =  File::findOrFail($id);
        if($file){
            if($file->file_type == 'video'){
                $file_path = public_path('media/videos/' . $file->file_name);
            }else{
                $file_path = public_path('media/voices/' . $file->file_name);
            }
        }else{
            abort(404);
        }
        return response()->download($file_path);
    })->name('download');
});
