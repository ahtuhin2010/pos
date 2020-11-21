<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'Frontend\FrontendController@index');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('users')->group(function () {
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/eidt/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete', 'Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function () {
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/eidt', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/Password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/Password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('supplieres')->group(function () {
        Route::get('/view', 'Backend\SupplierController@view')->name('supplieres.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('supplieres.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('supplieres.store');
        Route::get('/eidt/{id}', 'Backend\SupplierController@edit')->name('supplieres.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('supplieres.update');
        Route::post('/delete', 'Backend\SupplierController@delete')->name('supplieres.delete');
    });

    Route::prefix('customers')->group(function () {
        Route::get('/view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('/add', 'Backend\CustomerController@add')->name('customers.add');
        Route::post('/store', 'Backend\CustomerController@store')->name('customers.store');
        Route::get('/eidt/{id}', 'Backend\CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'Backend\CustomerController@update')->name('customers.update');
        Route::post('/delete', 'Backend\CustomerController@delete')->name('customers.delete');

        Route::get('/credit', 'Backend\CustomerController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf', 'Backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'Backend\CustomerController@editInvoice')->name('customers.edit.invoce');
        Route::post('/invoice/update/{invoice_id}', 'Backend\CustomerController@updateInvoice')->name('customers.update.invoce');
        Route::get('/invoice/details/pdf/{invoice_id}', 'Backend\CustomerController@invoiceDetailsPdf')->name('customers.invoce.details.pdf');

        Route::get('/paid', 'Backend\CustomerController@paidCustomer')->name('customers.paid');
        Route::get('/paid/pdf', 'Backend\CustomerController@paidCustomerPdf')->name('customers.paid.pdf');

        Route::get('/wise/report', 'Backend\CustomerController@customerWiseReport')->name('customers.wise.report');
        Route::get('/wise/credit/report/pdf', 'Backend\CustomerController@customerWiseCreditPdf')->name('customers.wise.credit.report.pdf');
        Route::get('/wise/paid/report/pdf', 'Backend\CustomerController@customerWisePaidPdf')->name('customers.wise.paid.report.pdf');
    });

    Route::prefix('units')->group(function () {
        Route::get('/view', 'Backend\UnitController@view')->name('units.view');
        Route::get('/add', 'Backend\UnitController@add')->name('units.add');
        Route::post('/store', 'Backend\UnitController@store')->name('units.store');
        Route::get('/eidt/{id}', 'Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
        Route::post('/delete', 'Backend\UnitController@delete')->name('units.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::get('/eidt/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::post('/delete', 'Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/view', 'Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'Backend\ProductController@store')->name('products.store');
        Route::get('/eidt/{id}', 'Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('products.update');
        Route::post('/delete', 'Backend\ProductController@delete')->name('products.delete');
    });

    Route::prefix('purchases')->group(function () {
        Route::get('/view', 'Backend\PurchaseController@view')->name('purchases.view');
        Route::get('/add', 'Backend\PurchaseController@add')->name('purchases.add');
        Route::post('/store', 'Backend\PurchaseController@store')->name('purchases.store');
        Route::post('/delete', 'Backend\PurchaseController@delete')->name('purchases.delete');

        Route::get('/pending', 'Backend\PurchaseController@pendingList')->name('purchases.pending.list');
        Route::post('/approve', 'Backend\PurchaseController@approve')->name('purchases.approve');

        Route::get('/report', 'Backend\PurchaseController@purchaseReport')->name('purchases.roport');
        Route::get('/report/pdf', 'Backend\PurchaseController@purchaseReportPdf')->name('purchases.roport.pdf');
    });

    Route::get('/get-category', 'Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');
    Route::get('/get-stock', 'Backend\DefaultController@getStock')->name('check-product-stock');

    Route::prefix('invoices')->group(function () {
        Route::get('/view', 'Backend\InvoiceController@view')->name('invoices.view');
        Route::get('/add', 'Backend\InvoiceController@add')->name('invoices.add');
        Route::post('/store', 'Backend\InvoiceController@store')->name('invoices.store');
        Route::post('/delete', 'Backend\InvoiceController@delete')->name('invoices.delete');

        Route::get('/pending', 'Backend\InvoiceController@pendingList')->name('invoices.pending.list');
        Route::get('/approve/{id}', 'Backend\InvoiceController@approve')->name('invoices.approve');
        Route::post('/approve/stroe/{id}', 'Backend\InvoiceController@approvalStore')->name('approval.store');

        Route::get('/print/list', 'Backend\InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/{id}', 'Backend\InvoiceController@printInvoice')->name('invoice.print');

        Route::get('/daily/report', 'Backend\InvoiceController@dailyReport')->name('invoice.daily.report');
        Route::get('/daily/report/odf', 'Backend\InvoiceController@dailyReportPdf')->name('invoice.daily.report.pdf');
    });

    Route::prefix('stocks')->group(function () {
        Route::get('/report', 'Backend\StockController@stockReport')->name('stocks.report');
        Route::get('/report/pdf', 'Backend\StockController@stockReportPdf')->name('stocks.report.pdf');
        Route::get('/report/supplier/prodcut/wise', 'Backend\StockController@supplierProdcutWise')->name('stocks.supplier.product.wise');
        Route::get('/report/supplier/wise/pdf', 'Backend\StockController@supplierWisePdf')->name('stocks.supplier.wise.pdf');
        Route::get('/report/product/wise/pdf', 'Backend\StockController@productWisePdf')->name('stocks.product.wise.pdf');
    });


});

