<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TransactionFormController extends Controller
{
    public function index(){
        $data = array('title' => 'Home');

        return view('transaction-form', $data);
    }
}
