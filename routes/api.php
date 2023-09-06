<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Transaction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function () {
    return "Hello World!";
});

Route::post('/transaksi', function (Request $request) {

    $quantity = $request->input('quantity');
    $product_id = $request->input('product_id');

    $datax = DB::table('product')->where('id', $product_id)->get();
    // print($data[0]->price);
    $payment_amount = $datax[0]->price * $quantity;

    $headers = array(
        "content-type: application/x-www-form-urlencoded",
        "x-api-key: DATAUTAMA",
    );


    $url = 'https://pay.saebo.id/test-dau/api/v1/transactions';

    // what post fields?
    $fields = array(
        'quantity' => $quantity,
        'price' => $datax[0]->price,
        'payment_amount' => $payment_amount,
    );

    // build the urlencoded data
    $postvars = http_build_query($fields);

    // open connection
    $ch = curl_init();

    // set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // execute post
    $result = curl_exec($ch);

    // close connection
    curl_close($ch);
    // $values = json_decode($result, true);
    $ref = json_decode($result);
    $reference = $ref->data->reference_no;

    // print_r($ref->data->reference_no);

    // $reference = $array['reference_no'];

    // if(!empty($reference)){
    $data = new Transaction();
    $data->reference_no = $reference;
    $data->price = $datax[0]->price;
    $data->quantity = $quantity;
    $data->payment_amount = $payment_amount;
    $data->product_id = $product_id;
    // $data->created_at = 
    $data->save();
    // }

    return "Transaksi Sukses";
});
