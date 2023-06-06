<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use App\Http\Livewire\Admin\Kledingbestelling;

class OrderExport implements FromCollection
{
    public function collection(): \Illuminate\Support\Collection
    {
        $bestelling = new Kledingbestelling();

        return new \Illuminate\Support\Collection([
            ['bestelID','Product', 'Maat', 'Naam', 'Aantal', 'TotaalPrijs'],
            $bestelling->getOrders(),
        ]);
    }
}
