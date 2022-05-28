<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\FrontendCartController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
// Route::get('/{page?}', [ProductController::class, 'goTo']);

//Chay Admin
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontendController::class,'index']);
Route::get('/category',[FrontendController::class,'category']);
Route::get('/category-view/{id}',[FrontendController::class,'categoryview']);
Route::get('/category-view/{type_name}/{id}',[FrontendController::class,'productview']);

Route::post('/add-to-cart',[FrontendCartController::class,'addProduct']);
Route::post('/delete-cart-item',[FrontendCartController::class,'deleteProduct']);
Route::middleware(['auth'])->group(function () {
Route::get('cart',[FrontendCartController::class,'viewcart']);
});
Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::middleware(['auth','isAdmin'])->group(function() {
    Route::get('/dashboard','Admin\FrontEndController@index');

    Route::get('/producttype','Admin\ProductTypeController@index');
    Route::get('/add_product_type','Admin\ProductTypeController@add');
    Route::post('/insert_product_type','Admin\ProductTypeController@insert');
    Route::get('edit_product_type/{id}',[ProductTypeController::class,'edit']);
    Route::put('update_product_type/{id}',[ProductTypeController::class,'update']);
    Route::get('delete_product_type/{id}',[ProductTypeController::class,'delete']);
    Route::get('products',[ProductsController::class,'index']);
    Route::get('add_products',[ProductsController::class,'add']);
    Route::post('insert_products',[ProductsController::class,'insert']);
    Route::get('edit_products/{id}',[ProductsController::class,'edit']);
    Route::put('update_products/{id}',[ProductsController::class,'update']);
    Route::get('delete_products/{id}',[ProductsController::class,'delete']);
 });

Route::get("/", [ProductController::class, 'index']);
Route::get("/product", [ProductController::class, 'product']);
Route::get("/about", [ProductController::class, 'about']);
Route::get("/testimonial", [ProductController::class, 'testimonial']);
Route::get("/productByType", [ProductController::class, 'productByType']);
Route::get("/detail/{id}", [ProductDetailController::class, 'detail']);
Route::get("/cart", [ProductController::class, 'cart']);
Route::post("addcart", [CartController::class, 'index']);
Route::get("/deletecart/{product_id}", [CartController::class, 'delete']);
Route::get("/minus/{product_id}", [CartController::class, 'minus']);
Route::get("/plus/{product_id}", [CartController::class, 'plus']);
Route::post("/checkout", [CartController::class, 'checkout']);
Route::get("/myorders", [OrderController::class, 'index']);
Route::get("/cancelorder/{order_id}", [OrderController::class, 'cancel']);
