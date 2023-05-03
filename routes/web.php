<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Ad_CategoryController;
use App\Http\Controllers\Admin\Ad_ProductController;
use App\Http\Controllers\Admin\Ad_OrderController;
use App\Http\Controllers\Admin\Ad_UserController;
use App\Http\Controllers\FE\CartController;
use App\Http\Controllers\FE\CheckOutController;
use App\Http\Controllers\FE\ProductController;
use App\Http\Controllers\FE\ProfileController;
use App\Http\Controllers\FE\HomeController;
use App\Models\Role;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


// require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
    // return redirect('/admin/dashboard');
});


// ============= back-end ===============
Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('/category', App\Http\Controllers\Admin\Ad_CategoryController::class)->names('admin.category');
    Route::resource('/product', App\Http\Controllers\Admin\Ad_ProductController::class)->names('admin.product');
    Route::resource('/coupon', App\Http\Controllers\Admin\Ad_CouponController::class)->names('admin.coupon');
    Route::resource('/user', App\Http\Controllers\Admin\Ad_UserController::class)->names('admin.user');

    // Route::resource('/admin/category', App\Http\Controllers\Admin\AjaxCategoryController::class)->names('admin.category');

    Route::get('/admin/order/index', [Ad_OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/admin/order/invoice', [Ad_OrderController::class, 'showDetail'])->name('admin.order.invoice');
    Route::get('/admin/order/invoice-print', [Ad_OrderController::class, 'printInvoice'])->name('admin.order.printInvoice');
});

// ============= front-end ===============
Route::resource('/product', App\Http\Controllers\FE\ProductController::class)->names('product');
Route::get('/product/{product_slug}', [ProductController::class, 'productDetail'])->name('product.detail');

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    // Route::get('/checkout', 'checkout')->name('checkout');
});


Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('add-cart', 'addCart')->name('addCart');
    Route::get('add-cart', 'showCart')->name('showCart');
    Route::DELETE('delete-cart/{cart_id}', 'destroy')->name('deleteCart');
});

Route::controller(CheckOutController::class)->group(function(){
    Route::get('/checkout', 'viewOrder')->name('checkout');
    Route::get('/district/{province_code}', 'getDistricts')->name('districts');
    Route::post('get-coupon', 'postCoupon')->name('postCoupon');
});


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');


Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::get('/register_socialite', [HomeController::class, 'register_socialite'])->name('register_socialite');

//============ login by Facebook===========
// Route::get('/login/facebook', function(){
//     return Socialite::driver('facebook')->redirect();
// })->name('facebook');

// Route::get('/login/facebook/callback', function(){
//     $user = Socialite::driver('facebook')->user();
//     $user-> getEmail();
//     $user-> getName();

//     return view('fe.home');

//     // echo $user-> getEmail().'<br/>';
//     // echo $user-> getId().'<br/>';
//     // echo $user-> getName().'<br/>';

// });

// //==================login by google =====================
// Route::get('/login/google', function(){
//     return Socialite::driver('google')->redirect();
// })->name('google');
// Route::get('/login/google/callback', function(){
//     $user = Socialite::driver('google')->user();
    
//     return view('fe.home');
// });