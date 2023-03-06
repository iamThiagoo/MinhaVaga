<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\City;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('home');
})->name('home');

# Get cities and states when necessary, like register and edit profile
Route::get('cities/{state_id}', function (Request $request) {
    $state_id = $request->state_id;
    $cities   = City::where('state_id', "=", $state_id)->orderBy('name')->get()->toArray();
    
    // Return cities in json format
    return response()->json($cities);
});

Route::middleware('guest')->group( function () {

    Route::get('register',  [UserController::class, 'create'])->name('register');
    Route::post('register', [UserController::class, 'store']);

    Route::get('login',  [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
});

Route::middleware('auth')->group( function () {

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile');

});