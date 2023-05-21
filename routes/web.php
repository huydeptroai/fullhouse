<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Ad_CategoryController;
use App\Http\Controllers\Admin\Ad_ProductController;
use App\Http\Controllers\Admin\Ad_OrderController;
use App\Http\Controllers\Admin\Ad_UserController;
use App\Http\Controllers\Admin\Ad_NewsletterController;
use App\Http\Controllers\FE\CartController;
use App\Http\Controllers\FE\CheckOutController;
use App\Http\Controllers\FE\ProductController;
use App\Http\Controllers\FE\ProfileController;
use App\Http\Controllers\FE\HomeController;
use App\Http\Controllers\FE\CategoryController;
use App\Http\Controllers\FE\ReviewController;
use App\Http\Controllers\FE\WishListController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


require __DIR__ . '/auth.php';
require __DIR__ . '/api.php';

Route::get('/', function () {
    return redirect()->route('home');
})->middleware(['countVisitor']); //count by [IP,user_id]


// ============= User ===============
Route::middleware('auth')->group(function () {

    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review-delete/{id}', [ReviewController::class, 'destroy'])->name('review.delete');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/select-delivery', [ProfileController::class, 'select_delivery']);

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'cart')->name('cart');
        Route::post('add-cart', 'addCart')->name('addCart');
        Route::get('add-cart', 'showCart')->name('showCart');
        Route::DELETE('delete-cart/{cart_id}', 'destroy')->name('deleteCart');
    });

    Route::controller(WishListController::class)->group(function () {
        Route::get('show-wishlist', 'showWishlist')->name('showWishList');
        Route::post('add-wishlist', 'addWishlist')->name('addWishList');
        Route::DELETE('delete-wishlist/{wish_list_id}', 'destroy')->name('deleteWishList');
    });

    Route::controller(CheckOutController::class)->group(function () {
        Route::get('/checkout', 'viewOrder')->name('checkout');
        Route::get('/district/{province_code}', 'getDistricts')->name('districts');
        Route::post('coupon', 'postCoupon')->name('postCoupon');
        Route::post('order', 'createOrder')->name('createOrder');
        Route::post('shipping-fee', 'postShippingFee')->name('postShippingFee');
        Route::get('/cancel-order/{order_id}', 'cancelOrder')->name('cancelOrder');
        Route::get('/confirm-order', 'confirmOrder')->name('confirmOrder');
        Route::get('/update-order/{order_id}', 'updateStatusOrder')->name('updateStatusOrder');
        Route::get('/info-order', 'showInformationOrder')->name('showInformationOrder');
    });

    // ============= Admin ===============
    Route::group(['middleware' => 'checkAdmin', 'prefix' => 'admin'], function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/product-sale', [DashboardController::class, 'productSales'])->name('admin.productSales');

        Route::resource('/category', App\Http\Controllers\Admin\Ad_CategoryController::class)->names('admin.category');
        Route::resource('/product', App\Http\Controllers\Admin\Ad_ProductController::class)->names('admin.product');
        Route::resource('/coupon', App\Http\Controllers\Admin\Ad_CouponController::class)->names('admin.coupon');
        Route::resource('/user', App\Http\Controllers\Admin\Ad_UserController::class)->names('admin.user');
        Route::resource('/order', App\Http\Controllers\Admin\Ad_OrderController::class)->except('show', 'destroy', 'create', 'store')->names('admin.order');

        Route::resource('/newsletter', Ad_NewsletterController::class)->names('admin.newsletter');

        Route::get('/order/invoice/{order_id}', [Ad_OrderController::class, 'showDetail'])->name('admin.order.invoice');
        Route::get('/order/invoice-print/{order_id}', [Ad_OrderController::class, 'printInvoice'])->name('admin.order.printInvoice');
    });
});

// ============= front-end ===============
Route::resource('/product', App\Http\Controllers\FE\ProductController::class)->names('product');
Route::get('/shop/{product_slug}', [ProductController::class, 'productDetail'])->name('productDetail');

Route::get('/category-search-by-name/{category_name}', [ProductController::class, 'searchByCategoryName'])->name('searchByCategoryName');
// Route::post('/search-name',[ProductController::class, 'searchName'])->name('searchName');

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/shipping-policy', 'shippingPolicy')->name('shippingPolicy');
    Route::get('/warranty-policy', 'warrantyPolicy')->name('warrantyPolicy');

    Route::post('/new-letter', 'newLetter')->name('newLetter');

});