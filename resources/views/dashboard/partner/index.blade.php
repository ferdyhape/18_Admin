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
                $countOrder = random_int(50, 200);
                $accountStatus = ['Confirmed', 'Unconfirmed'];
            
                $username = $faker->username; // Generate a username
                $email = $faker->email; // Generate an email
                $address = $faker->address; // Generate an address
                $latitude = rand(-90, 90); // Generate a random latitude between -90 and 90
                $longitude = rand(-180, 180); // Generate a random longitude between -180 and 180
            
                $partners[] = [
                    'id' => $i,
                    'username' => $username,
                    'email' => $email,
                    'countOrder' => $countOrder,
                    'randomAdminId' => $randomAdminId,
                    'accountStatus' => $accountStatus[array_rand($accountStatus)],
                    'coordinate' => "$latitude, $longitude",
                    'address' => $address,
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
                        <a href=" {{ url('dashboard/partner/detail') }} "
                            class="btn btn-sm btn-primary btn-icon shadow-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="#" class="btn btn-sm btn-warning btn-icon shadow-sm" data-toggle="modal"
                            data-target="#modalEditPartner"
                            onclick="populateModalEdit('{{ $partner['username'] }}', '{{ $partner['email'] }}', '{{ $partner['coordinate'] }}')">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-danger btn-icon shadow-sm"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="modalEditPartner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Partner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="editUsername" class="form-control mb-3 @error('username') is-invalid @enderror"
                                type="text" name="username" placeholder="Username">
                            @error('username')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="editEmail" class="form-control mb-3 @error('email') is-invalid @enderror"
                                type="email" name="email" placeholder="Email">
                            @error('email')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="editCoordinate" class="form-control mb-3 @error('coordinate') is-invalid @enderror"
                                type="text" name="coordinate" placeholder="Coordinate">
                            @error('coordinate')
                                <div class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm shadow-sm" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">Cancel</span>
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm shadow-sm">Edit</button>
                    </div>
                </form>
            </div>
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

        function populateModalEdit(username, email, coordinate) {
            document.getElementById('editUsername').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editCoordinate').value = coordinate;
        }
    </script>
@endsection
