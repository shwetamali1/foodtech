<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\SocialiteController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\WebMenuController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\DocumentsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserrequestController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\FinalDocumentController;
use App\Mail\TestMail;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])->name('socialite.auth');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])->name('socialite.callback');

Route::get('/send-test-mail', [Controller::class, 'sendEmail'])->name('sendEmail');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::get('home2', [HomeController::class, 'home2'])->name('home2');
Route::get('subscriptions', [HomeController::class, 'subscriptions'])->name('subscriptions');
Route::get('reports', [HomeController::class, 'reports'])->name('reports');
Route::get('/business-plans/{slug}', [HomeController::class, 'reportsDetails'])
    ->name('reportsDetails');
Route::get('contact-us', [HomeController::class, 'contactus'])->name('contactus');
Route::post('contact-us', [HomeController::class, 'contactus'])->name('contactus');
Route::get('terms-and-conditions', [HomeController::class, 'termsAndConditions'])->name('termsAndConditions');
Route::get('refund-policy', [HomeController::class, 'refundPolicy'])->name('refundPolicy');
Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('register-user', [HomeController::class, 'registerUser'])->name('registerUser');
Route::post('register-user', [HomeController::class, 'registerUser'])->name('registerUser');
Route::post('emailSubscribe', [HomeController::class, 'emailSubscribe'])->name('emailSubscribe');

Route::get('login/{teb}', [LoginController::class, 'login'])->name('login');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::get('forgot-password', [LoginController::class, 'forgot'])->name('forgot');
Route::post('login/forgot-password', [LoginController::class, 'forgot'])->name('forgot');
Route::get('reset-password/{token}', [LoginController::class, 'reset'])->name('reset');
Route::post('reset-password/{token}', [LoginController::class, 'reset'])->name('reset');
Route::post('login_submit', [LoginController::class, 'submit'])->name('login_post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
Route::get('user-dashboard', [DashboardController::class, 'userDashboard'])->name('userDashboard');


Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('list', [UsersController::class, 'index'])->name('index');
    Route::get('add', [UsersController::class, 'add'])->name('add');
    Route::post('add_submit', [UsersController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [UsersController::class, 'updateRecord'])->name('updateRecord');
    Route::post('edit/{id}', [UsersController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [UsersController::class, 'deleteRecord'])->name('deleteRecord');
    Route::get('document', [UsersController::class, 'getDocument'])->name('getDocument');
    Route::get('docedit/{id}', [UsersController::class, 'docUpdateRecord'])->name('docUpdateRecord');
    Route::post('docedit/{id}', [UsersController::class, 'docUpdateRecord'])->name('docUpdateRecord');
    Route::get('docdelete/{id}', [UsersController::class, 'docDeleteRecord'])->name('docDeleteRecord');
    Route::get('downloaddoc/{file}', [UsersController::class, 'docdownload'])->name('docdownload');
    Route::get('view/{id}', [UsersController::class, 'view'])->name('view');
    Route::post(
        '/feature-documents/upload',
        [UsersController::class, 'uploadFinalDoc']
    )->name('feature-documents.upload');
    
Route::get('documents/download-file/{filename}', [UsersController::class, 'downloadFile'])
->name('documents.download-file');
});


// Route::post('/users/{id}/impersonate', [UsersController::class, 'impersonate'])
//     ->name('users.impersonate')
//     ->middleware(['auth', 'can:impersonate']);

// Route::post('/users/impersonate/stop', [UsersController::class, 'stopImpersonate'])
//     ->name('user.impersonate.stop')
//     ->middleware('auth');

Route::get('web-menu', [WebMenuController::class, 'index'])->name('index');
Route::get('web-menu/add', [WebMenuController::class, 'createRecord'])->name('createRecord');
Route::post('web-menu/add', [WebMenuController::class, 'createRecord'])->name('createRecord');
Route::get('web-menu/edit/{id}', [WebMenuController::class, 'updateRecord'])->name('updateRecord');
Route::post('web-menu/edit/{id}', [WebMenuController::class, 'updateRecord'])->name('updateRecord');
Route::get('web-menu/delete/{id}', [WebMenuController::class, 'deleteRecord'])->name('deleteRecord');

Route::prefix('roles')->middleware(['auth'])->group(function () {
    Route::get('/', [RolesController::class, 'index'])->name('roles');
    Route::get('/add', [RolesController::class, 'add'])->name('roles.add');
    Route::get('/edit/{id}', [RolesController::class, 'update'])->name('roles.edit');
    Route::get('/delete/{id}/{status}', [RolesController::class, 'delete'])->name('roles.delete');
    Route::post('/add', [RolesController::class, 'add'])->name('roles.addPost');
    Route::post('/edit/{id}', [RolesController::class, 'update'])->name('roles.editPost');
});

Route::prefix('subscriptions')->middleware('auth')->group(function () {
    Route::get('list', [SubscriptionController::class, 'index'])->name('index');
    Route::get('add', [SubscriptionController::class, 'add'])->name('add');
    Route::post('add_submit', [SubscriptionController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [SubscriptionController::class, 'updateRecord'])->name('updateRecord');
    Route::get('subscribe/{id}', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    Route::get('billing-details/{id}', [SubscriptionController::class, 'billing'])->name('billing');
    Route::post('billing-details/{id}', [SubscriptionController::class, 'billing'])->name('billing');
    Route::post('edit/{id}', [SubscriptionController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [SubscriptionController::class, 'deleteRecord'])->name('deleteRecord');
    //Route::get('thank-you/{id}/{lastid}', [SubscriptionController::class, 'payout'])->name('payout');
    Route::get('/pay/{id}/{billing_id}', [SubscriptionController::class, 'pay'])->name('pay');
    Route::post('/createorder', [SubscriptionController::class, 'store'])->name('store');
    Route::post('/payment-success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
    Route::post('/payment-success', [SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/thank-you/{pid}', [SubscriptionController::class, 'thankyou'])->name('thankyou');
    Route::post('/paymentfailed', [SubscriptionController::class, 'failed'])->name('failed');
    Route::get('/invoice/{pid}/{bid}', [SubscriptionController::class, 'invoice'])->name('invoice');
});

Route::prefix('userrequest')->middleware('auth')->group(function () {
    Route::get('list', [UserrequestController::class, 'index'])->name('index');
    Route::get('request', [UserrequestController::class, 'request'])->name('request');
    Route::post('add_submit', [UserrequestController::class, 'add_submit'])->name('add_submit');
    Route::get('delete/{id}', [UserrequestController::class, 'deleteRecord'])->name('deleteRecord');
});

Route::prefix('reports')->middleware('auth')->group(function () {
    Route::get('list', [ReportsController::class, 'index'])->name('index');
    Route::get('add', [ReportsController::class, 'add'])->name('add');
    Route::post('add_submit', [ReportsController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [ReportsController::class, 'updateRecord'])->name('updateRecord');
    Route::post('edit/{id}', [ReportsController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [ReportsController::class, 'deleteRecord'])->name('deleteRecord');
    Route::get('download/{file}', [ReportsController::class, 'getDownload'])->name('getDownload');
    Route::post('download/{file}', [ReportsController::class, 'getDownload'])->name('getDownload');
    Route::get('view-report/{id}', [ReportsController::class, 'viewReports'])->name('viewReports');
    Route::get('payout/{id}', [ReportsController::class, 'payout'])->name('payout');
    
    Route::get('billing-details/{id}', [ReportsController::class, 'billing'])->name('billing');
    Route::post('billing-details/{id}', [ReportsController::class, 'billing'])->name('billing');
    
    Route::get('/pay/{id}/{lastid}', [ReportsController::class, 'pay'])->name('pay');
    Route::post('/createorder', [ReportsController::class, 'store'])->name('store');
    Route::post('/payment-success', [ReportsController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/thank-you/{pid}', [ReportsController::class, 'thankyou'])->name('thankyou');
    Route::post('/paymentfailed', [ReportsController::class, 'failed'])->name('failed');
});
Route::prefix('services')->middleware('auth')->group(function () {
    Route::get('list', [ServicesController::class, 'index'])->name('index');
    Route::get('add', [ServicesController::class, 'add'])->name('add');
    Route::post('add_submit', [ServicesController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [ServicesController::class, 'updateRecord'])->name('updateRecord');
    Route::post('edit/{id}', [ServicesController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [ServicesController::class, 'deleteRecord'])->name('deleteRecord');
});

Route::prefix('documents')->middleware('auth')->group(function () {
    Route::get('list', [DocumentsController::class, 'index'])->name('index');
    Route::get('add', [DocumentsController::class, 'add'])->name('add');
    Route::post('add_submit', [DocumentsController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [DocumentsController::class, 'updateRecord'])->name('updateRecord');
    Route::post('edit/{id}', [DocumentsController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [DocumentsController::class, 'deleteRecord'])->name('deleteRecord');
});



Route::prefix('finaldocument')->middleware('auth')->group(function () {
    Route::get('list', [FinalDocumentController::class, 'index'])
        ->name('finaldocument.index');

    Route::get('download/{id}', [FinalDocumentController::class, 'download'])
        ->name('finaldocument.download');
});


Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('profiles', [SettingsController::class, 'profile'])->name('profile');
	Route::post('updateRecord', [SettingsController::class, 'updateRecord'])->name('updateRecord');
	Route::post('getNotification', [SettingsController::class, 'getNotification'])->name('getNotification');
    Route::get('licenses', [SettingsController::class, 'featureDocuments'])->name('featureDocuments');
    Route::get('reports', [SettingsController::class, 'reports'])->name('reports');
    Route::get('subscriptions', [SettingsController::class, 'subscriptions'])->name('subscriptions');
    Route::get('notifications', [SettingsController::class, 'notifications'])->name('notifications');
    Route::post('notifications', [SettingsController::class, 'notifications'])->name('notifications');
    Route::get('/feature-documents', [SettingsController::class, 'featureDocuments'])
    ->name('feature.documents');

Route::get('/feature-documents/download/{id}', [SettingsController::class, 'downloadFeatureDocument'])
    ->name('feature.documents.download');

    
});


Route::get('/services/{slug}', [HomeController::class, 'serviceDetails'])
    ->name('serviceDetails');
Route::prefix('category')->middleware('auth')->group(function () {
    Route::get('list', [CategoryController::class, 'index'])->name('index');
    Route::get('add', [CategoryController::class, 'add'])->name('add');
    Route::post('add_submit', [CategoryController::class, 'add_submit'])->name('add_submit');
    Route::get('edit/{id}', [CategoryController::class, 'updateRecord'])->name('updateRecord');
    Route::post('edit/{id}', [CategoryController::class, 'updateRecord'])->name('updateRecord');
    Route::get('delete/{id}', [CategoryController::class, 'deleteRecord'])->name('deleteRecord');
    
    Route::get('report-category', [CategoryController::class, 'reportCategory'])->name('reportCategory');
    Route::get('add-report-category', [CategoryController::class, 'add_category'])->name('add_category');
    Route::post('add_submit_report', [CategoryController::class, 'add_submit_report'])->name('add_submit_report');
    Route::get('edit-report-category/{id}', [CategoryController::class, 'updateReportRecord'])->name('updateReportRecord');
    Route::post('edit-report-category/{id}', [CategoryController::class, 'updateReportRecord'])->name('updateReportRecord');
    Route::get('delete-report-category/{id}', [CategoryController::class, 'deleteReportRecord'])->name('deleteReportRecord');
    
    Route::get('doc-category', [CategoryController::class, 'docCategory'])->name('docCategory');
    Route::get('add-doc-category', [CategoryController::class, 'add_doc_category'])->name('add_doc_category');
    Route::post('add_submit_doc', [CategoryController::class, 'add_submit_doc'])->name('add_submit_doc');
    Route::get('edit-doc-category/{id}', [CategoryController::class, 'updateDocRecord'])->name('updateDocRecord');
    Route::post('edit-doc-category/{id}', [CategoryController::class, 'updateDocRecord'])->name('updateDocRecord');
    Route::get('delete-doc-category/{id}', [CategoryController::class, 'deleteDocRecord'])->name('deleteDocRecord');
});
Route::prefix('social')->middleware('auth')->group(function () {
    Route::get('subscribe', [SocialController::class, 'subscribe'])->name('subscribe');
	Route::get('contact-us', [SocialController::class, 'contact'])->name('contact');
});

Route::post('upload', [Controller::class, 'fileStore'])->name('fileStore');
Route::post('remove', [Controller::class, 'fileRemove'])->name('fileRemove');

Route::get('authentication-failed', function () {
    $errors = [];
    array_push($errors, ['code' => 'auth-001', 'message' => 'Unauthenticated.']);
    return response()->json([
        'errors' => $errors,
    ], 401);
})->name('authentication-failed');