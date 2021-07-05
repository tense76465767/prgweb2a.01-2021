<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

//Route::get('/products', [App\Http\Controllers\ProductController::class, 'getProducts'])->middleware('auth');

Route::get('/', [App\Http\Controllers\AjaxCustomerController::class, 'showCustomerList'])->middleware('auth')->name('ajaxcustomerslist');
Route::get('/ajaxcustomerlist', [App\Http\Controllers\AjaxCustomerController::class, 'showCustomerList'])->middleware('auth')->name('ajaxcustomerslist');
Route::get('/ajaxnewcustomer', [App\Http\Controllers\AjaxCustomerController::class, 'showNewCustomer'])->middleware('auth');
Route::get('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'getCustomers'])->middleware('auth');
Route::get('/ajaxcustomers/{id}', [App\Http\Controllers\AjaxCustomerController::class, 'getCustomerById'])->middleware('auth');
Route::post('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'postCustomer'])->middleware('auth');
Route::put('/ajaxcustomers', [App\Http\Controllers\AjaxCustomerController::class, 'putCustomer'])->middleware('auth');

Route::get('/invoiceform', [App\Http\Controllers\InvoiceController::class, 'showNewInvoice']);
Route::get('/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'getInvoice']);
Route::post('/invoices', [App\Http\Controllers\InvoiceController::class, 'postInvoice']);
