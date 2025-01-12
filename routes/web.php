<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;




Route::get('/', [AdminController::class, 'home'])->name('home');
Route::get('/recherche', [AdminController::class, 'searche'])->name('searche');
Route::post('/recherche', [AdminController::class, 'search'])->name('search');
Route::get('/details/{id}', [UserController::class, 'annonce'])->name('details');
Route::get('/aide', [AdminController::class, 'aide'])->name('aide');
Route::get('/apropos', [AdminController::class, 'apropos'])->name('apropos');




//Envoyé message
Route::post('/', [AdminController::class, 'envoye'])->name('envoye');

//User
Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        // return view('login'); 
        Route::view('/active', 'user.active')->name('active');
        Route::view('/login', 'user.login')->name('login');
        Route::get('/register', [UserController::class, 'register'])->name('register');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        Route::post('/create', [UserController::class, 'create'])->name('create');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        //return all page for the user

        //Statistique for view post , annonce link visit
        Route::get('/profile', [UserController::class, 'show'])->name('tableu');

        //Annonce
        Route::get('/services', [UserController::class, 'service'])->name('services');
        Route::post('/services', [UserController::class, 'addPost'])->name('addpost');
        Route::post('/services/{id}', [UserController::class, 'updatePost'])->name('updatePost');
        Route::delete('/services/{id}', [UserController::class, 'deletepost'])->name('deletepost');

        //Classment
        Route::get('/publicite', [UserController::class, 'publicite'])->name('publicite');
        Route::post('/publicite', [UserController::class, 'demandeclassment'])->name('demandeclassment');

        //autre-demande
        Route::get('/demande', [UserController::class, 'demande'])->name('demande');
        Route::post('/demande', [UserController::class, 'autredemande'])->name('autredemande');

        //facture
        Route::get('/facture', [UserController::class, 'facture'])->name('facture');

        //change password
        Route::get('/change-password', [UserController::class, 'change'])->name('change');
        Route::post('/change-password', [UserController::class, 'changepassword'])->name('changepassword');





        Route::view('/new-password', 'user.new-password')->name('new-password');
        Route::view('/statistiques', 'user.statistiques')->name('statistiques');
        //logout
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');



        //Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
});

//Admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        // return view('login'); 

        Route::view('/login', 'admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {

        //Profile (satatistique)
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');

        //Annonce Admin for page Home
        Route::get('/annonce', [AdminController::class, 'annonce'])->name('annonce');
        Route::post('/annonce', [AdminController::class, 'addannonce'])->name('addannonce');
        Route::post('/annonce/{id}', [AdminController::class, 'updateannonce'])->name('updateannonce');
        Route::Delete('/annonce/{id}', [AdminController::class, 'deleteannonce'])->name('deleteannonce');

        //activation compte
        Route::get('/account-activation', [AdminController::class, 'activecompte'])->name('activecompte');
        Route::post('/account-activation/{id}', [AdminController::class, 'active'])->name('active');
        Route::delete('/account-activation/{id}', [AdminController::class, 'deletecompte'])->name('deletecompte');

        //classment
        Route::get('/utilisateur-classment', [AdminController::class, 'classment'])->name('classment');
        Route::post('/utilisateur-classment/{id}', [AdminController::class, 'activeclassment'])->name('activeclassment');

        //Message
        Route::get('/Message', [AdminController::class, 'message'])->name('message');
        Route::delete('/Message/{id}', [AdminController::class, 'deletemessage'])->name('deletemessage');

        //Autre demande
        Route::get('/autre-demande', [AdminController::class, 'autredemande'])->name('autredemande');
        Route::delete('/autre-demande/{id}', [AdminController::class, 'deletedemande'])->name('deletedemande');

        //Document
        Route::get('/utilisateur-document', [AdminController::class, 'document'])->name('document');
        Route::delete('/utilisateur-document/{id}', [AdminController::class, 'deletecompte'])->name('deletecompte');
        Route::post('/utilisateur-document', [AdminController::class, 'recherche'])->name('recherche');

        //Ajout service
        Route::get('/ajout-service', [AdminController::class, 'addservice'])->name('addservice');
        Route::post('/ajout-service', [AdminController::class, 'addservices'])->name('addservices');
        Route::delete('/ajout-service/{id}', [AdminController::class, 'deleteservice'])->name('deleteservice');


        //Page villes
        Route::get('/ville', [AdminController::class, 'ville'])->name('ville');
        Route::post('/ville', [AdminController::class, 'addville'])->name('addville');
        Route::delete('/ville/{id}', [AdminController::class, 'deleteville'])->name('deleteville');

        //Statistique
        Route::get('/statistiques', [AdminController::class, 'statistiques'])->name('statistiques');

























        //logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        //Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
});
