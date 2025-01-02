<?php

use App\Models\User;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['splade'])->group(function () {

    Route::get('/', function () {

        $users = SpladeTable::for(User::class)
            ->column('name')
            ->column('email')   
            ->column('created_at')
            ->column('updated_at')
            ->paginate(10);

        return view('home', [
            'users' => $users
        ]);
    })->name('home');

    Route::get('/docs', fn() => view('docs'))->name('docs');

    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();
});
