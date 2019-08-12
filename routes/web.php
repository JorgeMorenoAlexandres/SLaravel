<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
Verb	URI	                Action	    Route Name
GET	    /notas	            index	    notas.index
GET	    /notas/create	    create	    notas.create
POST	/notas	            store	    notas.store
GET	    /notas/{nota}	    show	    notas.show
GET	    /notas/{nota}/edit	edit	    notas.edit
PUT	    /notas/{nota}	    update	    notas.update
DELETE	/notas/{nota}	    destroy	    notas.destroy
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::resource('/notas', 'NotaController');

Route::get('/home', 'HomeController@index')->name('home');
