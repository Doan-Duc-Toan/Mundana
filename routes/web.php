<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\PostShow;
use Illuminate\Support\Facades\Route;
use App\Livewire\CatAdd;
use App\Livewire\PostManager;
use App\Livewire\EditPost;
use App\Livewire\Index;
use App\Livewire\PostDetail;
use App\Livewire\CatProduct;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/post',  PostManager::class)->middleware(['auth', 'verified'])->name('post.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::get('/post', PostManager::class)->name('post.add');
    Route::get('/cat', CatAdd::class)->name('cat.add');
    Route::get('/post/show', PostShow::class)->name('post.show');
    Route::get('post/edit/{id}', EditPost::class)->name('post.edit');
});

Route::get('/', Index::class)->name('client.index');
Route::get('post_detail/{id}', PostDetail::class)->name('post.detail');
Route::get('cat/{id}', CatProduct::class)->name('cat.detail');
require __DIR__ . '/auth.php';
