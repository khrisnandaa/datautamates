<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $product = DB::table('product')
            ->orderBy('id', 'DESC')
            ->get();
        return view('product', compact(['product']));
    }

    public function store()
    {
        $this->validate(request(), [
            'nama_barang' => 'required|string',
            'harga_barang' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required',
        ]);

        $data = new Product;
        $data->name = request('nama_barang');
        $data->stock = request('stok');
        $data->price = request('harga_barang');
        $data->description = request('deskripsi');
        $data->save();

        return redirect()->route('product.index');
    }

    public function remove(Request $request)
    {
        // print_r($id);
        DB::table('product')
            ->where('id', '=', $request->id)
            ->delete();

        return redirect()->route('product.index');
    }

    public function editform($id)
    {
        $data = DB::table('product')
            ->where('id', '=', $id)
            ->get();

        return view('editproduct', compact(['data']));
    }

    public function edit(Request $request)
    {
        // print_r($id);
        DB::table('product')
            ->where('id', '=', $request->id)
            ->update([
                'name' => $request->nama_barang,
                'price' => $request->harga_barang,
                'stock' => $request->stok,
                'description' => $request->deskripsi,
            ]);

        return redirect()->route('product.index');
    }
}
