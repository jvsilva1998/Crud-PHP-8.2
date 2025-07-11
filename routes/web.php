<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// Rota para a listagem de produtos na raiz '/'
Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');

// Rota para mostrar o formulário de criação de produtos
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');

// Rota para armazenar os dados do produto
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

// Rota para exibir os detalhes de um produto
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show');

// Rota para mostrar o formulário de edição de um produto
Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');

// Rota para atualizar os dados de um produto
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');

// Rota para excluir um produto
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

// Rota para exportar os produtos
Route::get('/exportar', [ProdutoController::class, 'exportar'])->name('produtos.exportar');

// Rota para importar os produtos
Route::post('/importar', [ProdutoController::class, 'importar'])->name('produtos.importar');

// Rota para gerar o relatório em PDF
Route::get('/produtos/relatorio/pdf', [ProdutoController::class, 'relatorioPdf'])->name('produtos.relatorio.pdf');
