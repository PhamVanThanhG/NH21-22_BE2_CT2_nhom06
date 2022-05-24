<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\ProductDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;

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
Route::get('/login', function () {
    return view('auth.login');
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
 });

Route::get("/", [ProductController::class, 'index']);
Route::get("/product", [ProductController::class, 'product']);
Route::get("/productByType", [ProductController::class, 'productByType']);
Route::get("/detail/{id}", [ProductDetailController::class, 'detail']);
Route::get("/cart", [ProductController::class, 'cart']);
