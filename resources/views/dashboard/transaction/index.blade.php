@extends('dashboard.layouts.main')
@section('title', 'Transaction')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card border-0 shadow mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between py-auto">
                    <p class="my-auto">Transaction List</p>
                    <div class="btn btn-primary btn-sm px-4 border-0 shadow-sm">Add</div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Sub Price</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Faker\Factory as Faker;
                                use Carbon\Carbon;
                                
                                $faker = Faker::create('id_ID');
                                $transactions = [];
                                for ($i = 1; $i <= 100; $i++) {
                                    $created_at = Carbon::now();
                                    $quantity = random_int(1, 30);
                                    $subPrice = 20000;
                                
                                    $transactions[] = [
                                        'created_at' => $created_at,
                                        'quantity' => $quantity,
                                        'subPrice' => $subPrice,
                                        'price' => $quantity * $subPrice,
                                    ];
                                }
                            @endphp
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction['created_at'] }}</td>
                                    <td>{{ $transaction['quantity'] }}</td>
                                    <td>@toRP($transaction['subPrice'])</td>
                                    <td>@toRP($transaction['price'])</td>
                                    <td class="text-center">
                                        <div class="btn btn-sm btn-primary btn-icon shadow-sm">Detail</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
