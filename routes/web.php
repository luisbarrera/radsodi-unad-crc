<?php

use App\Empresa;
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
    $empresa = Empresa::first();
    return view('welcome', compact('empresa'));
})->name('welcome');
Route::get('/vista', function () {
    return view('vista');
});
Route::resource('empresa', 'EmpresaController')->only([
    'index', 'edit', 'update'
])->names('empresa');
Route::resource('areas', 'AreaController')->except([
    'show',
])->names('admin.areas');
Route::resource('clases', 'ClaseController')->except([
    'show',
])->names('admin.clases');
Route::resource('dependencias', 'DependenciaController')->except([
    'show',
])->names('admin.dependencias');
Route::resource('estadovigencias', 'EstadovigenciaController')->except([
    'show',
])->names('admin.estadovigencias');

Route::resource('subserie', 'FamiliaController')->except([
    'show',
])->names('admin.familias');
Route::resource('soporte', 'FuenteController')->except([
    'show',
])->names('admin.fuentes');
Route::resource('meses', 'MeseController')->only([
    'index',
])->names('admin.meses');
Route::resource('objeto', 'ModalidadeController')->except([
    'show',
])->names('admin.modalidades');
Route::resource('inventario', 'PlanadquisicioneController')->names('planadquisiciones');
route::get('retirar_producto/{planadquisicione}/de/{producto}', 'PlanadquisicioneController@retirar_producto')->name('retirar_producto');
Route::get('exportar_planadquisiciones_excel/{planadquisicion}', 'PlanadquisicioneController@exportar_planadquisiciones_excel')->name('exportar_planadquisiciones_excel');
Route::resource('productos', 'ProductoController')->except([
    'show', 'destroy'
])->names('admin.productos');
Route::get('importar_datos', function () {
    return view('admin.importar_datos');
})->name('importar_datos');
Route::get('productos/{slug}/destroy', 'ProductoController@destroy')->name('admin.productos.destroy');
Route::resource('serie', 'SegmentoController')->except([
    'show',
])->names('admin.segmentos');
Route::resource('requipoais', 'RequipoaiController')->only([
    'index',
])->names('admin.tipoadquicsiciones');
Route::get('tipoadquisiciones', 'RequipoaiController@tipoadquicsiciones55')->name('admin.tipoadquicsiciones55.index');
Route::resource('tipoprioridade', 'TipoprioridadeController')->except([
    'show',
])->names('admin.tipoprioridades');
Route::resource('tipoprocesos', 'TipoprocesoController')->except([
    'show',
])->names('admin.tipoprocesos');
Route::resource('tipozonas', 'TipozonaController')->only([
    'index',
])->names('tipozonas');
Route::resource('codigo', 'RequiproyectoController')->except([
    'show',
])->names('admin.proyectos');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('obtener_familias', 'AjaxController@obtener_familias')->name('obtener_familias');
Route::get('obtener_codigo', 'AjaxController@obtener_codigo')->name('obtener_codigo');
// Route::get('obtener_clases', 'AjaxController@obtener_clases')->name('obtener_clases');
// Route::get('obtener_productos', 'AjaxController@obtener_productos')->name('obtener_productos');
// route::get('planadquisiciones/{planadquisicion}/agregar_producto', 'PlanadquisicioneController@agregar_producto')->name('agregar_producto');
// route::post('planadquisiciones/{planadquisicion}/agregar_producto_store', 'PlanadquisicioneController@agregar_producto_store')->name('agregar_producto_store');
Route::resource('users', 'UserController')->names('users');
// ================== rutas para importar datos 
Route::post('areas_import', 'ImportExcelController@areas_import')->name('areas.import.excel');
Route::post('dependencias_import', 'ImportExcelController@dependencias_import')->name('dependencias.import.excel');
Route::post('estado_vigencia_import', 'ImportExcelController@estado_vigencia_import')->name('estado_vigencia.import.excel');
Route::post('familias_import', 'ImportExcelController@familias_import')->name('familias.import.excel');
Route::post('segmento_import', 'ImportExcelController@segmento_import')->name('segmento.import.excel');
Route::post('clases_import', 'ImportExcelController@clases_import')->name('clases.import.excel');
Route::post('fuentes_import', 'ImportExcelController@fuentes_import')->name('fuentes.import.excel');
Route::post('modalidades_import', 'ImportExcelController@modalidades_import')->name('modalidades.import.excel');
Route::post('productos_import', 'ImportExcelController@productos_import')->name('productos.import.excel');
Route::post('planadquisicione_import', 'ImportExcelController@planadquisicione_import')->name('planadquisicione.import.excel');


//new
Route::get('planadquisiciones-export', 'PlanadquisicioneController@export')->name('planadquisiciones.export');
Route::put('update-profile/{user}', 'UserController@updateProfile')->name('update.profile');
Route::get('planadquisiciones/areas/{areaId}', 'PlanadquisicioneController@indexByArea')->name('planadquisiciones.indexByArea');
Route::get('planadquisiciones/onlyadmin', 'PlanadquisicioneController@showOnlyAdmin')->name('planadquisiciones.showOnlyAdmin');
Route::get('planadquisiciones', 'PlanadquisicioneController@index')->name('planadquisiciones.index');
Route::get('planadquisiciones/area/{areaId}', 'PlanadquisicioneController@indexByArea')->name('planadquisiciones.indexByArea');
