<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PublishersController;

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


Route::get('games/{game}/delete', [GamesController::class, 'delete'])->name('games.delete');
Route::get('publishers/{publisher}/delete', [PublishersController::class, 'delete'])->name('publishers.delete');
Route::resources([
    'games' => GamesController::class,
    'publishers' => PublishersController::class,
]);

Route::redirect('/', route('games.index'));

//eigenlijk moet dit put ipv get zijn, maar even get owv a (in actions.blade.php) en a ondersteunt enkel get. Alternatief indien je route::post wil: form maken (method post) dat eruit ziet als een link.
Route::get('games/{game}/markcomplete', [GamesController::class, 'markcomplete'])->name('games.complete');
//Route::get('games/{game}/markincomplete', [GamesController::class,'markincomplete'])->name('games.incomplete'); //Overbodig geworden nadat in er een "toggle" in markcomplete werd opgenomen.
