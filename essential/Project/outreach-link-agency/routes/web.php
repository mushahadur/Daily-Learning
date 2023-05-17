<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponContrroller;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\ExploreSiteController;
use App\Http\Controllers\Admin\WordContentController;
use App\Http\Controllers\Admin\PackageOrderController;
use App\Http\Controllers\Admin\ExploreHeaderController;
use App\Http\Controllers\Admin\SubscribePlanController;
use App\Http\Controllers\Admin\ExploreCountryController;
use App\Http\Controllers\Admin\ExploreServiceController;
use App\Http\Controllers\Admin\ExploreCategoryController;
use App\Http\Controllers\Admin\ExploreLanguageController;
use App\Http\Controllers\Admin\PublicationTypeController;
use App\Http\Controllers\Admin\BusinessSettingsController;
use App\Http\Controllers\Admin\ExploreHyperlinkController;
use App\Http\Controllers\Admin\ExploreSubHeaderController;
use App\Http\Controllers\Admin\WordContentOrderController;
use App\Http\Controllers\Admin\ReplyContactController;
use App\Http\Controllers\Admin\ExploreServiceOrderController;
use App\Http\Controllers\Admin\ExploreServiceBuyContentWordLengthController;

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

Route::redirect('/', '/dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware('checkAdmin')->prefix('admin')->group(function () {
        // Dashboard
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Profile Route
        Route::resource('profile', ProfileController::class, ['except' => ['create', 'show']]);

        // User Role Routes
        Route::resource('/role', RoleController::class);
        Route::resource('/user-create', UserCreateController::class);

        //Business Settings Routes
        Route::controller(BusinessSettingsController::class)->prefix('/settings')->group(function () {
            Route::get('/', 'view')->name('settings.view');
            Route::put('/update', 'update')->name('settings.update');
        });
        // Explore Header Routes
        Route::resource('explore_header', ExploreHeaderController::class);
        Route::get('explore_header/{id}/edit/', [ExploreHeaderController::class, 'edit']);
        Route::put('explore_header/{id}/update/', [ExploreHeaderController::class, 'update']);
        Route::get('/explore_header/active/{id}', [ExploreHeaderController::class, 'active'])->name('explore_header.active');
        Route::get('/explore_header/deactive/{id}', [ExploreHeaderController::class, 'deactive'])->name('explore_header.deactive');

        // Explore Sub Header Routes
        Route::resource('explore_sub_header', ExploreSubHeaderController::class);
        Route::get('explore_sub_header/{id}/edit/', [ExploreSubHeaderController::class, 'edit']);
        Route::put('explore_sub_header/{id}/update/', [ExploreSubHeaderController::class, 'update']);
        Route::get('/explore_sub_header/active/{id}', [ExploreSubHeaderController::class, 'active'])->name('explore_sub_header.active');
        Route::get('/explore_sub_header/deactive/{id}', [ExploreSubHeaderController::class, 'deactive'])->name('explore_sub_header.deactive');

        // Explore Category Routes
        Route::resource('explore_category', ExploreCategoryController::class);
        Route::get('explore_category/{id}/edit/', [ExploreCategoryController::class, 'edit']);
        Route::put('explore_category/{id}/update/', [ExploreCategoryController::class, 'update']);

        // Explore Publication Type Routes
        Route::resource('explore_publication_type', PublicationTypeController::class);
        Route::get('explore_publication_type/{id}/edit/', [PublicationTypeController::class, 'edit']);
        Route::put('explore_publication_type/{id}/update/', [PublicationTypeController::class, 'update']);

        // Explore HyperLink Type Routes
        Route::resource('explore_hyperlink_type', ExploreHyperlinkController::class);
        Route::get('explore_hyperlink_type/{id}/edit/', [ExploreHyperlinkController::class, 'edit']);
        Route::put('explore_hyperlink_type/{id}/update/', [ExploreHyperlinkController::class, 'update']);

        // Explore Country Routes
        Route::get('/explore_country', ExploreCountryController::class)->name('explore_country');

        // Explore Language Routes
        Route::get('/explore_language', ExploreLanguageController::class)->name('explore_language');

        // Packages Route
        Route::resource('/package', PackageController::class);
        Route::get('/package/active/{id}', [PackageController::class, 'active'])->name('package.active');
        Route::get('/package/deactive/{id}', [PackageController::class, 'deactive'])->name('package.deactive');

        // Package Order Routes
        Route::get('/package-order', [PackageOrderController::class, 'index'])->name('packageorder.index');
        Route::get('/package-order/show/{id}', [PackageOrderController::class, 'packageOrderShow'])->name('packageorder.show');
        Route::get('/package-order/edit/{id}', [PackageOrderController::class, 'packageOrderEdit'])->name('packageorder.edit');
        Route::put('/package-order/update/{id}', [PackageOrderController::class, 'packageOrderUpdate'])->name('packageorder.update');

        // Subscription Plan Route
        Route::resource('/subscription-plan', SubscribePlanController::class);
        Route::get('/subscription-plan/active/{id}', [SubscribePlanController::class, 'active'])->name('subscription-plan.active');
        Route::get('/subscription-plan/deactive/{id}', [SubscribePlanController::class, 'deactive'])->name('subscription-plan.deactive');
        Route::get('/subscription-list', [SubscribePlanController::class, 'subscription_list'])->name('subscription.list');

        // Explore Content Type Routes
        Route::get('/service_type', [ExploreServiceController::class, 'index'])->name('service_type.index');
        Route::get('/service_type/{id}/edit', [ExploreServiceController::class, 'edit']);
        Route::put('/service_type/{id}/update', [ExploreServiceController::class, 'update']);

        // Explore Service Buy Content Word Length Routes
        Route::get('/service_buy_content_word_length', [ExploreServiceBuyContentWordLengthController::class, 'index'])->name('service_buy_content_word_length.index');
        Route::get('/service_buy_content_word_length/{id}/edit', [ExploreServiceBuyContentWordLengthController::class, 'edit']);
        Route::put('/service_buy_content_word_length/{id}/update', [ExploreServiceBuyContentWordLengthController::class, 'update']);

        // Explore Site Routes
        Route::resource('explore_site', ExploreSiteController::class);
        Route::get('/explore_site/active/{id}', [ExploreSiteController::class, 'active'])->name('explore_site.active');
        Route::get('/explore_site/deactive/{id}', [ExploreSiteController::class, 'deactive'])->name('explore_site.deactive');

        // Explore Service Order Routes
        Route::get('/explore_service_order', [ExploreServiceOrderController::class, 'index'])->name('explore_service_order');
        Route::get('/explore_service_order/{id}', [ExploreServiceOrderController::class, 'edit'])->name('explore_service_order.edit');
        Route::put('/explore_service_order/update/{id}', [ExploreServiceOrderController::class, 'update'])->name('explore_service_order.update');
        Route::get('/explore_service_order/view/{id}', [ExploreServiceOrderController::class, 'show'])->name('explore_service_order.view');
        // Coupon Routes
        Route::get('/coupon', [CouponContrroller::class, 'index'])->name('coupon.index');
        Route::get('/coupon/create', [CouponContrroller::class, 'create'])->name('coupon.create');
        Route::post('/exploresite/service', [CouponContrroller::class, 'exploreSiteJsonData'])->name('exploresite.service');
        Route::post('/coupon/store', [CouponContrroller::class, 'store'])->name('coupon.store');
        Route::get('/coupon/edit/{id}', [CouponContrroller::class, 'edit'])->name('coupon.edit');
        Route::put('/coupon/update/{id}', [CouponContrroller::class, 'update'])->name('coupon.update');
        Route::delete('/coupon/destroy/{id}', [CouponContrroller::class, 'destroy'])->name('coupon.destroy');
        // Content Routes
        Route::get('/content', [WordContentController::class, 'index'])->name('content.index');
        Route::post('/content/store', [WordContentController::class, 'store'])->name('content.store');
        Route::get('/content/show/{id}', [WordContentController::class, 'show'])->name('content.show');
        Route::put('/content/update/{id}', [WordContentController::class, 'update'])->name('content.update');
        Route::delete('/content/delete/{id}', [WordContentController::class, 'destroy'])->name('content.delete');
        // Content Order Routes
        Route::get('/content/order', [WordContentOrderController::class, 'index'])->name('contentorder.index');
        Route::get('/content/order/show/{id}', [WordContentOrderController::class, 'contentOrderShow'])->name('contentorder.show');
        Route::get('/content/order/edit/{id}', [WordContentOrderController::class, 'contentOrderEdit'])->name('contentorder.edit');
        Route::put('/content/order/update/{id}', [WordContentOrderController::class, 'contentOrderUpdate'])->name('contentorder.update');

        // Report Routes
        Route::get('/site-order/report', [ReportController::class, 'siteOrderReport'])->name('site-order.index');
        Route::post('/site/report', [ReportController::class, 'dateFilter'])->name('siteOrder.index');
        Route::get('/content-order/report', [ReportController::class, 'contentOrderReport'])->name('content-order.index');
        Route::post('/content/report', [ReportController::class, 'contentdateFilter'])->name('contentOrder.index');
        Route::get('/package-order/report', [ReportController::class, 'packageOrderReport'])->name('package-order.index');
        Route::post('/package/report', [ReportController::class, 'packagedateFilter'])->name('packageOrder.index');

        // Contact US
        Route::get('/contact', [ContactController::class, 'index'])->name('admin_contact.index');
        Route::get('/contact/{id}', [ContactController::class, 'show'])->name('admin_contact.show');
        Route::post('/reply/{id}', [ReplyContactController::class, 'reply'])->name('admin_reply_contact');

        // Invoice
        Route::get('/invoice', [InvoiceController::class, 'index'])->name('admin_invoice.index');
        Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('admin_invoice.show');
    });

    require __DIR__ . '/customer.php';

    Route::get('/generate-pdf/{id}', PDFController::class)->name('generate-pdf');
});

// Login with Google
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

require __DIR__ . '/auth.php';
