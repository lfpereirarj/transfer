<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nome',
            'Email',
            'Telefone',
            'Data',
            'Horário',
            'Quantidade',
            'Preço',
            'Preço Total',
            'Embarque',
            'Destino',
            'Cidade',
            'Forma de Pagamento',
            'Status',
            'Criado em',
            'Atualizado em'

            
        ];

       
    }
}
