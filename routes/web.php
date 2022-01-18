<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//profile
Route::get("/profile/create","ProfileController@create")->name("profile.create");
Route::post("/profile/store","ProfileController@store")->name("profile.store");
Route::get("/profile/edit","ProfileController@edit")->name("profile.edit");
Route::put("/profile/update","ProfileController@update")->name("profile.update");

//competence
Route::get("/competences","CompetenceController@index")->name("competence.index");
Route::get("/competence/create","CompetenceController@create")->name("competence.create");
Route::post("/competence/store","CompetenceController@store")->name("competence.store");
Route::get("/competence/edit/{id}","CompetenceController@edit")->name("competence.edit");
Route::put("/competence/update/{id}","CompetenceController@update")->name("competence.update");
Route::delete("/competence/delete/{id}","CompetenceController@destroy")->name("competence.delete");

//experience 
Route::get("/experiences","ExperienceController@index")->name("experience.index");
Route::get("/experience/create","ExperienceController@create")->name("experience.create");
Route::post("/experience/store","ExperienceController@store")->name("experience.store");
Route::get("/experience/edit/{id}","ExperienceController@edit")->name("experience.edit");
Route::put("/experience/update/{id}","ExperienceController@update")->name("experience.update");
Route::delete("/experience/delete/{id}","ExperienceController@destroy")->name("experience.delete");


