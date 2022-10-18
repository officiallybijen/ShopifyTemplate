<?php

use App\Http\Controllers\SettingController;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $shop=Auth::user();
    $settings=Setting::where('shop_id',$shop->name)->first();
    return view('dashboard',compact('settings'));
})->middleware(['verify.shopify'])->name('home');    


Route::group(['middleware' => 'verify.shopify'], function() {
    Route::view('/products', 'products');
    Route::view('/dashboard', 'dashboard');
    Route::view('/customers', 'customers');
    Route::get('/settings', [SettingController::class,'configureTheme']);
});
