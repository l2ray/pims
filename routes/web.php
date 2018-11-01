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

Route::get('/','LoginInController@index');
Route::get('/addUser','LoginInController@adduser');
Route::post('/storeUser','LoginInController@storeUser');
Route::get('/lamin',function(){
    return view('testjs');
});

Route::get('/generatePdf','InsertCustomData@index');
Route::get('/test/{s}','fetchData@getData');//function(){
Route::get('/getDrugList','fetchData@getDrugList');
Route::get('/makequery/{pid}/{sid}','fetchData@makeQuery');
Route::get('/addTmpData/{input}','InsertCustomData@saveTmp');
Route::get('/dashboard',function(){
    return view('Dashboard.index');
});
Route::get('updateRequest/{i}','ApproveListController@updateRequest');
Route::get('/receipt',function(){
    return view('tcpdf/examples/example_001');
});
Route::get('/mystore/addProduct/{id}',"InsertCustomData@addPToStore");
Route::get('/requestDrug/{dId}/{sId}',"InsertCustomData@drugRequest");
Route::get('/pVat/{input}','fetchData@getVat'); 
Route::get('/deleteProduct/{s}','InsertCustomData@deleteItem');
Route::get('/addToAprroveList/{pR}/{sR}/{sG}/{pG}/{qR}/{uId}/{reasonForRequest}','ApproveListController@addToApprove');
   // return("hey");
//});
Route::resource('/products', 'ProductController');
Route::resource('/stores','StoreController');
Route::resource('/sales','SalesController');
Route::resource('/productTypes','ProductTypeController');
Route::resource('/productCategories','ProductCategoryController');
Route::resource('/customers','CustomerController');
Route::resource('/PrescriptionHospitals','PresLstController');
Route::resource('/customStore','CustomStoreController');
Route::resource('/approve','ApproveListController');
Route::resource('/login','LoginInController');
Route::resource('/monthlySales', 'monthlySales');

Route::resource('/dailySales', 'dailySalesReport');



