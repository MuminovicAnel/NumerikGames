
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

/* Auth routes */
Auth::routes();

// Admin resources

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::resource('themes', 'AdminThemeController');
    Route::resource('proses', 'AdminProseController');
    Route::resource('verses', 'AdminVerseController');
});

/* Routes for standard user */
Route::get('/', 'ThemeController@index')->name('home');
Route::get('/projectors', 'ProseController@projector')->name('projectors.index');
Route::resource('verses', 'VerseController', ['only' => ['create','index','store']]);
Route::resource('themes', 'ThemeController', ['only' => ['show']]);
Route::resource('proses', 'ProseController');

