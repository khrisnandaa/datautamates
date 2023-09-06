@extends('layouts.header')

@section('content')
    <div class="col-md-9 mb-2">
        <div class="row">

            <!-- barang -->
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header bg-green">
                        <div class="card-tittle text-white"><i class="fa fa-shopping-cart"></i> <b>Tambah Barang</b></div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                {{-- <div class="form-group col-md-6">
                                    <label><b>Kode Produk</b></label>
                                    @foreach ($idp as $datas)
                                        <?php
                                        $idb = $datas->lastid;
                                        $lastid = (int) substr($idb, 3, 3);
                                        $lastid++;
                                        $idbarang = sprintf('%03s', $lastid);
                                        ?>
                                        <input type="text" name="id_barang" class="form-control"
                                            value=<?php echo $idbarang; ?> readonly>
                                    @endforeach
                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label><b>Nama Produk</b></label>
                                    <input type="text" name="nama_barang" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Harga Produk</b></label>
                                    <input type="number" name="harga_barang" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Stok</b></label>
                                    <input type="text" name="stok" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><b>Deskripsi</b></label>
                                    <div class="input-group">
                                        <input type="text" name="deskripsi" class="form-control" required>
                                        <div class="input-group-append">
                                            <button name="add_barang" value="simpan" class="btn btn-green" type="submit">
                                                <i class="fa fa-plus mr-2"></i>Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end barang -->

            <!-- table barang -->
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header bg-green">
                        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Barang</b></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang"
                            width="100%">
                            <thead class="thead-green">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs"
                                                href={{ route('product.editform', ['id' => $item->id]) }}>
                                                <i class="fa fa-pen fa-xs"></i> Edit</a>
                                            <a class="btn btn-danger btn-xs"
                                                href={{ route('product.remove', ['id' => $item->id]) }}
                                                onclick="javascript:return confirm('Hapus Data Barang ?');"
                                                style="text-decoration:none;">
                                                <i class="fa fa-trash fa-xs"></i> Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div><!-- end row col-md-9 -->
    </div>
@endsection
