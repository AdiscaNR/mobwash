<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="mt-5 d-sm-flex align-items-center justify-content-center mb-4 text-center">
                        <h1 class="h3 mb-0 text-gray-800">Order Form</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('trx.store') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control" id="date" value="{{ $tx->date }}" required readonly>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name">Client Name</label>
                                                    <input type="text" name="client_name" class="form-control" id="name" placeholder="Client Name" value="{{ $tx->client->name }}" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Address</label>
                                                    <textarea class="form-control" name="client_address" id="exampleFormControlTextarea1" rows="1" placeholder="Address" required readonly>{{ $tx->client->address }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="client_phone" class="form-control" id="phone" placeholder="08xxx" value="{{ $tx->client->phone }}" required readonly>
                                                </div>
                                            </div>
                                            <div class="col">
                                                @php
                                                    $crewNames = $tx->crews->pluck('name')->join(', ');
                                                @endphp

                                                <div class="form-group">
                                                    <label for="name">Crew Name</label>
                                                    <input type="text" name="client_name" class="form-control" id="name" placeholder="Crew Name" value="{{ $crewNames }}" required readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="checkin">Check In</label>
                                                    <input type="time" name="checkin" class="form-control" id="checkin" placeholder="Check In" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="checkout">Check Out</label>
                                                    <input type="time" name="checkout" class="form-control" id="checkout" placeholder="Check Out" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">SERVICE DESCRIPTION</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">PRICE</th>
                                                <th scope="col">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>
                                                    <input type="number" name="qty" class="form-control" style="width: 100px;" id="qty">
                                                </td>
                                                <td>
                                                    <input type="text" name="price" class="form-control" style="width: 250px;" id="price" oninput="this.value = formatNumber(this.value)"
       onkeypress="return isNumberKey(event)">
                                                </td> 
                                                <td>
                                                    <input type="text" name="total" class="form-control" style="width: 250px;" id="total" readonly>
                                                </td> 
                                                </tr>
                                                <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td>@fat</td>
                                                </tr>
                                                <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                                <td>@twitter</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" name="client_name" class="form-control" id="name" placeholder="Service Description" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" name="client_name" class="form-control" id="name" placeholder="QTY" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <input type="text" name="client_name" class="form-control" id="name" placeholder="Crew Name" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger" id="remove_attach">Remove</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <button class="btn btn-primary" id="add_service">Add Service</button>
                                            </div>
                                        </div>

                                        <hr />
                                        
                                        <fieldset class="form-group row">
                                            <legend class="col-form-label col-sm-2 float-sm-left pt-0">Payment</legend>
                                            <div class="col-sm-10">
                                                @foreach ($payments as $p)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" id="gridRadios{{$p->id}}" value="{{$p->id}}" required>
                                                    <label class="form-check-label" for="gridRadios1">
                                                    {{$p->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </fieldset>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
<script>
    // Fungsi untuk memformat angka dengan titik pemisah ribuan
    function formatNumber(value) {
        // Hapus karakter non-angka
        value = value.replace(/\D/g, '');
        
        // Format ulang menjadi ribuan
        return value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Fungsi untuk memastikan hanya angka yang bisa diinput
    function isNumberKey(evt) {
        let charCode = evt.which ? evt.which : evt.keyCode;
        // Hanya izinkan angka (0-9) dan backspace
        if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
        return true;
    }
</script>

</body>

</html>