
<!-- resources/views/complaints/report.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div class="">
            <div class="">
                <nav>
                    <ol class="breadcrumb mb-1 mb-md-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">{{ $title }}</div>
                    <div class="header-element">
                        <form id="search-form" >
                            <!-- Add your custom search fields here -->
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="complaint_no">Complaint No</label>
                                    <input type="text" name="complaint_no" id="complaint_no" placeholder="complaint no" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="mobile_no">Mobile No</label>
                                    <input type="text" name="phone_no" id="phone_no" placeholder="mobile no"  class="form-control">
                                </div>
                                <div class="col">
                                    <label for="name">Owner Name</label>
                                    <Select name="owner_id" class="form-control" id="owner_id">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\Owner::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <label for="name">Party Name</label>
                                    <Select name="party_id" id="party_id" class="form-control">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\Party::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <label for="name">Engineer</label>
                                    <Select name="engineer_id" id="engineer_id" class="form-control">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\Engineer::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <label for="name">Status</label>
                                    <Select name="status_id" id="status_id" class="form-control">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\Status::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <label for="name">Service Type</label>
                                    <Select name="service_type_id" id="service_type_id" class="form-control">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\ServiceType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <label for="name">Complaint Type</label>
                                    <Select name="complaint_type_id" id="complaint_type_id" class="form-control">
                                        <option value="" selected>All</option>
                                        @foreach (App\Models\ComplaintType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </Select>
                                </div>
                                <div class="col">
                                    <button type="button" id="search-button" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="prism-toggle d-flex gap-3">
                        <div class="header-element profile-1">
                            <a href="{{ route('complaints.create') }}" class="btn btn-md btn-primary "> Create </a>
                        </div>

                    </div> --}}

                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered" id="complaint-table">
                            <thead class="table-secondary bg-gray">
                                <tr>
                                    <th>No.</th>
                                    <th>date</th>
                                    <th>Time</th>
                                    <th>Complaint No</th>
                                    <th>Party</th>
                                    <th>Address</th>
                                    <th>Mobile No.</th>
                                    <th>Area</th>
                                    <th>Product</th>
                                    <th>Product Serial</th>
                                    <th>Mc no.</th>
                                    <th>Complaint Type.</th>
                                    <th>Service Type.</th>
                                    <th>Status</th>
                                    <th>Engineer Name</th>
                                    <th>Days</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                   
                    {{-- {{ $dataTable->table() }} --}}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#complaint-table').DataTable({
               processing: true,
               serverSide: true,
               // dom: 'Bfrtip',
               buttons: [
                   'copy', 'csv', 'excel', 'pdf', 'print'
               ],
                search:{
                    smart: false
                },
                searchinput: false,
               ajax: {
                   url: '{{ route('complaints.report') }}',
                   type: 'GET',
                   data: function(d) {
                       d.complaint_no = $('#complaint_no').val();
                       d.phone_no = $('#phone_no').val();
                       d.owner_id = $('#owner_id').val();
                       d.party_id = $('#party_id').val();
                       d.engineer_id = $('#engineer_id').val();
                       d.status_id = $('#status_id').val();
                       d.service_type_id = $('#service_type_id').val();
                       d.complaint_type_id = $('#complaint_type_id').val();
                   }
               },
               columns: [
                        { data: 'DT_RowIndex', name: 'No', searchable:false },
                        { data: 'date', name: 'date' , searchable:false},
                        { data: 'time', name: 'time' , searchable:false},
                        { data: 'complaint_no', name: 'complaint_no' , searchable:false},
                        { data: 'party', name: 'party' , searchable:false},
                        { data: 'address', name: 'address', title: 'Address', searchable:false },
                        { data: 'mobile_no', name: 'mobile_no', title: 'Mobile Number', searchable:false },
                        { data: 'area', name: 'area' , searchable:false},
                        { data: 'product', name: 'product', searchable:false },
                        { data: 'product_serial', name: 'product_serial', title: 'serial no' , searchable:false},
                        { data: 'mc_no', name: 'mc_no', title: 'Machine No', searchable:false },
                        { data: 'complaint_type', name: 'complaint_type', searchable:false },
                        { data: 'service_type', name: 'service_type', searchable:false },
                        { data: 'status', name: 'status', searchable:false },
                        { data: 'engineer', name: 'engineer' , searchable:false},
                        { data: 'days', name: 'days', searchable:false },
                    ]
            });
            $('#search-button').click(function() {
                table.draw();
            })
            $('#complaint-table_filter').hide();
    });
</script>
@endsection
