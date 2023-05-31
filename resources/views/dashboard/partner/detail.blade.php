@extends('dashboard.layouts.main')
@section('title', 'Partner')
@section('content')
    <div class="container">
        <div class="card border-0 shadow-sm mb-3">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('assets/dashboard/img/dummyimage.png') }}" class="img-fluid rounded-start custom-img"
                        alt="image-partner">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-0">fitttttriiis.89</h5>
                        <div class="my-2">
                            @foreach (['fa-envelope', 'fa-location-dot', 'fa-house', 'fa-screwdriver-wrench'] as $icon)
                                <p class="btn btn-sm btn-primary rounded text-white border-0 my-1"><i
                                        class="fa-solid {{ $icon }}"></i>
                                    @switch($icon)
                                        @case('fa-envelope')
                                            fitriiiisssiiiihh@gmail.com
                                        @break

                                        @case('fa-location-dot')
                                            22°17′N 114°10′E, Malang, Indonesia
                                        @break

                                        @case('fa-house')
                                            Jl. Pisang kipas A1, Lawokwaru, Malang
                                        @break

                                        @case('fa-screwdriver-wrench')
                                            222
                                        @break
                                    @endswitch
                                </p>
                            @endforeach
                        </div>

                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur, facilis repudiandae
                            inventore minima necessitatibus illum deserunt porro ad aperiam ipsum assumenda aliquam modi
                            ullam error!</p>
                        <hr>
                        <p class="card-text"><small class="text-muted"><b>Confimed</b> by Admin <b>Ferdy</b></small></p>
                        <div class="d-flex justify-content-start gap-3 my-3">
                            <a href="" class="btn btn-sm btn-warning btn-icon shadow-sm px-3"><i
                                    class="fa-solid fa-pen-to-square"></i>
                                Edit</a>
                            <a href="" class="btn btn-sm btn-danger btn-icon shadow-sm px-3"><i
                                    class="fa-solid fa-trash"></i>
                                Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid">
            <a href="{{ url()->previous() }}"
                class="btn border-0 shadow-sm text-decoration-none btn-primary text-center">Back</a>
        </div>
    </div>
@endsection
<style>
    #content>div>div>div>div.col-md-8>div>p {
        margin: 0;
    }

    .custom-img {}
</style>
