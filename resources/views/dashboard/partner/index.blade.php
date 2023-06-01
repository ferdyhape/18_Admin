@extends('dashboard.layouts.main')
@section('title', 'Partner')
@section('content')
    <div class="container px-3">
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
                        @if ($partner['avatar'])
                            <img src="http://localhost:5000/api/admin/partner/avatar/{{ $partner['id'] }}"
                                class="rounded-circle" style="width: 60%" alt="Avatar" />
                        @else
                            <img src="{{ asset('assets/dashboard/img/dummyavatar.png') }}" class="rounded-circle"
                                style="width: 60%" alt="Avatar" />
                        @endif
                    </div>
                    <p class="my-1">
                        @if ($partner['account_status'] == 1)
                            <a href="#" class="badge px-2 py-1 text-white bg-success">Confirmed</a>
                        @else
                            <a href="#" class="badge px-2 py-1 text-white bg-danger">Unconfirmed</a>
                        @endif
                    </p>
                    <p class="mb-2" style="height: 50px;">{{ $partner['partner_name'] }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href=" {{ url('dashboard/partner/' . $partner['id']) }} "
                            class="btn btn-sm btn-primary btn-icon shadow-sm"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="#" class="btn btn-sm btn-warning btn-icon shadow-sm" data-toggle="modal"
                            data-target="#modalEditPartner" onclick="populateModalEdit('{{ json_encode($partner) }}')">
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
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Partner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="http://localhost:5000/api/admin/partner" method="post">
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="editPartnerName">Partner Name</label>
                                    <input id="editPartnerName"
                                        class="form-control @error('partner_name') is-invalid @enderror" type="text"
                                        name="partner_name" placeholder="Partner Name">
                                    @error('partner_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editEmail">Email</label>
                                    <input id="editEmail" class="form-control @error('email') is-invalid @enderror"
                                        type="email" name="email" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editCoordinate">Coordinate</label>
                                    <input id="editCoordinate"
                                        class="form-control @error('coordinate') is-invalid @enderror" type="text"
                                        name="coordinate" placeholder="Coordinate">
                                    @error('coordinate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editAddress">Address</label>
                                    <input id="editAddress" class="form-control @error('address') is-invalid @enderror"
                                        type="text" name="address" placeholder="Address">
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="editCountOrder">Count Order</label>
                                    <input id="editCountOrder"
                                        class="form-control @error('count_order') is-invalid @enderror" type="number"
                                        name="count_order" placeholder="Count Order">
                                    @error('count_order')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editUserId">User ID</label>
                                    <input id="editUserId" class="form-control @error('user_id') is-invalid @enderror"
                                        type="number" name="user_id" placeholder="User ID">
                                    @error('user_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editAccountStatus">Account Status</label>
                                    <select id="editAccountStatus"
                                        class="form-control @error('account_status') is-invalid @enderror"
                                        name="account_status">
                                        <option value="" disabled selected>Account Status</option>
                                        <option value="1">Confirmed</option>
                                        <option value="0">Unconfirmed</option>
                                    </select>
                                    @error('account_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editOperationalStatus">Operational Status</label>
                                    <select id="editOperationalStatus"
                                        class="form-control @error('operational_status') is-invalid @enderror"
                                        name="operational_status">
                                        <option value="" disabled selected>Operational Status</option>
                                        <option value="1">Open</option>
                                        <option value="0">Closed</option>
                                    </select>
                                    @error('operational_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editDescription">Description</label>
                            <textarea id="editDescription" class="form-control @error('description') is-invalid @enderror" name="description"
                                placeholder="Description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
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
                const partner_name = card.querySelector('.mb-2').textContent.toLowerCase();

                // Show or hide the card based on the search value
                if (partner_name.includes(searchValue)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        function populateModalEdit(partnerJson) {
            const partner = JSON.parse(partnerJson);

            // now you can access properties of the partner object like this:

            document.getElementById('editPartnerName').value = partner.partner_name;
            document.getElementById('editEmail').value = partner.email;
            document.getElementById('editCoordinate').value = partner.coordinate;
            document.getElementById('editAddress').value = partner.address;
            document.getElementById('editDescription').value = partner.description;
            document.getElementById('editCountOrder').value = partner.count_order;
            document.getElementById('editUserId').value = partner.user_id;
            document.getElementById('editAccountStatus').value = partner.account_status;
            document.getElementById('editOperationalStatus').value = partner.operational_status;

            // do the rest of your logic here...
        }
    </script>
@endsection
