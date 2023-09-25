<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;

class TransactionListController extends Controller
{
    public function index()
    {
        $items = Transaksi::all();
        
        return view('transaction-list', ['items' => $items]);
    }
}
