<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'index'])->name('index');


Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('admin.index');



    //news-routes....
    Route::resource('news', NewsController::class);
    Route::delete('/news/delete/{news}', [NewsController::class, 'destroy'])->name('news.delete');


    //news-routes....
    Route::resource('user', UserController::class);
    Route::resource('tag', TagController::class);
    Route::resource('category', CategoryController::class);
    Route::delete('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::resource('subcategory', SubCategoryController::class);
    Route::delete('/subCategory/delete/{subCategory}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');

    Route::resource('tag', TagController::class);
    Route::delete('/tag/delete/{tag}', [TagController::class, 'destroy'])->name('tag.delete');

    //website-settings route
    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    Route::put('/website/update/{website}', [WebsiteController::class, 'update'])->name('website.update');

    //contact-settings route
    Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact.index');
    Route::put('/contact/update/{website}', [WebsiteController::class, 'contactUpdate'])->name('contact.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
