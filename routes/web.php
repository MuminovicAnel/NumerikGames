
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


/* Routes for admin only */
Route::middleware(['auth'])->group(function () {
    Route::resource('proses', 'ProseController');
    Route::resource('verses', 'VerseController');
    Route::resource('themes', 'ThemeController');
});

/* Routes for user only */
Route::middleware(['guest'])->group(function () {
    /* Home link to theme */
    Route::get('game', 'VerseController@create')->name('game.verse.create');
    Route::post('game', 'VerseController@store')->name('game.verse.store');

});

Route::get('/projectors', 'ProseController@projector')->name('projectors.index');

/* Home link to theme */
Route::get('/', 'ThemeController@index')->name('home');

/* Routes for standard user */
Route::resource('verses', 'VerseController', ['only' => ['create','index','store']]);
Route::resource('proses', 'ProseController', ['only' => ['show']]);
Route::resource('themes', 'ThemeController', ['only' => ['show']]);

/* Auth routes */
Auth::routes();

