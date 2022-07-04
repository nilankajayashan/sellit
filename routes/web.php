<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\FilterAdController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\user\MyAccountController;
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



//Admin route
Route::get('/admin', [\App\Http\Controllers\admin\DashboardController::class,'stateHandler'])->name('dashboard')->middleware('auth_admin');
Route::post('admin_login',[\App\Http\Controllers\admin\LoginController::class, 'login'])->name('admin_login');
Route::get('admin_login_view',[\App\Http\Controllers\admin\LoginController::class, 'login'])->name('admin_login_view');
Route::get('admin_logout',[\App\Http\Controllers\admin\LoginController::class, 'adminLoginView'])->name('admin_logout')->middleware('auth_admin');;
Route::post('ad_reject',[\App\Http\Controllers\admin\AdController::class, 'AdReject'])->name('ad_reject')->middleware('auth_admin');;
Route::post('change_ad_status',[\App\Http\Controllers\admin\AdController::class, 'ChangeAdStatus'])->name('change_ad_status')->middleware('auth_admin');;
Route::get('edit_ad', [\App\Http\Controllers\admin\AdController::class, 'editAd'])->name('edit_ad')->middleware('auth_admin');;
Route::get('/admin_edit_specific_form', [\App\Http\Controllers\admin\AdController::class, 'edit_specific_form'])->name('admin_edit_specific_form')->middleware('auth_admin');;
Route::get('/admin_post_form', [\App\Http\Controllers\admin\AdController::class, 'AdPost'])->name('admin_post_form');
Route::get('/admin_specific_form', [\App\Http\Controllers\admin\AdController::class, 'loadSpecific'])->name('admin_specific_form');
Route::post('admin_submit_post', [\App\Http\Controllers\admin\AdController::class, 'submitPost'])->name('admin_submit_post')->middleware('auth_admin');;
Route::post('admin_update_ad', [\App\Http\Controllers\admin\AdController::class, 'editAdSubmit'])->name('admin_update_ad')->middleware('auth_admin');;
Route::post('admin_delete_ad', [\App\Http\Controllers\admin\AdController::class, 'deleteAd'])->name('admin_delete_ad')->middleware('auth_admin');;
Route::post('admin_add_user', [\App\Http\Controllers\admin\UserController::class, 'addUser'])->name('admin_add_user')->middleware('auth_admin');;
Route::post('admin_update_user', [\App\Http\Controllers\admin\UserController::class, 'updateUser'])->name('admin_update_user')->middleware('auth_admin');;
Route::post('admin_delete_user', [\App\Http\Controllers\admin\UserController::class, 'deleteUser'])->name('admin_delete_user')->middleware('auth_admin');;
Route::post('admin_add_guest_user', [\App\Http\Controllers\admin\GuestUserController::class, 'addGuestUser'])->name('admin_add_guest_user')->middleware('auth_admin');;
Route::post('admin_update_guest_user', [\App\Http\Controllers\admin\GuestUserController::class, 'updateGuestUser'])->name('admin_update_guest_user')->middleware('auth_admin');;
Route::post('admin_delete_guest_user', [\App\Http\Controllers\admin\GuestUserController::class, 'deleteGuestUser'])->name('admin_delete_guest_user')->middleware('auth_admin');;
Route::post('admin_add_filter', [\App\Http\Controllers\admin\SubFilterController::class, 'addFilter'])->name('admin_add_filter')->middleware('auth_admin');;
Route::post('admin_update_filter', [\App\Http\Controllers\admin\SubFilterController::class, 'updateFilter'])->name('admin_update_filter')->middleware('auth_admin');;
Route::post('admin_delete_filter', [\App\Http\Controllers\admin\SubFilterController::class, 'deleteFilter'])->name('admin_delete_filter')->middleware('auth_admin');;
Route::post('admin_add_admin', [\App\Http\Controllers\admin\AdminUserController::class, 'add'])->name('admin_add_admin')->middleware('auth_admin');;
Route::post('admin_edit_admin', [\App\Http\Controllers\admin\AdminUserController::class, 'edit'])->name('admin_edit_admin')->middleware('auth_admin');;
Route::post('admin_delete_admin', [\App\Http\Controllers\admin\AdminUserController::class, 'delete'])->name('admin_delete_admin')->middleware('auth_admin');;
Route::post('admin_update_account', [\App\Http\Controllers\admin\AdminUserController::class, 'accountUpdate'])->name('admin_update_account')->middleware('auth_admin');;



// admin -ad controll
//Route::get('/admin_specific_form', [App\Http\Controllers\adminupdate_account_Password\AdController::class, 'load_specific'])->name('admin_specific_form');


//User route
Route::get('/login', function () {return view('login');})->name('login');
Route::post('login_validate',[\App\Http\Controllers\LoginController::class, 'login_validate'])->name('login_validate');
Route::get('logout',[\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::get('/register', function () {return view('register');})->name('register');
Route::post('register_validate',[\App\Http\Controllers\RegisterController::class, 'register_validate'])->name('register_validate');
Route::get('my_account',[MyAccountController::class, 'index'])->name('my_account')->middleware('auth_user');
Route::get('my_ad', [MyAccountController::class, 'getUserAd'])->name('my_ad')->middleware('auth_user');
Route::post('delete_ad', [AdController::class, 'deleteAd'])->name('delete_ad')->middleware('auth_user');
Route::post('edit_ad', [AdController::class, 'editAd'])->name('edit_ad')->middleware('auth_user');
Route::get('/edit_specific_form', [AdController::class, 'edit_specific_form'])->name('edit_specific_form');
Route::get('account_info', [MyAccountController::class, 'accountInfo'])->name('account_info')->middleware('auth_user');
Route::post('update_account_info', [MyAccountController::class, 'updateAccountInfo'])->name('update_account_info')->middleware('auth_user');
Route::post('update_account_password', [MyAccountController::class, 'updateAccountPassword'])->name('update_account_password')->middleware('auth_user');
Route::get('remove_account', [MyAccountController::class, 'removeAccount'])->name('remove_account')->middleware('auth_user');

//public_view route
Route::get('/',[indexController::class,'showIndex'])->name('index');
Route::get('post_ad',[\App\Http\Controllers\AdController::class, 'Ad'])->name('post_ad');
Route::get('/post_form', function () {return view('public_view/post_form');})->name('post_form');
Route::get('/specific_form', [AdController::class, 'load_specific'])->name('specific_form');
Route::post('submit_post', [AdController::class, 'submit_post'])->name('submit_post');
Route::post('update_ad', [AdController::class, 'editAdSubmit'])->name('update_ad');

Route::get('view-ad/{ad_id}', [AdController::class, 'viewAd'])->name('view-ad');
Route::post('filter-ad', [FilterAdController::class, 'Filter'])->name('filter-ad');
Route::get('search', [FilterAdController::class, 'search'])->name('search');
Route::get('search/{category}/{city}', [FilterAdController::class, 'searchByCategory'])->name('search_category');


//mail routes
Route::post('mail-to-customer' , [MailController::class , 'MailToCustomer'])->name('mail-to-customer');
