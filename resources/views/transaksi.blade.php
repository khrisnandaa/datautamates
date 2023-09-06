@extends('layouts.header')

@section('content')
    <div class="col-md-9 mb-2">
        <div class="row">

            <!-- table barang -->
            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header bg-green">
                        <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Transaksi</b></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-sm dt-responsive nowrap" id="table_barang"
                            width="100%">
                            <thead class="thead-green">
                                <tr>
                                    <th>No</th>
                                    <th>No Referensi</th>
                                    <th>Harga</th>
                                    <th>Produk</th>
                                    <th>Quantity</th>
                                    <th>Jumlah Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->reference_no }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->namprod }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->payment_amount }}</td>
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
