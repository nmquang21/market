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

Route::get('/','HomeController@getHomePage');

Auth::routes();

Route::get('/home', 'HomeController@getHomePage')->name('home');

Route::get('topup','MyController@topup')->name('topup');
Route::post('charge','MyController@charge')->name('charge');

Route::post('action-buy','BuyProductController@actionBuy')->name('actionbuy');
Route::get('confirm-buy/{pid}','BuyProductController@getDetail')->name('confirm.buy');
Route::post('add-customer-address','CustomerController@addCustomerAddress');
Route::post('save-customer-address','CustomerController@saveCustomerAddress');

//demo
Route::get('/getProvince','MyController@getProvince');
Route::get('/getDistrict','MyController@getDistrict');
Route::get('/getWard','MyController@getWard');
Route::get('/getVillage','MyController@getVillage');
Route::get('/list-cate','MyController@getCate');
Route::get('/category-child','MyController@getCateChild');

Route::post('report-customer','CustomerController@reportCustomer');
Route::post('comment-product','ProductController@postCommentProduct');
Route::get('delete-product/{id}','ProductController@deleteProduct')->middleware('deleteProduct');
Route::post('post-product','ProductController@saveProducts');
Route::post('uploadImg', 'ProductController@postImages');
Route::post('deleteImg', 'ProductController@deleteImages');
Route::get('/post-product',"HomeController@getPostProduct");
Route::get('/posted-product/{id}',"HomeController@getPostedProduct")->middleware('view_posted');
Route::get('/traded-product/{id}',"HomeController@getTradedProduct")->middleware('view_posted');
Route::post('porduct-latest','ProductController@getProductLatest');
Route::post('porduct-care','ProductController@getProductCare');

Route::post('filter-product','ProductController@filterProduct');

Route::post('add-to-top','ProductController@addToTop');
//listCategory
Route::get('list-category','CategoryController@getAllCategory');
//DEMO
Route::get('/homepage','HomeController@getHomePage')->name(HOME_PAGE);
Route::get('/blogs','HomeController@getBlogsPage');
Route::get('/blog-detail','HomeController@getBlogDetail');
Route::get('/about','HomeController@getAboutPage');
Route::get('/contact','HomeController@getContact');
Route::get('/category/{id}','HomeController@getCategory');
Route::get('/product-detail/{id}','HomeController@getProductDetail')->middleware('checkActiveProduct');
Route::get('/checkout','HomeController@getCheckOut');
Route::get('/cart-detail','HomeController@getCartDetail');

Route::get('/not-found',"HomeController@getNotFound");
//homepage
Route::post('login', 'MyController@postLogin')->name(CLIENT_LOGIN);
Route::post('register', 'MyController@postRegister')->name(CLIENT_REGISTER);
Route::get('logout', 'MyController@getLogout')->name(CLIENT_LOGOUT);

Route::post('login-page', 'MyController@postLoginPage');

//WishList
Route::post('wishlist','MyController@postWishList');
Route::post('delete-wishlist','MyController@postDeleteWishList');

//post-rate
Route::post('rate-user','RateController@postRateUser');


//seach
Route::get('/search/name', 'SearchController@searchByName');
Route::get('/search/category', 'SearchController@searchByCategory');

//notification
Route::post('sign-notification','NotificationController@signNotification');
Route::post('unsign-notification','NotificationController@unSignNotification');

//contact
Route::post('/contact-us','ContactController@contact');

//admin
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'auth'],function (){
    Route::get('dashboard','AdminController@getDashboard');
    Route::get('not-permit', function () {
        return view('admin.not-permit');
    })->name('not-permit');

    //Phong start user manager
    Route::group(['middleware' => 'role:'.config('access.roles.admin')],function(){
        Route::get('users','UserController@index')->name('user.index');
    });
    Route::group(['middleware' => 'permission:'.config('access.permissions.create-user')],function() {
        Route::get('create-user', 'UserController@create')->name('user.create');
        Route::post('store-user','UserController@store')->name('user.store');
    });

    Route::get('profile','UserController@profile')->name('user.profile');
    Route::post('update-infor','UserController@updateInfor')->name('user.update-infor');
    Route::post('update-pass','UserController@updatePassword')->name('user.update-pass');

    Route::group(['middleware' => 'permission:'.config('access.permissions.create-user')],function() {
        Route::get('edit-user/{id}', 'UserController@edit')->name('user.edit');
        Route::post('update-user/{id}', 'UserController@update')->name('user.update');
    });
    Route::group(['middleware' => 'permission:'.config('access.permissions.delete-user')],function() {
        Route::get('delete-user/{id}', 'UserController@destroy')->name('user.delete');
    });
    //customer
    Route::group(['middleware' => 'permission:'.config('access.permissions.view-customer')],function() {
        Route::get('customer', 'CustomerController@index');
        Route::get('edit/{id}', 'CustomerController@getEdit');
        Route::post('edit/{id}', 'CustomerController@postEdit');
        Route::post('delete-customer', 'CustomerController@destroy');
        Route::post('active-customer', 'CustomerController@activeCustomer');
    });

    //category
    Route::group(['middleware' => 'permission:'.config('access.permissions.view-category')],function() {
        Route::resource('category', 'CategoryController');
        Route::post('list-parent-category', 'CategoryController@getAllCategory');
    });
    //active product
    Route::group(['middleware' => 'permission:'.config('access.permissions.view-product')],function() {
        Route::get('posted-products', 'ProductController@getListProduct');
        Route::post('active-product', 'ProductController@activeProduct');
        Route::get('posted-products-actived', 'ProductController@productActived');
        //
        Route::get('top-products', 'ProductController@topProduct');
        Route::POST('delete-top', 'ProductController@deleteTop');
    });
    //Phong start role manager
    Route::group(['middleware' => 'permission:'.config('access.permissions.view-role')],function() {
        Route::get('role', 'RoleController@index')->name('role.index');
    });
    Route::group(['middleware' => 'permission:'.config('access.permissions.create-role')],function() {
        Route::get('create-role', 'RoleController@create')->name('role.create');
        Route::post('store-role', 'RoleController@store')->name('role.store');
    });
    Route::group(['middleware' => 'permission:'.config('access.permissions.update-role')],function() {
        Route::get('edit-role/{id}', 'RoleController@edit');
        Route::post('update-role/{id}', 'RoleController@update')->name('role.update');
    });
    Route::group(['middleware' => 'permission:'.config('access.permissions.delete-role')],function() {
        Route::get('delete-role/{id}', 'RoleController@destroy');
    });
    //rate customer
    Route::group(['middleware' => 'permission:'.config('access.permissions.view-rate')],function() {
        Route::get('rate-customer', 'CustomerController@rateCustomer');
        Route::post('active-rate-customer', 'CustomerController@activeRateCustomer');
        Route::get('rate-customer-actived', 'CustomerController@rateCustomerActived');
    });

    Route::get('report-list','CustomerController@reportList');
    Route::get('report-list-active','CustomerController@reportListActive');
    Route::post('active-report','CustomerController@activeReport');
    Route::post('delete-report','CustomerController@deleteReport');

    Route::post('logout-user', 'MyController@getLogoutUser')->name('logout-user');

    Route::get('/list-contact','ContactController@listContact');
});

//social login
Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');

Route::get('auth/google', 'GoogleAuthController@redirectToProvider')->name('google.login') ;
Route::get('auth/google/callback', 'GoogleAuthController@handleProviderCallback');

Route::get('test-mail', 'MyController@testMail');

//Chart
Route::get('charts/{id}', 'ProductController@showChart');


