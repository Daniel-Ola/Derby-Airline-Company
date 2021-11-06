<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    DashboardController,
};


Route::middleware('auth')->group(function() {
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
    Route::get('dashboard-overview-2-page', [DashboardController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', [DashboardController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    Route::get('inbox-page', [DashboardController::class, 'inbox'])->name('inbox');
    Route::get('file-manager-page', [DashboardController::class, 'fileManager'])->name('file-manager');
    Route::get('point-of-sale-page', [DashboardController::class, 'pointOfSale'])->name('point-of-sale');
    Route::get('chat-page', [DashboardController::class, 'chat'])->name('chat');
    Route::get('post-page', [DashboardController::class, 'post'])->name('post');
    Route::get('calendar-page', [DashboardController::class, 'calendar'])->name('calendar');
    Route::get('crud-data-list-page', [DashboardController::class, 'crudDataList'])->name('crud-data-list');
    Route::get('crud-form-page', [DashboardController::class, 'crudForm'])->name('crud-form');
    Route::get('users-layout-1-page', [DashboardController::class, 'usersLayout1'])->name('users-layout-1');
    Route::get('users-layout-2-page', [DashboardController::class, 'usersLayout2'])->name('users-layout-2');
    Route::get('users-layout-3-page', [DashboardController::class, 'usersLayout3'])->name('users-layout-3');
    Route::get('profile-overview-1-page', [DashboardController::class, 'profileOverview1'])->name('profile-overview-1');
    Route::get('profile-overview-2-page', [DashboardController::class, 'profileOverview2'])->name('profile-overview-2');
    Route::get('profile-overview-3-page', [DashboardController::class, 'profileOverview3'])->name('profile-overview-3');
    Route::get('wizard-layout-1-page', [DashboardController::class, 'wizardLayout1'])->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', [DashboardController::class, 'wizardLayout2'])->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', [DashboardController::class, 'wizardLayout3'])->name('wizard-layout-3');
    Route::get('blog-layout-1-page', [DashboardController::class, 'blogLayout1'])->name('blog-layout-1');
    Route::get('blog-layout-2-page', [DashboardController::class, 'blogLayout2'])->name('blog-layout-2');
    Route::get('blog-layout-3-page', [DashboardController::class, 'blogLayout3'])->name('blog-layout-3');
    Route::get('pricing-layout-1-page', [DashboardController::class, 'pricingLayout1'])->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', [DashboardController::class, 'pricingLayout2'])->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', [DashboardController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', [DashboardController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    Route::get('faq-layout-1-page', [DashboardController::class, 'faqLayout1'])->name('faq-layout-1');
    Route::get('faq-layout-2-page', [DashboardController::class, 'faqLayout2'])->name('faq-layout-2');
    Route::get('faq-layout-3-page', [DashboardController::class, 'faqLayout3'])->name('faq-layout-3');
//    Route::get('login-page', [DashboardController::class, 'login'])->name('login');
//    Route::get('register-page', [DashboardController::class, 'register'])->name('register');
    Route::get('error-page-page', [DashboardController::class, 'errorPage'])->name('error-page');
    Route::get('update-profile-page', [DashboardController::class, 'updateProfile'])->name('update-profile');
    Route::get('change-password-page', [DashboardController::class, 'changePassword'])->name('change-password');
    Route::get('regular-table-page', [DashboardController::class, 'regularTable'])->name('regular-table');
    Route::get('tabulator-page', [DashboardController::class, 'tabulator'])->name('tabulator');
    Route::get('modal-page', [DashboardController::class, 'modal'])->name('modal');
    Route::get('slide-over-page', [DashboardController::class, 'slideOver'])->name('slide-over');
    Route::get('notification-page', [DashboardController::class, 'notification'])->name('notification');
    Route::get('accordion-page', [DashboardController::class, 'accordion'])->name('accordion');
    Route::get('button-page', [DashboardController::class, 'button'])->name('button');
    Route::get('alert-page', [DashboardController::class, 'alert'])->name('alert');
    Route::get('progress-bar-page', [DashboardController::class, 'progressBar'])->name('progress-bar');
    Route::get('tooltip-page', [DashboardController::class, 'tooltip'])->name('tooltip');
    Route::get('dropdown-page', [DashboardController::class, 'dropdown'])->name('dropdown');
    Route::get('typography-page', [DashboardController::class, 'typography'])->name('typography');
    Route::get('icon-page', [DashboardController::class, 'icon'])->name('icon');
    Route::get('loading-icon-page', [DashboardController::class, 'loadingIcon'])->name('loading-icon');
    Route::get('regular-form-page', [DashboardController::class, 'regularForm'])->name('regular-form');
    Route::get('datepicker-page', [DashboardController::class, 'datepicker'])->name('datepicker');
    Route::get('tom-select-page', [DashboardController::class, 'tomSelect'])->name('tom-select');
    Route::get('file-upload-page', [DashboardController::class, 'fileUpload'])->name('file-upload');
    Route::get('wysiwyg-editor-page', [DashboardController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
    Route::get('validation-page', [DashboardController::class, 'validation'])->name('validation');
    Route::get('chart-page', [DashboardController::class, 'chart'])->name('chart');
    Route::get('slider-page', [DashboardController::class, 'slider'])->name('slider');
    Route::get('image-zoom-page', [DashboardController::class, 'imageZoom'])->name('image-zoom');
});
