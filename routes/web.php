<?php
use Illuminate\Support\Facades\Input;
use App\category;
use App\state;
use App\address;

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
    return view('login');
});
Route::get('/color', function () {
    return view('color');
});
Route::get('/newuser', function () {
    return view('newuser');
});
Route::get('/newuser', function () {
    return view('newuser');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/logout', function () {
    return view('login');
});

Route::get('/register1','logincontroller@showRegister')->name('register1');
Route::get('/product/{id}','Frontend\FrontendLoginController@product');
//Route::get('/login','logincontroller@show')->name('login');


// Route::get('/dashboard',function (){
//   return view('/dashboard');
// })->name('dashboard');

Route::get('/category-dropdown',function(){

       $cat_id = input::get('cat_id');
       dd($cat_id);
       $subcategories = Category::where('parent_id','=',$cat_id)->get();

 		
       return Response::json($subcategories);


    });

Route::get('/country-dropdown',function(){

       $cat_id = input::get('cat_id');

       //$state = state::where('countryID','=',$cat_id)->get();
       $state = DB::table('states')->where('countryID', $cat_id)->get();
       return Response::json($state);
    });

Route::get('/address-dropdown',function(){
      
       $add_id = input::get('add_id');
       //$address = address::where('id','=',$add_id)->get();
       //echo '<pre>';print_r($address);die;
       $addresses = DB::table('addresses')
                        ->leftJoin('country', 'country.id', '=', 'addresses.countryID')
                        ->leftJoin('states', 'states.id', '=', 'addresses.stateID')
                        ->select('addresses.*','country.country_name','states.state_name')
                        ->where('addresses.id',$add_id)
                        ->get();
       return Response::json($addresses);
    });


Route::group(['middleware' => ['auth']], function() {
     
    //Route::resource('users','UserController');
//Route::resource('roles','RoleController');
});
Route::get('roles','RoleController@index')->name('roles.index')->middleware('permission:role-list');
Route::post('roles','RoleController@store')->name('roles.store');
Route::get('roles/create','RoleController@create')->name('roles.create')->middleware('permission:role-create');
Route::get('roles/{roles}','RoleController@show')->name('roles.show');
Route::patch('roles/{roles}','RoleController@update')->name('roles.update');
Route::delete('roles/{roles}','RoleController@destroy')->name('roles.destroy');
Route::get('roles/{roles}/edit','RoleController@edit')->name('roles.edit')->middleware('permission:role-edit');

Route::get('users','UserController@index')->name('users.index')->middleware('permission:user-list');
Route::post('users','UserController@store')->name('users.store');
Route::get('users/create','UserController@create')->name('users.create')->middleware('permission:role-create');
Route::get('users/{users}','UserController@show')->name('users.show');
Route::patch('users/{users}','UserController@update')->name('users.update');
Route::delete('users/{users}','UserController@destroy')->name('users.destroy');
Route::get('users/{users}/edit','UserController@edit')->name('users.edit')->middleware('permission:user-edit');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('admin/configurations', 'Admin\\ConfigurationsController')->middleware('role:admin');

Route::resource('admin/banners', 'Admin\\BannersController')->middleware('role:admin');

Route::resource('admin/category', 'Admin\\categoryController');
Route::resource('admin/product', 'Admin\\ProductController');
Route::resource('admin/coupon', 'Admin\\CouponController');





// Eshopper routes

Route::get('/Eshopper', function () {
    return view('Eshopper.dashboard');
});

Route::get('/Eshopperlogin', function () {
    return view('Eshopper.login');
})->name('Eshopperlogin');

// Route::get('/check', function () {
//     return view('Eshopper.checkOut');
// })->name('checkOut');

Route::get('/cart','Frontend\FrontendLoginController@total')->name('cart');



Route::get('/product-details', function () {
    return view('Eshopper.product-details');
})->name('product-details');

Route::get('/productinfo','Frontend\FrontendLoginController@categories')->name('productinfo');
Route::get('/addcart/{id}','Frontend\FrontendLoginController@cartStore');
Route::get('/removeproduct/{rowid}','Frontend\FrontendLoginController@removeproduct');
Route::get('/incrementQuantity/{rowid}/{rowqty}','Frontend\FrontendLoginController@incrementQuantity');
Route::get('/decrementQuantity/{rowid}/{rowqty}','Frontend\FrontendLoginController@decrementQuantity');
Route::get('/decrementQuantity/{rowid}/{rowqty}','Frontend\FrontendLoginController@decrementQuantity');
Route::get('/couponDiscount/','Frontend\FrontendLoginController@couponDiscount')->name('coupon');
//Route::get('/checkout/','Frontend\FrontendLoginController@checkout')->name('checkout');



Route::get('/404', function () {
    return view('Eshopper.404');
})->name('404');

Route::get('/contact', function () {
    return view('Eshopper.contact-us');
})->name('contact');

Route::get('/blog', function () {
    return view('Eshopper.blog');
})->name('blog');

Route::get('/blog-single', function () {
    return view('Eshopper.blog-single');
})->name('blog-single');

Route::get('/reset-password', function () {
    return view('Eshopper.reset_password');
})->name('reset-password');






Route::post('Userlogin','Frontend\FrontendLoginController@login')->name('Userlogin');
Route::post('Userlogout','Frontend\FrontendLoginController@logout')->name('Userlogout');
Route::post('UserRegistration','Frontend\FrontendLoginController@store')->name('UserRegistration');

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});



Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('password/reset', 'Auth\ResetPasswordController@reset');


Route::resource('admin/address', 'Admin\\addressController');
Route::resource('admin/address', 'Admin\\addressController');

Route::get('checkOut','Frontend\\FrontendLoginController@check')->name('checkOut');
//Route::get('/check','Frontend\\CheckoutController@checkout')->name('CODcheck');
Route::post('check', ['as' => 'checkout', 'uses' => 'Frontend\\CheckoutController@checkout']);
Route::get('wishlist/{id}','Frontend\\CheckoutController@wishlist')->name('wishlist');


// --------paypal routes-------
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'Frontend\\PayPalController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'Frontend\\PayPalController@postPaymentWithpaypal'));
Route::get('paypal', array('as' => 'payment.status','uses' => 'Frontend\\PayPalController@getPaymentStatus',));
