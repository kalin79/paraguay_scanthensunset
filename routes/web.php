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


Route::group(['as' => 'frontend.'], function () {
    // Route::get('/evento/codigos-download/{evento_promotor}', [\App\Http\Controllers\EventoPromotorController::class, 'exportCodigos'])->name('evento.codigo-download');
    // Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'participar'])->name('participar');
    Route::get('/foto', [App\Http\Controllers\Frontend\HomeController::class, 'foto'])->name('foto');
    Route::get('/resultado', [App\Http\Controllers\Frontend\HomeController::class, 'resultado'])->name('resultado');
    Route::get('/preresultado', [App\Http\Controllers\Frontend\HomeController::class, 'preresultado'])->name('preresultado');
    Route::get('/error', [App\Http\Controllers\Frontend\HomeController::class, 'error'])->name('error');
    Route::get('/error2', [App\Http\Controllers\Frontend\HomeController::class, 'error2'])->name('error2');
    Route::get('/gracias', [App\Http\Controllers\Frontend\HomeController::class, 'thankyou'])->name('gracias');
    Route::post('/cliente/save',         [App\Http\Controllers\ClienteController::class, 'sendNotifactionRegister'])->name('sendNotifactionRegister');
    Route::post('/cliente/validar-codigo',         [App\Http\Controllers\ClienteController::class, 'validarCodigo'])->name('validarCodigo');

    Route::post('/read-image', [App\Http\Controllers\HomeController::class, 'readImage'])->name('readImage');
    Route::post('/send-email', [App\Http\Controllers\HomeController::class, 'sendEmailUser'])->name('sendEmailUser');
    Route::post('/store-email', [App\Http\Controllers\HomeController::class, 'storeMail'])->name('storeMail');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function(){
        return redirect('/admin/home');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', 'Auth\LoginController@showLoginForm');
        Route::get('/login', 'Auth\LoginController@showLoginForm');
        Route::post('/login', 'Auth\LoginController@login')->name('login');
    });

    Route::middleware(['auth'])->group(function () {

        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('/home', 'HomeController@index')->name('home.index');
        // Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

        Route::get('usuarios', "UserController@index")->name('administrator.index');
        Route::get('/usuarios/load', 'UserController@load')->name('administrator.load');
        Route::post('usuarios/register', "UserController@store")->name('administrator.register');
        Route::get('usuarios/create', "UserController@create")->name('administrator.create');
        Route::get('usuarios/edit/{user}', "UserController@edit")->name('administrator.edit');
        Route::post('usuarios/update/{user}', 'UserController@update')->name('administrator.update');
        Route::post('usuarios/delete', "UserController@delete")->name('administrator.delete');
        Route::post('usuarios/desactive', "UserController@desactive")->name('administrator.desactive');
        Route::post('usuarios/active', "UserController@active")->name('administrator.active');




        // route::get('dashboard/load', "DashboardController@load")->name('reporte.load');

        Route::get('clientes-descuentos', "ClienteController@index")->name('cliente.index');
        Route::get('clientes-descuentos/load', 'ClienteController@load')->name('cliente.load');
        Route::post('clientes-descuentos/export-data-excel', 'ClienteController@exportExcel')->name('cliente.export-data');



        Route::get('descuentos', "DescuentoController@index")->name('descuentos.index');
        Route::get('descuentos/load', 'DescuentoController@load')->name('descuentos.load');
        /*Route::post('socios/register', "SociosController@store")->name('socio.store');
        Route::get('socios/create', "SociosController@create")->name('socio.create');
        Route::get('socios/edit/{socio}', "SociosController@edit")->name('socio.edit');
        Route::post('socios/update/{socio}', 'SociosController@update')->name('socio.update');
        Route::post('socios/delete', "SociosController@delete")->name('socio.delete');
        Route::post('socios/desactive', "SociosController@desactive")->name('socio.desactive');
        Route::post('socios/active', "SociosController@active")->name('socio.active');*/
        Route::get('descuentos/import', 'DescuentoController@formImport')->name('descuentos.importForm');
        Route::post('descuentos/import/save', 'DescuentoController@importSave')->name('descuentos.import-save');

        // Route::get('filtro/lista-eventos', 'FiltersController@listaEventos')->name('filtro.evento-lista');
        // Route::get('filtro/lista-zonas', 'FiltersController@listaZonas')->name('filtro.lista-zona');

        Route::get('/historial', 'HistorialController@index')->name('historial.index');

    });
});



Route::get('/clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
});
