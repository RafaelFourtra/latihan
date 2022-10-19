<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;

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
Route::get('/{any}',  [TestController::class, 'index'])->where('any', '.*');

Route::get('/insert', function(){
    $stuRef = app('firebase.firestore')->database()->collection('buku')->newDocument();
    $stuRef->set([
        'penerbit' => 'Afar',
        'penulis' => 'Rizki',
        'tahun' => 1990

    ]);
});

Route::get('/show', function(){
    $book = app('firebase.firestore')->database()->collection('buku')->document('6cc175b74d154dcbbb68b')->snapshot();
    print_r('Id Buku =' .$book->id());
    print_r('Penerbit =' .$book->data()['penerbit']);
    print_r('Penulis =' .$book->data()['penulis']);
    print_r('Tahun =' .$book->data()['tahun']);
});

Route::get('/update', function(){
    $update = app('firebase.firestore')->database()->collection('buku')->document('westernfilsafat')
    ->update([
        ['path' => 'penerbit' , 'value' => 'Koji']
    ]);
});

Route::get('/delete', function(){
    $delete = app('firebase.firestore')->database()->collection('buku')->document('westernfilsafat')->
    delete();
});


Route::resource('/test', TestController::class);
