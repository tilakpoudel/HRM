<?php
use Illuminate\Support\Facades\Input;
use App\Ministry;
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

Auth::routes();

Route::group(['prefix'=>'admin','middlware'=>'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('ministry','MinistryController');
    Route::resource('nirdeshanalaya','NirdeshanalayaController');
    Route::resource('karyalaya','KaryalayaController');
    Route::resource('taha','TahaController');
    Route::resource('pad','PadController');
    Route::resource('shreni','ShreniController');
    Route::resource('employee','EmployeeController');
    Route::get('/employee/operate/{id}','EmployeeController@operate')->name('employee.operate');
    Route::post('/operate', [
        'use'=>'EmployeeController@storeOperate',
        'as'=>'employee.storeOperate'
    ]);

    Route::post('/dynamic/fetch','DynamicController@fetch')->name('dynamic.fetch');

    // Route::get('employee/operate','EmployeeController@operate');

    // Route::post('dyamic_content/fetch','
    // TahaController@fetch')->name('tahaController.fetch');

    // Route::get('api/dropdown', function(){
    //     $input = Input::get('option');
    //       $ministry = Ministry::find($input)->$nirdeshanalaya();
    //     //   echo($ministry);
    //     //   $nirdeshanalayas = $ministry->$nirdeshanalaya();
    //     //   return Response::make($nirdeshanalayas->get(['id','nir_name']));
    //       return $ministry->lists('nir_name', 'id');
    //   })->name('dropdown');

});



