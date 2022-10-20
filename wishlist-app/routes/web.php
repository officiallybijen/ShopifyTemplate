<?php

use App\Http\Controllers\SettingController;
use App\Http\Controllers\WishlistController;
use App\Models\Setting;
use App\Models\Wishlist;
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
    $shop = Auth::user();
    $settings = Setting::where('shop_id', $shop->name)->first();
    return view('dashboard', compact('settings'));
})->middleware(['verify.shopify'])->name('home');


Route::group(['middleware' => 'verify.shopify'], function () {
    Route::get('/products', function(){
        $shop = Auth::user();

        $shopWishlist = Wishlist::where('shop_id', $shop->name)->orderBy('updated_at', 'desc')->get();

        $lists = [];

        foreach ($shopWishlist as $item) {
            array_push($lists, "gid://shopify/Product/{$item->product_id}");
        }

        $mylist = json_encode($lists);

        $query = "
        {
            nodes(ids:$mylist){
                ... on Product{
                    id
                    title
                    handle
                    featuredImage{
                      originalSrc
                    }
                    totalInventory
                    vendor
                    onlineStorePreviewUrl
                    priceRange{
                      maxVariantPrice{
                        currencyCode
                        amount
                      }
                    }
                  }
            }
          }
        ";

        $products = $shop->api()->graph($query);
        return view('products',compact('products'));
    });
    Route::view('/dashboard', 'dashboard');
    Route::view('/customers', 'customers');
    Route::get('/settings', [SettingController::class, 'configureTheme']);


    Route::get('/wishlists', [WishlistController::class,'index']);
});
