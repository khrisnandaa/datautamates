@extends('layouts.header')

@section('content')
    <div class="col-md-9 mb-2">
        <div class="row">

            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header bg-green">
                        <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Edit Product</b></div>
                    </div>
                    <div class="card-body">
                        @foreach ($data as $datas)
                            <form method="POST" action="{{ route('product.edit', ['id' => $datas->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label><b>Nama Produk</b></label>
                                        <input type="text" name="nama_barang" class="form-control"
                                            value={{ $datas->name }} required>
                        @endforeach
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Harga</b></label>
                        <input type="text" name="harga_barang" class="form-control" value="{{ $datas->price }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Stok</b></label>
                        <input type="number" name="stok" class="form-control" value={{ $datas->stock }} required>
                    </div>
                    <div class="form-group col-md-6">
                        <label><b>Deskripsi</b></label>
                        <div class="input-group">
                            <input type="text" name="deskripsi" class="form-control" value="{{ $datas->description }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-green ml-3" name="update" type="submit">
                                    <i class="fa fa-check mr-2"></i>Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    <!-- end barang -->


    </div><!-- end row col-md-9 -->
    </div>
@endsection
