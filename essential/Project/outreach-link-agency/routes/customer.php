<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\SiteController;
use App\Http\Controllers\Customer\WalletController;
use App\Http\Controllers\Customer\ContentController;
use App\Http\Controllers\Customer\PackageController;
use App\Http\Controllers\Customer\CampaignController;
use App\Http\Controllers\Customer\UserProfileController;
use App\Http\Controllers\Customer\ContentOrderController;
use App\Http\Controllers\Customer\ServiceOrderController;
use App\Http\Controllers\Customer\SubscriptionController;
use App\Http\Controllers\Customer\StripePaymentController;
use App\Http\Controllers\Customer\Payments\OrderController;
use App\Http\Controllers\Customer\ContentCheckoutController;
use App\Http\Controllers\Customer\PackageCheckoutController;
use App\Http\Controllers\Customer\Payments\WalletPaymentController;
use App\Http\Controllers\Customer\Payments\PaymentController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\InvoiceController;

Route::middleware('checkCustomer')->group(function () {
    // Dashboard
    Route::get('/dashboard', [CustomerHomeController::class, 'index'])->name('dashboard');
    // Customer profile Route
    Route::resource('user-profile', UserProfileController::class, ['except' => ['create', 'show']]);
    // Subscription Plan Route
    Route::resource('/subscription', SubscriptionController::class);
    Route::get('/subscription/{id}/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::post('/order', [OrderController::class, 'order'])->name('payment.order');

    // Campaign Route
    Route::get('/campaign', [CampaignController::class, 'index'])->name('campaign.index');
    Route::post('/campaign/store', [CampaignController::class, 'store'])->name('campaign.store');
    Route::post('/campaign/exploresite/store', [CampaignController::class, 'storeWithExploresite'])->name('campaign_explore.store');
    Route::get('/campaign/show/{id}', [CampaignController::class, 'show'])->name('campaign.show');
    Route::delete('/campaign/destroy', [CampaignController::class, 'destroy'])->name('campaign.destroy');

    // Customer panel Site Route
    Route::get('/sites', [SiteController::class, 'index'])->name('sites.index');
    Route::get('/sites/{explore_site}', [SiteController::class, 'show'])->name('sites.show');
    Route::post('/sites/filter', [SiteController::class, 'filter'])->name('sites.filter');
    Route::post('/sites/getData', [SiteController::class, 'getData'])->name('sites.getData');

    // Service Order Route
    // Route::resource('order', ServiceOrderController::class);
    Route::get('orders', [ServiceOrderController::class, 'index'])->name('order.index');
    Route::get('orders/view/{id}', [ServiceOrderController::class, 'view'])->name('order.view');
    Route::get('orders/show/{id}', [ServiceOrderController::class, 'show'])->name('order.show');
    Route::get('orders/create', [ServiceOrderController::class, 'create'])->name('order.create');
    Route::get('orders/message/{id}', [ServiceOrderController::class, 'message'])->name('order.message');
    Route::put('orders/message/complete/{id}', [ServiceOrderController::class, 'statusUpdate'])->name('order.statusUpdate');
    Route::post('orders/message/modification/{id}', [ServiceOrderController::class, 'modificationUpdate'])->name('order.modificationUpdate');
    Route::get('orders/checkout/{id}', [ServiceOrderController::class, 'checkout'])->name('order.checkout');

    // Content Route
    Route::get('/content/buy', [ContentController::class, 'index'])->name('content-buy.index');
    Route::get('/content/order/{id}', [ContentController::class, 'create'])->name('content-order.show');
    Route::get('/content/order/redirect/{id}', [ContentController::class, 'redirect'])->name('content-order.redirect');
    Route::post('/content/store/{id}', [ContentController::class, 'store'])->name('content-order.store');
    Route::get('/content/checkout/{id}', [ContentController::class, 'checkout'])->name('content-order.checkout');
    Route::get('/content-order/view', [ContentOrderController::class, 'contentOrder'])->name('content-order.view');
    Route::get('/content-order/show/{id}', [ContentOrderController::class, 'contentOrderShow'])->name('content-order-show');
    Route::get('/content-order/message/{id}', [ContentOrderController::class, 'message'])->name('content-order.message');
    Route::put('/content-order/message/complete/{id}', [ContentOrderController::class, 'contentStatusUpdate'])->name('content-order.contentStatusUpdate');
    Route::post('/content-order/message/modification/{id}', [ContentOrderController::class, 'contentModificationUpdate'])->name('content-order.contentModificationUpdate');
    
    // Package Route
    Route::get('/package/buy', [PackageController::class, 'index'])->name('package-buy.index');
    Route::get('/package/orders', [PackageController::class, 'view'])->name('package-order.view');
    Route::get('/package/order/redirect/{id}', [PackageController::class, 'redirect'])->name('package-order.redirect');
    Route::get('/package/order/{id}', [PackageController::class, 'create'])->name('package-order.show');
    Route::get('/package/order/show/{id}', [PackageController::class, 'packageOrderShow'])->name('packageordershow');
    Route::post('/package/store/{id}', [PackageController::class, 'store'])->name('package-order.store');
    Route::get('/package/checkout/{id}', [PackageController::class, 'checkout'])->name('package-order.checkout');
    Route::get('/package/order/message/{id}', [PackageController::class, 'message'])->name('package-order.message');
    Route::put('/package/order/message/complete/{id}', [PackageController::class, 'packageStatusUpdate'])->name('package-order.packageStatusUpdate');
    Route::post('/package/order/message/modification/{id}', [PackageController::class, 'packageModificationUpdate'])->name('package-order.packageModificationUpdate');

    // Subscription payment with PAYPAL
    Route::post('/pay', [PaymentController::class, 'pay'])->name('payment');
    Route::get('/success/{id}', [PaymentController::class, 'success']);
    Route::get('/error', [PaymentController::class, 'error']);

    // Wallet payment with paypal route
    Route::post('/wallet-pay', [WalletPaymentController::class, 'pay'])->name('wallet.payment');
    Route::get('/wallet-payment-success', [WalletPaymentController::class, 'success'])->name('wallet.success');
    Route::get('/wallet-error', [WalletPaymentController::class, 'error']);

    // Stripe intigration route
    Route::get('/stripe-payment', [StripePaymentController::class, 'index']);
    Route::post('/charge', [StripePaymentController::class, 'charge'])->name('stripe.charge');
    Route::get('/confirm', [StripePaymentController::class, 'confirm'])->name('stripe.confirm');

    // Wallet Route
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::get('/wallet/create', [WalletController::class, 'create'])->name('wallet.create');

    // Contact Route
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact/reply', [ContactController::class, 'replyList'])->name('contact.reply.index');
    Route::get('/contact/reply/{id}', [ContactController::class, 'reply'])->name('contact.reply.view');
    Route::post('/contact/reply/{id}', [ContactController::class, 'replyStore'])->name('contact.reply.store');

    // Invoice
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
});
