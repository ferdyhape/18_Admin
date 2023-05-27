@extends('dashboard.layouts.main')
@section('title', 'Partner')
@section('content')
    <div class="container px-3">
        @php
            use Faker\Factory as Faker;
            
            $faker = Faker::create('id_ID');
            $partners = [];
            
            for ($i = 1; $i <= 10; $i++) {
                $randomAdminId = random_int(1, 5);
                $randomCountOrder = random_int(50, 200);
                $accountStatus = ['Confirmed', 'Unconfirmed'];
            
                $username = $faker->username; // Generate a username
                $email = $faker->email; // Generate an email
            
                $partners[] = [
                    'username' => $username,
                    'email' => $email,
                    'randomCountOrder' => $randomCountOrder,
                    'randomAdminId' => $randomAdminId,
                    'accountStatus' => $accountStatus[array_rand($accountStatus)],
                ];
            }
        @endphp

        <!-- Search -->
        <div class="input-group mb-4 d-flex justify-content-end">
            <div class="form-outline">
                <input type="search" id="searchInput" class="form-control" placeholder="Search" />
            </div>
            <button type="button" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>

        <div class="px-3 d-flex gap-3 justify-content-center flex-wrap" id="partnerCards">
            @foreach ($partners as $partner)
                <div class="card border-0 shadow-sm rounded col-xl-2 text-center p-3">
                    <div class="text-center my-2">
                        <img src="{{ asset('assets/dashboard/img/dummyimage.png') }}" class="rounded-circle"
                            style="width: 60%" alt="Avatar" />
                    </div>
                    <p class="my-1">
                        @if ($partner['accountStatus'] == 'Confirmed')
                            <a href="#"
                                class="badge px-2 py-1 text-white bg-success">{{ $partner['accountStatus'] }}</a>
                        @else
                            <a href="#"
                                class="badge px-2 py-1 text-white bg-danger">{{ $partner['accountStatus'] }}</a>
                        @endif
                    </p>
                    <p class="mb-2">{{ $partner['username'] }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <div class="btn btn-sm btn-primary btn-icon shadow-sm"><i class="fa-solid fa-circle-info"></i></div>
                        <div class="btn btn-sm btn-warning btn-icon shadow-sm"><i class="fa-solid fa-pen-to-square"></i>
                        </div>
                        <div class="btn btn-sm btn-danger btn-icon shadow-sm"><i class="fa-solid fa-trash"></i></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Get the search input element
        const searchInput = document.getElementById('searchInput');

        // Add an event listener for the 'keyup' event
        searchInput.addEventListener('keyup', function() {
            const searchValue = searchInput.value.toLowerCase();
            const cards = document.querySelectorAll('.card');

            cards.forEach(function(card) {
                const username = card.querySelector('.mb-2').textContent.toLowerCase();

                // Show or hide the card based on the search value
                if (username.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
@endsection
