<?php

namespace App\Imports;

use App\Models\Produto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdutosImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Produto([
            'nome' => $row['nome'],  // Nome do produto
            'descricao' => $row['descricao'], // Descrição do produto
            'preco' => $row['preco'], // Preço do produto
        ]);
    }
}
