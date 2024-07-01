<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkedinController;

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
//Route protégée//entreprise
Route::middleware(['auth','entreprise','invalide'])->group(function(){
    Route::get('confirme/postuler', 'ConfirmeController@exportPostulerListToExcel')->name('export.postuler');
   Route::get('confirme/show/{confirme}', 'ConfirmeController@liredoc')->name('confirme.show');
    Route::put('confirme/update/{confirme}', 'ConfirmeController@update')->name('confirme.update');
    Route::get('confirme', 'ConfirmeController@index')->name('confirme');


    Route::resource('entreprise', EntrepriseController::class);
    //Route::resource('job', JobController::class);
    Route::resource('job', EmploieController::class);
});
//chercheur
Route::middleware(['auth','cherheur','invalide'])->group(function(){

    Route::resource('chercheur', ChercheurController::class);
});

Route::middleware(['auth','invalide'])->group( function(){
//postuler sur les offres
Route::post('raiting','RatingController@store')->name('raiting.store');
Route::post('postuler','WebsiteController@postuler')->name('website.postuler');
Route::get('website/apply/{job}','WebsiteController@apply')->name('website.apply');
Route::get('website/profil','WebsiteController@profil')->name('website.profil');

Route::get('mission','WebsiteController@mission')->name('mission');
//conversation

Route::get('conversations','ConversationController@index')->name('conversation.index');
Route::get('conversations/show/{conversation}','ConversationController@show')->name('conversation.show');

});
Route::middleware('auth')->group( function(){
    Route::get('invalide','WebsiteController@invalide')->name('website.invalide');
    Route::resource('user', InfosController::class);
});
//Routes publique
    //job
    Route::post('search','WebsiteController@search')->name('search');
    Route::get('/','WebsiteController@acceuill')->name('website.index');
    Route::get('website/job','WebsiteController@job')->name('website.job');
    Route::get('website/about','WebsiteController@about')->name('website.about');
    Route::get('website/contact','WebsiteController@contact')->name('website.contact');
    //savoir plus sur les offres
    Route::get('website/showjob/{job}','WebsiteController@showjob')->name('website.showjob');
    //linkedin
    Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
    Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);
    Route::fallback(function() {
        return view('404'); // la vue 404.blade.php
     });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
