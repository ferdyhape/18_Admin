@extends('dashboard.layouts.main')
@section('title', 'Banner')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <h1 class="h3 mb-2 text-gray-800">Partner List</h1> --}}

        <!-- DataTales Example -->
        <div class="card border-0 shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between py-auto">
                    <p class="my-auto">Banner List</p>
                    <div class="btn btn-primary btn-sm px-4 border-0 shadow-sm" data-toggle="modal"
                        data-target="#modalCreateBanner">Add</div>
                </div>
                <div class="modal fade" id="modalCreateBanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">New Banner</h4>
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
                                <th style="width: 70%">Banner Image</th>
                                <th>Created By Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Faker\Factory as Faker;
                                
                                $faker = Faker::create('id_ID');
                                $banners = [];
                                for ($i = 1; $i <= 5; $i++) {
                                    $admin_name = ['Ferdy', 'Gupron'];
                                
                                    $banners[] = [
                                        'admin_name' => $admin_name[array_rand($admin_name)],
                                    ];
                                }
                            @endphp
                            @foreach ($banners as $banner)
                                <tr>
                                    <td class="text-center"><img
                                            src="{{ asset('assets/dashboard/img/dummybanner.png') }}"style="width: 60%"
                                            alt="Avatar" /></td>
                                    <td>{{ $banner['admin_name'] }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
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
