<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin;
use App\Http\Middleware;
use App\Http\Controllers\App;
use App\Http\Controllers\HomeController;

Route::get('/auth/login', fn()=> redirect('/login'))->name('login')->middleware('guest');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    if(auth()->user()->type == 'admin'){
        return redirect(route('admin.dashboard'));
    }
    return redirect(route('app.dashboard'));
})->middleware('auth')->name('dashboard');


Route::get('article-list/{category}', [HomeController::class, 'getArticles'])->name('category.article');
Route::get('article/{category}/{slug}', [App\BlogController::class, 'show'])->name('view-article');
Route::get('pages/{slug}', [HomeController::class, 'show_page'])->name('view-page');
// auth routes
Route::name('auth.')->group(function () {
    Route::middleware('guest')->group(function(){
        Route::view('register', 'auth.register')->name('register');
        Route::post('register', [AuthController::class, 'register']);

        Route::view('login', 'auth.login')->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    Route::middleware('auth')->group(function(){
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

// admin routes
Route::name('admin.')->prefix('admin')->middleware([Middleware\AdminOnlyAccess::class])->group(function(){
    Route::get('/', fn () => redirect('admin/dashboard'));
    
    Route::middleware('auth')->group(function(){
        Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');

        Route::get('popup', Admin\Popups::class)->name('popup');
        Route::get('pages', Admin\Pages::class)->name('pages');
        Route::get('coupon', Admin\CouponList::class)->name('coupon');

        // users
        Route::get('users', Admin\Users::class)->name('users')->middleware('can:manage users');

        // articles
        Route::get('articles', Admin\Blog\Index::class)->name('blog.index')->middleware('can:view articles');
        Route::get('articles/list', Admin\Blog\ArticleList::class)->name('blog.list')->middleware('can:view articles');
        Route::get('articles/create', Admin\Blog\Create::class)->name('blog.create')->middleware('can:create article');
        Route::get('articles/edit/{slug}', Admin\Blog\Edit::class)->name('blog.edit')->middleware('can:edit article');

        // categories
        Route::get('categories', Admin\Category::class)->name('categories')->middleware('can:manage categories');
        Route::get('tags', Admin\Tags::class)->name('tags')->middleware('can:manage tags');
    
        // admins
        Route::get('admins', Admin\Admins::class)->name('admins')->middleware('can:manage admins');
        Route::get('admins/roles', Admin\Roles::class)->name('roles')->middleware('can:manage roles');
        Route::get('admins/permissions', Admin\Permissions::class)->name('permissions')->middleware('can:manage permissions');
    
        // accounting
        Route::get('accounting/journal', Admin\Journal::class)->name('accounting.journal')->middleware('can:manage journal');
    });
});

Route::name('app.')->prefix('app')->middleware([Middleware\UserOnlyAccess::class])->group(function(){
    Route::get('/', fn () => redirect('app/dashboard'));
    
    Route::middleware('auth')->group(function(){
        Route::view('dashboard', 'app.dashboard')->name('dashboard');
        Route::resource('blog', App\BlogController::class);
    });
});