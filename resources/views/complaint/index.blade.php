@extends('layouts.app')
@section('title', $title)
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
                                        <label for="from_date">From Date</label>
                                        <input type="date" name="from_date" placeholder="Date" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="to_date">To Date</label>
                                        <input type="date" name="to_date" placeholder="To Date Name"  class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="to_date">Engineer Name</label>
                                        <input type="text" name="engineer_name" placeholder="Engineer Name"  class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control">
                                            @foreach (App\Models\Status::all() as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Add more fields as needed -->
                                </div>
                                <button type="button" id="search-button" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                        <div class="prism-toggle d-flex gap-3">
                            <div class="header-element profile-1">
                                <a href="{{ route('complaints.create') }}" class="btn btn-md btn-primary "> Create </a>
                            </div>

                        </div>

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
                                        <th>Product</th>
                                        <th>Mc no.</th>
                                        <th>Party Name</th>
                                        <th>Party Mobile No.</th>
                                        <th>Complaint Type.</th>
                                        <th>Service Type.</th>
                                        <th>Status</th>
                                        <th>Engineer Name</th>
                                        <th>Action</th>
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

    <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item Parts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('complaints.itemPartStore') }}">
                        @csrf
                        <input type="hidden" name="complaint_id" value="" id="complaint_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Part Name</label>
                            <select name="part_id" class="form-control" id="part_id">
                                @foreach (App\Models\ItemPart::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Remark:</label>
                            <textarea class="form-control" id="remark" name="remark"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Urgent</label>
                            <input type="checkbox" name="remark" id="remark" class="form-check-input" value="0">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> --}}

    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
    <script type="text/javascript">
        $(document).ready(function() {

            var table = $('#complaint-table').DataTable({
               processing: true,
               serverSide: true,
               // dom: 'Bfrtip',
               // buttons: [
               //     'copy', 'csv', 'excel', 'pdf', 'print'
               // ],
               data: {
                    engineer_name : $('input[name="engineer_name"]').val(),
               },
               ajax: {
                   url: '{{ route('complaints.index') }}',
                   type: 'GET',
                   data: function(d) {
                       d.engineer_name = $('input[name="engineer_name"]').val();
                       d.from_date = $('input[name="from_date"]').val();
                       d.to_date = $('input[name="to_date"]').val();
                       d.status = $('select[name="status"]').val();
                   }
               },
               columns: [
                        { data: 'DT_RowIndex', name: 'No' },
                        { data: 'date', name: 'date' },
                        { data: 'time', name: 'time' },
                        { data: 'id', name: 'complaint_no' },
                        { data: 'product.name', name: 'product.name' },
                        { data: 'sales_entry.mc_no', name: 'sales_entry.mc_no', title: 'Machine No' },
                        { data: 'sales_entry.party.name', name: 'sales_entry.party.name', title: 'party name' },
                        { data: 'sales_entry.party.phone_no', name: 'sales_entry.party.phone_no', title: 'party Mobile Number' },
                        { data: 'complaint_type.name', name: 'engineer_name' },
                        { data: 'service_type.name', name: 'service_type.name' },
                        { data: 'status', name: 'status' },
                        { data: 'engineer', name: 'engineer' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
            });
            $('#search-button').click(function() {
                table.draw();
            })

            

            window.deleteParty = function(complaint) {
                // event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('complaints.destroy', ':complaint') }}".replace(
                                ':complaint', complaint),
                            data: {
                                '_token': '{{ csrf_token() }}',
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                if (data.success) {
                                    window.location.reload();
                                }
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });

                    }
                });
            }
            window.addItemPart = function(complaint) {
                var addItem = new bootstrap.Modal(document.getElementById('addItem'), {
                    keyboard: false
                })

                addItem.show();
                $('#complaint_id').val(complaint);
            }



            // var table = $('#complaint-table').DataTable();
            // $('#search-button').on('click', function() {
            // // Destroy the existing DataTable instance
            //     if ($.fn.DataTable.isDataTable('#complaint-table')) {
            //         $('#complaint-table').DataTable().destroy();
            //     }

            //     // Reinitialize DataTable with new parameters
            //     table = $('#complaint-table').DataTable({
            //         processing: true,
            //         serverSide: true,
            //         ajax: {
            //             url: "{{ route('complaints.index') }}",
            //             data: function(d) {
            //                 d.engineer = $("input[name=engineer]").val();
            //                 d.status = $("input[name=status]").val();
            //                 d.area = $("input[name=area]").val();
            //                 d.is_assigned = $("select[name=is_assigned]").val();
            //                 d.engineer_in = $("input[name=engineer_in]").val();
            //                 d.assigned = $("input[name=assigned]").val();
            //                 d.out = $("input[name=out]").val();
            //             }
            //         },
            //         columns: [
            //             { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            //             { data: 'date', name: 'date' },
            //             { data: 'time', name: 'time' },
            //             { data: 'complaint_no', name: 'complaint_no' },
            //             { data: 'product.name', name: 'product.name' },
            //             { data: 'sales_entry.mc_no', name: 'sales_entry.mc_no', title: 'Machine No' },
            //             { data: 'sales_entry.party.name', name: 'sales_entry.party.name', title: 'Party Name' },
            //             { data: 'sales_entry.party.phone_no', name: 'sales_entry.party.phone_no', title: 'Party Mobile Number' },
            //             { data: 'complaint_type.name', name: 'complaint_type.name' },
            //             { data: 'service_type.name', name: 'service_type.name' },
            //             { data: 'status.name', name: 'status.name' },
            //             { data: 'engineer_name', name: 'engineer_name' },
            //             { data: 'action', name: 'action', orderable: false, searchable: false }
            //         ]
            //     });
            // });
        });
    </script>
@endSection
