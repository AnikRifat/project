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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function () {


    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('admin.index');






    // permission for the Super Admin
    Route::middleware('role:Super Admin')->group(function () {


        // for the UserController
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

        // For TagController
        Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
        Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
        Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/tag/{tag}', [TagController::class, 'update'])->name('tag.update');
        Route::delete('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

        // For CategoryController
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        // For SubCategoryController
        Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/subcategory', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/subcategory/{subcategory}/edit', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/subcategory/{subcategory}', [SubCategoryController::class, 'update'])->name('subcategory.update');
        Route::delete('/subcategory/destroy/{subcategory}', [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');

        Route::delete('/news/destroy/{news}', [NewsController::class, 'destroy'])->name('news.destroy');


        //website-settings route
        Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
        Route::put('/website/update/{website}', [WebsiteController::class, 'update'])->name('website.update');

        //contact-settings route
        Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact.index');
        Route::put('/contact/update/{website}', [WebsiteController::class, 'contactUpdate'])->name('contact.update');
    });


    // for the Admin
    Route::middleware('role:Admin')->group(function () {
    });


    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');

    // THese routes accesable for everyone


    // / For tagController
    Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
    // / For CategoryController
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

    // For SubCategoryController
    Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory.index');

    // the NewsController
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
});
