<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ReserveController;
use App\Http\Controllers\Admin\RuleController;

use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\BookingController;


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

Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::group(['middleware' => ['login_auth']], function () { // ล็อคอินถึงจะเข้าได้
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/room/{id}', [RoomController::class, 'getRoom'])->name('getRoom');
    Route::get('/room/{id}/booking', [BookingController::class, 'index'])->name('bookingRoom');

    Route::get('/rule', [RuleController::class, 'index'])->name('rule');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/booking/{id}', [BookingController::class, 'index'])->name('booking');
    Route::get('/booking', [BookingController::class,  'indexAll'])->name('bookingAll');
    Route::get('/addbooking/{id}', [BookingController::class, 'addBooking'])->name('addBooking');
    Route::get('/editbooking', [BookingController::class, 'editBooking'])->name('editBooking');
    Route::post('/updatebooking/{id}', [BookingController::class, 'updateBooking'])->name('updateBooking');
    Route::post('/deletebooking/{id}', [BookingController::class, 'deleteBooking'])->name('deleteBooking');

    Route::group(['middleware' => ['admin_auth']], function () { // สถานะ 9 หรือแอดมินถึงจะเข้าได้

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/room', [RoomController::class, 'index'])->name('Room');
        Route::post('/addroom', [RoomController::class, 'addRoom'])->name('addRoom');
        Route::get('/editroom', [RoomController::class, 'editRoom'])->name('editRoom');
        Route::post('/updateroom/{id}', [RoomController::class, 'updateRoom'])->name('updateRoom');
        Route::post('/deleteroom/{id}', [RoomController::class, 'deleteRoom'])->name('deleteRoom');

        Route::get('/reserve', [ReserveController::class, 'index'])->name('reserve');
        Route::post('/addreserve', [ReserveController::class, 'addReserve'])->name('addReserve');
        Route::get('/editreserve', [ReserveController::class, 'editReserve'])->name('editReserve');
        Route::post('/updatereserve/{id}', [ReserveController::class, 'updateReserve'])->name('updateReserve');
        Route::post('/deletereserve/{id}', [ReserveController::class, 'deleteReserve'])->name('deleteReserve');

        Route::post('/addrule', [RuleController::class, 'addRule'])->name('addRule');
        Route::post('/updaterule', [RuleController::class, 'updateRule'])->name('updateRule');
    });
});
