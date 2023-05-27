@extends('dashboard.layouts.main')
@section('title', 'Customer')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Partner List</h1> --}}

        <!-- DataTales Example -->
        <div class="card border-0 shadow mb-4">
            <div class="card-header">
                <p class="mb-0">Customer List</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Faker\Factory as Faker;
                                
                                $faker = Faker::create('id_ID');
                                $customers = [];
                                for ($i = 1; $i <= 100; $i++) {
                                    $status = ['Active', 'Banned'];
                                
                                    $customers[] = [
                                        'email' => $faker->email,
                                        'username' => $faker->username,
                                        'status' => $status[array_rand($status)],
                                    ];
                                }
                            @endphp
                            @foreach ($customers as $customer)
                                <tr>
                                    <td class="text-center"><img src="{{ asset('assets/dashboard/img/dummyavatar.png') }}"
                                            class="rounded-circle" style="width: 60%" alt="Avatar" /></td>
                                    <td>{{ $customer['email'] }}</td>
                                    <td>{{ $customer['username'] }}</td>
                                    <td>{{ $customer['status'] }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <div class="btn btn-sm btn-primary btn-icon shadow-sm"><i
                                                    class="fa-solid fa-circle-info"></i></div>
                                            <div class="btn btn-sm btn-warning btn-icon shadow-sm"><i
                                                    class="fa-solid fa-pen-to-square"></i>
                                            </div>
                                            <div class="btn btn-sm btn-danger btn-icon shadow-sm"><i
                                                    class="fa-solid fa-trash"></i></div>
                                        </div>
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
