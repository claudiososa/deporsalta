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

Route::get('/','PagesController@home');

Route::get('/aboutUs','PagesController@aboutUs');
Route::get('/contacto','PagesController@contact');


// Visitante

Route::get('/catalogo','ProductController@catalogo');
Route::get('/catalogo/{category}','ProductController@catalogoCategory');


//  Products
Route::get('/products','ProductController@list')->middleware('auth');
Route::get('/productsale','ProductController@listSale')->middleware('auth');


Route::get('/product/selectcategory','ProductController@selectCategory')->middleware('auth');
Route::post('/product/selectcategory','ProductController@new')->middleware('auth');

//Route::get('/product/create','ProductController@new')->middleware('auth');
Route::post('/searchproduct','ProductController@searchProduct')->middleware('auth')->name('searchProduct');
Route::post('/searchproductsale','ProductController@searchProductSale')->middleware('auth')->name('searchProductSale');


Route::get('/search','ProductController@search')->middleware('auth');
Route::post('/product/search','ProductController@searchPost')->middleware('auth');


Route::get('viewproduct/{product}','ProductController@show');
Route::post('/product/create','ProductController@create')->middleware('auth');


Route::get('/product/update/{product}','ProductController@update')->middleware('auth');

Route::post('/product/edit','ProductController@edit')->middleware('auth');
//  Brands
Route::get('/viewbrand','BrandController@list')->middleware('auth');
Route::get('/viewbrand/{brand}','BrandController@show')->middleware('auth');

Route::get('/brand/create','BrandController@new')->middleware('auth');
Route::get('/brand/update/{brand}','BrandController@update')->middleware('auth');

Route::post('/brand/edit','BrandController@edit')->middleware('auth');
Route::post('/brand/create','BrandController@create')->middleware('auth');

//  Categories
Route::get('/viewcategory','CategoryController@list')->middleware('auth');
Route::get('/viewcategory/{category}','CategoryController@show')->middleware('auth');

Route::get('/category/create','CategoryController@new')->middleware('auth');
Route::get('/category/update/{category}','CategoryController@update')->middleware('auth');

Route::post('/category/edit','CategoryController@edit')->middleware('auth');
Route::post('/category/create','CategoryController@create')->middleware('auth');

//  Waists
Route::get('/viewwaist','WaistController@list')->middleware('auth');
Route::get('/viewwaist/{waist}','WaistController@show')->middleware('auth');

Route::get('/waist/create','WaistController@new')->middleware('auth');
Route::get('/waist/update/{waist}','WaistController@update')->middleware('auth');

Route::post('/waist/edit','WaistController@edit')->middleware('auth');
Route::post('/waist/create','WaistController@create')->middleware('auth');


// Colours
Route::get('/viewcolour','ColourController@list')->middleware('auth');

Route::get('/viewcolour/{colour}','ColourController@show');
Route::get('/colour/create','ColourController@new');
Route::get('/colour/update/{colour}','ColourController@update')->middleware('auth');

Route::post('/colour/edit','ColourController@edit')->middleware('auth');

Route::post('/colour/create','ColourController@create')->middleware('auth');

// Images
Route::get('/image/new/{product}','PictureController@new')->middleware('auth');
Route::post('/image/create','PictureController@create')->middleware('auth');
Route::get('/image/delete/{image}','PictureController@delete')->middleware('auth');

// Quantity
Route::get('/quantity/new/{product}','QuantityController@new')->middleware('auth');
Route::post('/quantity/create','QuantityController@create')->middleware('auth');

// Sales
Route::get('/sale/new/{product}','SaleController@new')->middleware('auth');
Route::get('/sale/list','SaleController@list')->middleware('auth');
Route::post('/sale/create','SaleController@create')->middleware('auth');
Route::get('/sale/addItem/{product}/{waist}','SaleController@addItem');
Route::get('/sale/confirm/{id}','SaleController@confirm');

//Route::post('/sale/addItem','SaleController@addItem');
//Route::get('/sale/delete/{sale}','SaleController@delete')->middleware('auth');
Route::get('/saledetail/delete/{sale}','SaleController@delete')->middleware('auth');
Route::get('/saledetail/sum/{sale}','SaleController@sumTotal')->middleware('auth');

// Albums
Route::get('/fotos','AlbumsController@getAlbums');
Route::get('/galeria','AlbumsController@getList')->name('gallery');
Route::get('/createalbum','AlbumsController@getForm')->name('createAlbum');


Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
Route::get('/album/{id}','AlbumsController@getAlbum')->name('album');
Route::get('/addimage/{id}', 'ImagesController@getForm')->name('addImage');
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImagesController@postAdd'));
Route::get('/deleteimage/{id}','ImagesController@getDelete')->name('deleteImage');
Route::post('/moveimage', array('as' => 'move_image','uses' => 'ImagesController@postMove'));

//Route::resource('sales','SaleController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
