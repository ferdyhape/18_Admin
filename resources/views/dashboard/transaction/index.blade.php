@extends('dashboard.layouts.main')
@section('title', 'Transaction')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card border-0 shadow mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between py-auto">
                    <p class="my-auto">Transaction List</p>
                    <div class="btn btn-primary btn-sm px-4 border-0 shadow-sm" data-toggle="modal"
                        data-target="#modalCreateTransaction">Add</div>
                </div>
                <div class="modal fade" id="modalCreateTransaction" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">New Transaction</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control mb-3 @error('quantity') is-invalid @enderror"
                                            type="number" name="quantity" placeholder="Quantity">
                                        @error('quantity')
                                            <div class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control mb-3 @error('sub_price') is-invalid @enderror"
                                            type="number" name="sub_price" placeholder="Sub Price">
                                        @error('sub_price')
                                            <div class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control mb-3 @error('price') is-invalid @enderror" type="number"
                                            name="price" placeholder="Price" disabled>
                                        @error('price')
                                            <div class="form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm shadow-sm" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">Cancel</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm shadow-sm">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                        <div class="btn btn-sm btn-primary btn-icon shadow-sm"><i
                                                class="fa-solid fa-download"></i> Download</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quantityInput = document.querySelector('input[name="quantity"]');
            var subPriceInput = document.querySelector('input[name="sub_price"]');
            var priceInput = document.querySelector('input[name="price"]');

            quantityInput.addEventListener('input', calculateValuePrice);
            subPriceInput.addEventListener('input', calculateValuePrice);

            function calculateValuePrice() {
                var quantity = parseFloat(quantityInput.value);
                var subPrice = parseFloat(subPriceInput.value);

                if (!isNaN(quantity) && !isNaN(subPrice)) {
                    var valuePrice = quantity * subPrice;
                    // Convert the float value to an integer
                    priceInput.value = parseInt(valuePrice);
                } else {
                    priceInput.value = '';
                }
            }
        });
    </script>
@endsection
