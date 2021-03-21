<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\descuentoAdicionalController;
use App\Models\User;
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


Route::get('/',[descuentoAdicionalController::class, 'index'])->name('index')->middleware(['auth']);

Route::post('producto-store',[descuentoAdicionalController::class, 'store'])->name('producto.store')->middleware(['auth']);

Route::put('producto-update',[descuentoAdicionalController::class, 'update'])->name('producto.update')->middleware(['auth']);
Route::delete('producto-delete',[descuentoAdicionalController::class, 'destroy'])->name('producto.destroy')->middleware(['auth']);


Route::get('producto-search',[descuentoAdicionalController::class, 'search'])->name('producto.search')->middleware(['auth']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/hash_password', function() {

    $users = User::chunk(50, function ($users) {
        foreach ($users as $user) {
            if(Hash::needsRehash($user->password) ){ 
                $user->password = Hash::make($user->password);
                $user->save(); //Aplicar hash a la contraseña 
              
            }else{
                $alreadyhashed; //No necesita
            }
        }
    });
   });//->middleware('auth');