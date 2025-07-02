<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin;
use App\Http\Middleware;
use App\Http\Controllers\App;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;

/**
 * Guest pages
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/signin', function(){return redirect('login');})->name('login');
Route::view('search', 'search')->name('search'); //search page

Route::get('articles/{slug}', [BlogController::class, 'category'])->name('category.articles');
Route::get('articles/{category}/{slug}', [BlogController::class, 'article'])->name('article.show');
Route::get('pages/{slug}', [HomeController::class, 'show_page'])->name('view-page');
// archive
Route::get('magazine-archive', [ArchiveController::class, 'index'])->name('archive.index');
Route::get('magazine-archive/{year}/{start}-{end}', [ArchiveController::class, 'show'])->name('archive.show');

Route::post('newsletter/subscribe', [HomeController::class, 'subscribe'])->name('newsletter.subscribe');

// subscription
Route::view('annahda-plus', 'annahda-plus')->name('annahda_plus');
Route::view('subscribe-to-printed-magazine', 'printed-magazine')->name('printed_magazine');
Route::get('checkout/{plan}', [CheckoutController::class, 'process'])->name('checkout')->middleware('auth');
Route::post('create-subscription', [CheckoutController::class, 'create_razorpay_order']);


/**
 * Auth routes
 */
Route::get('/dashboard', function () {
    if(auth()->user()->type == 'admin'){
        return redirect(route('admin.dashboard'));
    }
    return redirect(route('app.dashboard'));
})->middleware('auth')->name('dashboard');

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

/**
 * admin routes
 */
Route::name('admin.')->prefix('admin')->middleware([Middleware\AdminOnlyAccess::class])->group(function(){
    Route::get('/', fn () => redirect('admin/dashboard'));
    
    Route::middleware('auth')->group(function(){
        Route::get('dashboard', Admin\Dashboard::class)->name('dashboard');

        Route::get('popup', Admin\Popups::class)->name('popup');
        Route::get('pages', Admin\Pages::class)->name('pages');
        Route::get('coupon', Admin\Coupon::class)->name('coupon');
        Route::get('magazine', Admin\Magazine::class)->name('magazine');
        Route::get('slides', Admin\Slides::class)->name('slides');


        Route::get('plan', Admin\Plans::class)->name('plan');
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

/**
 * App routes
 */
Route::name('app.')->prefix('app')->middleware([Middleware\UserOnlyAccess::class])->group(function(){
    Route::get('/', fn () => redirect('app/dashboard'));
    
    Route::middleware('auth')->group(function(){
        Route::view('dashboard', 'app.dashboard')->name('dashboard');
        Route::resource('blog', App\BlogController::class);
        Route::get('subscriptions', [App\SubscriptionController::class, 'index'])->name('subscriptions.index');
        Route::get('subscriptions/invoice/{id}', [App\SubscriptionController::class, 'invoice'])->name('subscriptions.invoice');

        Route::post('address/create', [AddressController::class, 'store'])->name('address.create');
    });
});