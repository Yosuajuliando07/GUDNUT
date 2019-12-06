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
//     return view('Homepage');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'SearchController@search')->name('search');
//Halaman Blog
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/detail/{id}', 'ShopController@show')->name('produk.detail');
Route::get('/shop/kategori/{id}', 'ShopController@showKategori')->name('showKategori');
//Keranjang(Cart)
Route::resource('keranjang', 'KeranjangController', ['only' => ['index','store','destroy','update']]);
//Halaman Blog
Route::resource('pageblog', 'BlogController', ['only' => ['index','show']]);
Route::get('pageblog/blog-kategori/{id}', 'BlogController@showKategori')->name('showKategoriblog');


Auth::routes();
Route::group(['middleware'=> ['auth']], function (){
    Route::post('komentar/{id}', 'KomentarController@store')->name('tambah.komentar');
});
Route::group(['namespace' => 'Admin', 'middleware'=> ['auth','admin']], function (){
    //Dashboard
    Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
    //Profil
    Route::get('admin/profil','ProfilController@index')->name('admin.profil');
    Route::put('admin/profil', 'ProfilController@updatedataprofil')->name('admin.profil.update');
    Route::post('admin/profil', 'ProfilController@updatefotoProfil')->name('admin.foto.profil.update');
    Route::put('admin/update/password', 'ProfilController@updatepassword')->name('admin.update.password');
    //Display(Akses) Produk Users
    Route::resource('displayorder', 'DisplayorderController', ['only' => ['index','show']]);
    Route::get('displayorder/disetujui/{id}', 'DisplayorderController@disetujui')->name('order.disetujui');
    //Display(Akses) Produk Users
    Route::resource('displayproduk', 'DisplayprodukController', ['only' => ['index','show','destroy']]);
    //Kelola Kategori Blog
    Route::resource('kategoriblog', 'KategoriblogController', ['except' => ['show']]);
    //Kelola Kategori Produk
    Route::resource('kategoriproduk', 'KategoriprodukController', ['except' => ['show']]);
    //Kelola Blog
    Route::resource('blog', 'KelolablogController');
    //Slider(Carousel)
    Route::resource('slider', 'SlideController', ['except' => ['show']]);
    Route::get('slider/aktif/{id}', 'SlideController@aktif')->name('slider.aktif');
    Route::get('slider/nonaktif/{id}', 'SlideController@nonaktif')->name('slider.nonaktif');
    //Kelola List(Data) Admin(Level1)
    Route::resource('kelola/admin', 'KelolaadminController');
    //Kelola Akun Penjual(Level2)
    Route::resource('kelola/penjual', 'KelolapenjualController');
    //Kelola Akun Pembeli(Level3)
    Route::resource('kelola/pelanggan', 'KelolapelangganController');
});
Route::group(['namespace' => 'Penjual', 'middleware'=> ['auth','penjual']], function (){
    //Dashboard
    Route::get('penjual/dashboard', 'DashboardController@index')->name('penjual.dashboard');
    //Profil
    Route::get('penjual/profil','ProfilController@index')->name('penjual.profil');
    Route::put('penjual/profil', 'ProfilController@updatedataprofil')->name('penjual.profil.update');
    Route::post('penjual/profil', 'ProfilController@updatefotoProfil')->name('penjual.foto.profil.update');
    Route::put('penjual/update/password', 'ProfilController@updatepassword')->name('penjual.update.password');
    //Kelola Produk
    Route::resource('produk', 'KelolaprodukController');
    Route::resource('kelolaorder', 'KelolaorderController', ['only' => ['index','show']]);
    Route::get('kelolaorder/kirim/{id}', 'KelolaorderController@kirim')->name('kirim');
});
Route::group(['namespace' => 'Pelanggan', 'middleware'=> ['auth','pelanggan']], function (){
    //Profil
    Route::get('pelanggan/profil','ProfilController@index')->name('pelanggan.profil');
    Route::put('pelanggan/profil', 'ProfilController@updatedataprofil')->name('pelanggan.profil.update');
    Route::post('pelanggan/profil', 'ProfilController@updatefotoProfil')->name('pelanggan.foto.profil.update');
    Route::put('pelanggan/update/password', 'ProfilController@updatepassword')->name('pelanggan.update.password');
    Route::resource('order', 'OrderController', ['only' => ['index','show']]);
    Route::get('order/barangsampsai/{id}', 'OrderController@barangSampai')->name('barangsamsampai');
    Route::post('buktipembayan', 'BuktipembayaranController@store')->name('buktipembayan.store');
    //Checkout
    Route::resource('checkout', 'CheckoutController', ['only' => ['index','store']]);
});




