<?php
Route::get('/Eshopper', function () {
    return view('Eshopper.dashboard');
})->name('home');

Route::get('/Eshopperlogin', function () {
    return view('Eshopper.login');
});

Route::get('/cart', function () {
    return view('Eshopper.cart'); 
})->name('cart');

Route::get('/checkout', function () {
    return view('Eshopper.checkout');
})->name('checkout');

Route::get('/product-details', function () {
    return view('Eshopper.product-details');
})->name('product-details');

Route::get('/productinfo', function () {
    return view('Eshopper.productinfo');
})->name('productinfo');

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

Route::post('Userlogin','FrontendLoginController@login')->name('Eshopperlogin');
Route::post('UserRegistration','FrontendLoginController@store')->name('UserRegistration');

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

Route::get('/login/github', 'FrontendLoginController@redirectToProvider')->name('githublogin');
Route::get('auth/github/callback', 'FrontendLoginController@handleProviderCallback');

