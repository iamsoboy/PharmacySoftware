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


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Auth\AuthenticatedSessionController@create');

//Route::get('/dashboard', function () {
 //   return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userban'])->group(function () {


Route::get('retainership-create', 'RetainershipController@create')->name('retainership.create');
Route::post('retainership-create', 'RetainershipController@store')->name('retainership.store');
Route::get('retainership-edit/{retainership}/edit', 'RetainershipController@edit')->name('retainership.edit');
Route::patch('retainership-edit/{retainership}', 'RetainershipController@update')->name('retainership.update');
Route::delete('retainership-create/{retainership}', 'RetainershipController@destroy')->name('retainership.destroy');
Route::get('drugs-retainership', 'RetainershipController@drugRetainership')->name('drugRetainership');


Route::get('cart/delete/{id}', 'CartController@destroy');

Route::post('users/{user}', 'UserController@updatePassword')->name('updatePassword');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');

Route::group([
    'prefix' => 'pharmacy',
    'as' => 'pharmacy.',
    'namespace' => 'Pharmacy',
], function () {

    Route::get('dashboard', 'PharmacyController@index')->name('index');
    Route::get('dashboard/out-of-stock', 'PharmacyController@outOfStock')->name('outOfStock');
    Route::get('dashboard/soon-expiring', 'PharmacyController@soonExpiring')->name('soonExpiring');
    Route::get('dashboard/expired', 'PharmacyController@expired')->name('expired');

    Route::get('dispense/create', 'DispenseController@create')->name('dispense.create');
    Route::get('dispense-history', 'DispenseController@index')->name('dispense.index');
    Route::get('dispense-history/{id}', 'DispenseController@prescriptions')->name('dispense.prescriptions');
    Route::get('dispense-return/{prescription}', 'DispenseController@returnDrug')->name('dispense.returnDrug');
    Route::delete('dispense-delete/{dispense}', 'DispenseController@destroy')->name('dispense.destroy');
    Route::post('dispense/create', 'DispenseController@store')->name('dispense.store');

    Route::get('stocks-index', 'DrugStockController@index')->name('stock.index');
    Route::get('stocks-create', 'DrugStockController@create')->name('stock.create');
    Route::get('stocks-edit/{drugStock}/edit', 'DrugStockController@create')->name('stock.edit');
    Route::post('stocks-create', 'DrugStockController@store')->name('stock.store');
    Route::delete('stocks-create/{drugStock}', 'DrugStockController@destroy')->name('stock.destroy');

    Route::group(['namespace'=>'Drug'], function(){
        //Route::get('drug-records', 'DrugController@dumprecords')->name('dumprecords');
        Route::get('drugs/activate/{id}', 'DrugController@activate')->name('drugs.activate');
        Route::get('drugs/deactivate/{id}', 'DrugController@deactivate')->name('drugs.deactivate');

        Route::resources([
            'drugs' => 'DrugController',
            'drugCategory' => 'DrugCategoryController',
            'drugFormulation' => 'DrugFormulationController',
            'drugAllergy' => 'DrugAllergyGroupController',
            'drugClass' => 'DrugClassController',
            'drugDetail' => 'DrugDetailController',
            'prescription' => 'PrescriptionController'
        ]);

    });

});

});
