@extends('layouts/master')

@section('content')
<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">New Transaction</h1>
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
                                            <input type="date" name="date" class="form-control" id="date" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Client Name</label>
                                            <input type="text" name="client_name" class="form-control" id="name" placeholder="Client Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Address</label>
                                            <textarea class="form-control" name="client_address" id="exampleFormControlTextarea1" rows="3" placeholder="Address" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="client_phone" class="form-control" id="phone" placeholder="08xxx" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="crew">Crew Name</label>
                                            <select multiple name="crew[]" class="form-control" id="crew" required>
                                                @foreach ($crew as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <hr />

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

@endsection
@section('page-script')
<script>
    $(document).ready(function() {
        $('#crew').select2({
            placeholder: "Select Crew",
            allowClear: true
        });
    });
</script>
@endsection