<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminTripController;
use App\Http\Controllers\SuggestionController;

/*
|--------------------------------------------------------------------------
| الصفحة الرئيسية للموقع
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| صفحة الرحلات العامة (للمستخدمين)
|--------------------------------------------------------------------------
*/
Route::get('/home', [BookingController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| تفاصيل الرحلة (للمستخدمين)
|--------------------------------------------------------------------------
*/
Route::get('/trips/{id}', [BookingController::class, 'show'])->name('trips.show');

/*
|--------------------------------------------------------------------------
| تسجيل دخول وخروج المستخدم
|--------------------------------------------------------------------------
*/
Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');
Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| وظائف للمستخدم المسجل (الحجوزات + الاقتراحات)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/bookings/quick/{trip}', [BookingController::class, 'quickBooking'])->name('bookings.quick');
    Route::get('/my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');

    Route::get('/suggestions/create', [SuggestionController::class, 'create'])->name('suggestions.create');
    Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');
});

/*
|--------------------------------------------------------------------------
| تسجيل دخول الأدمن
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

/*
|--------------------------------------------------------------------------
| لوحة تحكم الأدمن - محمية بميدل وير auth:admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth:admin')->group(function () {

    // تسجيل خروج الأدمن
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // لوحة التحكم
    Route::get('/dashboard', [AdminTripController::class, 'dashboard'])->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | إدارة الرحلات
    |--------------------------------------------------------------------------
    */
    Route::get('/trips', [AdminTripController::class, 'index'])->name('admin.trips.index');
    Route::get('/trips/create', [AdminTripController::class, 'create'])->name('admin.trips.create');
    Route::post('/trips', [AdminTripController::class, 'store'])->name('admin.trips.store');
    Route::get('/trips/{id}/edit', [AdminTripController::class, 'edit'])->name('admin.trips.edit');
    Route::put('/trips/{trip}', [AdminTripController::class, 'update'])->name('admin.trips.update');
    Route::delete('/trips/images/{id}', [AdminTripController::class, 'deleteImage'])->name('admin.trips.deleteImage');

    /*
    |--------------------------------------------------------------------------
    | إدارة الحجوزات
    |--------------------------------------------------------------------------
    */
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings');
    Route::post('/bookings/update-status/{id}/{status}', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');

    /*
    |--------------------------------------------------------------------------
    | إدارة الاقتراحات
    |--------------------------------------------------------------------------
    */
    Route::get('/suggestions', [SuggestionController::class, 'index'])->name('admin.suggestions');
    Route::delete('/suggestions/{id}', [SuggestionController::class, 'destroy'])->name('admin.suggestions.destroy');


    Route::delete('/trips/{id}', [AdminTripController::class, 'destroy'])->name('admin.trips.destroy');
});