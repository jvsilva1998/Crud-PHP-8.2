<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdutosExport implements FromCollection, WithHeadings
{
    protected $produtos;

    public function __construct($produtos)
    {
        $this->produtos = $produtos;
    }

    public function collection()
    {
        return $this->produtos;
       
    }

    public function headings(): array
    {
        return ['id','nome', 'descricao', 'preco']; 
    }
}
