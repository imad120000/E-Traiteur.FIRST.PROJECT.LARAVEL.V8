<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;



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


Route::get('/details/{id}', [UserController::class, 'annonce']);







//User


 Route::prefix('user')->name('user.')->group(function(){
       
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
       // return view('login'); 
        
          Route::view('/active','user.active')->name('active');
          Route::view('/login','user.login')->name('login');
          Route::view('/register','user.register')->name('register');
          Route::post('/check',[UserController::class,'check'])->name('check');
          Route::post('/create',[UserController::class,'create'])->name('create');
    });

     Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
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




       
        Route::view('/new-password','user.new-password')->name('new-password');
        Route::view('/statistiques','user.statistiques')->name('statistiques');
        //logout
        Route::post('/logout',[UserController::class,'logout'])->name('logout');



        //Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

}); 

 
Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
       // return view('login'); 

          Route::view('/login','admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

     Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){

        //Profile (satatistique)
        Route::get('/profile',[AdminController::class,'profile'])->name('profile');

        //Annonce Admin for page Home
        Route::get('/annonce',[AdminController::class,'annonce'])->name('annonce');
        Route::post('/annonce',[AdminController::class,'addannonce'])->name('addannonce');
        Route::post('/annonce/{id}',[AdminController::class,'updateannonce'])->name('updateannonce');
        Route::Delete('/annonce/{id}',[AdminController::class,'deleteannonce'])->name('deleteannonce');

        //activation compte
        Route::get('/account-activation',[AdminController::class,'activecompte'])->name('activecompte');


        





        //logout
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');

        //Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

}); 