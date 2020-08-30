<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    public $customer;

    public $payment;

    public $order;

    public function __construct($customer, $payment, $order){
        $this->customer = $customer;
        $this->payment = $payment;
        $this->order = $order;
    }

    public function view(): View
    {
        return view('exports.order', [
            "order" => $this->order,
            "payment" => $this->payment,
            "customer" => $this->customer,
        ]);
    }
}
