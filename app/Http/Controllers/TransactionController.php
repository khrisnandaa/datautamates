<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('transaction as t')
            ->leftJoin("product as p", "p.id", "=", "t.product_id")
            ->get(['t.*','p.name as namprod']);
        return view('transaksi', compact(['data']));
    }
}
