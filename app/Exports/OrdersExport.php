<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class OrdersExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function __construct(int $transfer_id)
    {
        $this->transfer_id = $transfer_id;
    }

    public function query()
    {
        $orders = Order::query();
        
        return $orders->where('transfer_id', $this->transfer_id);
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
