<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProdutosExport; 
use App\Imports\ProdutosImport;
use Maatwebsite\Excel\Facades\Excel;

class ProdutoController extends Controller
{
    /**
     * Exibe a lista de produtos com busca e paginação.
     */
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        $query = Produto::query();

        if ($busca) {
            $query->where('nome', 'like', "%{$busca}%");
        }

        $produtos = $query->orderBy('id', 'desc')->paginate(5);

        return view('produtos.index', compact('produtos', 'busca'));
    }

    /**
     * Exibe o relatório completo dos produtos (sem filtros).
     */
    public function relatorioPdf()
    {
        $produtos = Produto::orderBy('id', 'desc')->get();
        $total = $produtos->sum('preco');

        $pdf = Pdf::loadView('produtos.relatorio_pdf', compact('produtos', 'total'));

        return $pdf->download('relatorio_produtos.pdf');
    }

    /**
     * Mostra o formulário para criar um novo produto.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Armazena um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser positivo.'
        ]);

        Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Exibe um produto específico.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Mostra o formulário de edição de um produto.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Atualiza o produto no banco de dados.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric' => 'O preço deve ser um número.',
            'preco.min' => 'O preço deve ser positivo.'
        ]);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove o produto do banco de dados.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
    
    public function exportar(Request $request)
    {
        $formato = $request->input('formato', 'xlsx');
        
        $produtos = Produto::all();
        
        return Excel::download(new ProdutosExport($produtos), "produtos.{$formato}");
    }

    public function importar(Request $request)
    {
        $request->validate([
            'arquivo' => 'required|mimes:xlsx,xls,csv|max:2048', // Validando tipo e tamanho
        ]);

        $file = $request->file('arquivo');

        try {
            Excel::import(new ProdutosImport, $file);

            return redirect()->route('produtos.index')->with('success', 'Produtos importados com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao importar o arquivo: ' . $e->getMessage());
        }
    }
}
