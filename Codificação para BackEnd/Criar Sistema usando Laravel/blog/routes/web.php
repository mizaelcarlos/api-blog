<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('post/',[PostController::class,'index'])->name('post.index');
Route::get('post/cadastrar',[PostController::class,'create'])->name('post.create');
Route::post('post/salvar',[PostController::class,'store'])->name('post.store');
Route::delete('post/excluir/{id}',[PostController::class,'destroy'])->name('post.destroy');
Route::get('post/editar/{id}',[PostController::class,'edit'])->name('post.edit');
Route::put('post/atualizar/{id}',[PostController::class,'update'])->name('post.update');
Route::get('post/visualizar/{id}',[PostController::class,'show'])->name('post.show');
Route::post('comentario/salvar',[ComentarioController::class,'store'])->name('comentario.salvar');

Route::get('categorias/',[CategoriaController::class,'index'])->name('categoria.index');
Route::get('categorias/cadastrar',[CategoriaController::class,'create'])->name('categoria.cadastrar');
Route::post('categoria/salvar',[CategoriaController::class,'store'])->name('categoria.store');
Route::get('categoria/visualizar/{id}',[CategoriaController::class,'show'])->name('categoria.show');
Route::get('categoria/editar/{id}',[CategoriaController::class,'edit'])->name('categoria.edit');
Route::put('categoria/atualizar/{id}',[CategoriaController::class,'update'])->name('categoria.update');
Route::delete('categoria/excluir/{id}',[CategoriaController::class,'destroy'])->name('categoria.destroy');

Route::get('tags/',[TagController::class,'index'])->name('tag.index');
Route::get('tag/cadastrar',[TagController::class,'create'])->name('tag.cadastrar');
Route::post('tag/salvar',[TagController::class,'store'])->name('tag.store');
Route::get('tag/visualizar/{id}',[TagController::class,'show'])->name('tag.show');
Route::get('tag/editar/{id}',[TagController::class,'edit'])->name('tag.edit');
Route::put('tag/atualizar/{id}',[TagController::class,'update'])->name('tag.update');
Route::delete('tag/excluir/{id}',[TagController::class,'destroy'])->name('tag.destroy');
