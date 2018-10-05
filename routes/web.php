<?php

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


Route::get('/', function (){
    return view('front/home');
});

Route::get('/shop', function (){
    return view('front/shop');
});

Route::get('/shop','HomeController@shop');


Route::get('easyshop/shop','HomeController@shop');

Route::get('/products', function (){
    return view('front/shop');
});


Route::get('/contact', function (){
    return view('front/contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@contact')->name('contact');

Route::get('/admin', 'AdminController@index');


// Route::POST('/admin', 'AdminController@store')->name('store');


 // Route::get('/', function(){
 //     return view('admin.home');
 // });


 Route::get('/cart', 'CartController@index');


 Route::post('/admin/add_product', 'AdminController@add_product')->name('addproduct');


Route::get('/product_details/{id}', 'HomeController@product_details');

Route::get('/contact', 'HomeController@contact');
Route::post('/search', 'HomeController@search');


Route::get('/cart/addItem/{id}', 'CartController@addItem');

Route::get('/cart/remove/{id}', 'CartController@destroy');


Route::get('/cart/update/{id}', 'CartController@update');

Route::put('/cart/update/{id}', 'CartController@update');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/cart/update/{id}', 'CartController@update');


Route::get('selectSize', 'HomeController@selectSize');




Route::get('/newArrival', 'HomeController@newArrival');

  



Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
     Route::get('/', function(){
         return view('admin.home');
     });

     Route::POST('/', 'AdminController@store')->name('store');



     Route::resource('product','ProductsController');
     Route::resource('category','CategoriesController');

    Route::get('/admin', 'AdminController@index');

    Route::get('ProductEditForm/{id}', 'ProductsController@ProductEditForm')->name('ProductEditForm');

    Route::post('editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');

    // Route::get('editProducts/{id}', 'ProductsController@editProducts')->name('update');

    Route::post('update/{id}', 'ProductsController@update')->name('update');

     Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');



     Route::post('editProImage', 'ProductsController@editProImage')->name('editProImage');



     Route::get('/CatEditForm/{id}', 'CategoriesController@CatEditForm')->name('CatEditForm');


     Route::post('/editCat', 'CategoriesController@editCat')->name('editCat');
    // Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

    Route::resource('admin/product', 'ProductsController',['names'=>[

        'index'=>'admin.product.index',
        // 'create'=>'admin.posts.create',
        // 'store'=>'admin.posts.store',
        // 'update'=>'admin.product.update'
         'editProducts'=>'admin.product.editProducts',


   // Route::PATCH('editProducts', 'ProductsController@editProduct')->name('editProducts');

    ]]);

    // Route::get('editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');


    Route::get('/addProperty{id}', 'ProductsController@addProperty')->name('addProperty');


    Route::post('sumbitProperty','ProductsController@sumbitProperty')->name('sumbitProperty');


    Route::post('editProperty','ProductsController@editProperty');



    Route::get('addSale','ProductsController@addSale');
    

    Route::get('addAlt/{id}', 'ProductsController@addAlt');


    Route::post('submitAlt','ProductsController@submitAlt');
     
});


Route::get('/products', function (){
    return view('front/shop');
});

Route::post('addReview', 'HomeController@addReview');



Route::group(['middleware' => 'auth'], function() {

Route::get('checkout', 'CheckoutController@index');


Route::post('/formvalidate','CheckoutController@formvalidate')->name('formvalidate');





Route::post('/address', 'ProfileController@address');

Route::get('/address', 'ProfileController@address');

    Route::post('/password', 'ProfileController@updatePassword');

    Route::get('/orders', 'ProfileController@orders');

    Route::get('/password', 'ProfileController@Password');

    Route::post('/updateAddress', 'ProfileController@UpdateAddress');

Route::post('/updatePassword', 'ProfileController@updatePassword');


    Route::get('/profile', function() {
        return view('profile.index');
    });


    Route::get('/thankyou', function() {
        return view('profile.thankyou');
    });



  


});






