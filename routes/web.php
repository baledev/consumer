<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\FetchController;

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

Route::get(
    '/',
    [MainController::class, 'index']
)->name('main');

Route::get(
    'fetch/{id}',
    [FetchController::class, 'fetch']
)->name('fetch');

/* Route::get('/', function () {


        $d =   \GoogleMaps::load('nearbysearch')

                 ->setParam([
                     'location'  => '-7.322491345983619, 108.22066083863699',
                     'radius'    => '25000',
                     'name'      => 'service hp',

                 ])
                 ->get();

        dd(json_decode($d));

    return view('welcome');
}); */


