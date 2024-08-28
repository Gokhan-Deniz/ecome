<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaperController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::controller(HomeController::class)->group(function(){
  Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function(){
  Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
  Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
  Route::get('/new-release', 'NewRelease')->name('newrelease');
  Route::get('/customer-service', 'CustomerService')->name('customerservice');
  Route::get('/user-profile/history', 'History')->name('history');
});

Route::middleware(['auth','role:user'])->group(function(){
  Route::controller(ClientController::class)->group(function(){
    Route::get('/add-to-chart', 'AddToCart')->name('addtocart');
    Route::post('/add-product-to-chart/{id}', 'AddProductToCart')->name('addproducttocart');
    Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
    Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
    Route::post('/place-order', 'PlaceOrder')->name('placeorder');
    Route::get('/checkout', 'Checkout')->name('checkout');
    Route::get('/user-profile', 'UserProfile')->name('userprofile');
    Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
    Route::get('/user-profile/history', 'History')->name('history');
    Route::get('/paper', 'Paper')->name('paper');
    Route::post('/add-Paper', 'AddPaper')->name('addpaper');
    Route::get('/customer-service', 'CustomerService')->name('customerservice');
    Route::get('/remove-cart-item/{id}','RemoveCartItem')->name('removeitem');
  });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function(){
  Route::controller(DashboardController::class)->group(function(){
    Route::get('/admin/dashboard','Index')->name('admindashboard');
  });

  Route::controller(CategoryController::class)->group(function(){
    Route::get('/admin/all-category/','Index')->name('allcategory');
    Route::get('/admin/add-category/','AddCategory')->name('addcategory');
    Route::post('/admin/storecategory','StoreCategory')->name('storecategory');
    Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
    Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');
    Route::get('/admin/edit-category/{id}' , 'EditCategory')->name('editcategory');
  });

  Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/admin/all-subcategory/','Index')->name('allsubcategory');
    Route::get('/admin/add-subcategory/','AddSubCategory')->name('addsubcategory');
    Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
    Route::get('/admin/edit-subcategory/{id}', 'EditSubCat')->name('editsubcat');
    Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcat');
    Route::post('/admin/update-subcategory', 'UpdateSubCat')->name('updatesubcat');
  });
  Route::controller(ProductController::class)->group(function(){
    Route::get('/admin/all-products','Index')->name('allproducts');
    Route::get('/admin/add-product','AddProduct')->name('addproduct');
    Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
    Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
    Route::post('/admin/update-product', 'updateProduct')->name('updateproduct');
    Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
  });

  Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/pending-order', 'Index')->name('pendingorder');
  });

  Route::controller(PaperController::class)->group(function(){
    Route::get('/admin/basvuru', 'Index')->name('basvuru');
  });

});

require __DIR__.'/auth.php';
