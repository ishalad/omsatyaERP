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
                    </div>
                    <div class="prism-toggle d-flex gap-3">
                        <div class="header-element profile-1">
                            <a href="{{ route('users.create') }}" class="btn btn-md btn-primary "> Create </a>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-nowrap table-bordered" id="user-table">
                            <thead class="table-secondary bg-gray">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="15%">Name</th>
                                    <th width="15%">Email</th>
                                    <th width="15%">Role</th>
                                    <th width="10%">Action</th>
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
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}
{{-- <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> --}}

{{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}
<script type="text/javascript">
    $(document).ready(function() {

            window.deleteUser = function(user) {
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
                            url: "{{ route('users.destroy', ':user') }}".replace(':user',
                                user),
                            data: {
                                '_token': '{{ csrf_token() }}',
                            },
                            success: function(data) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "". data.responseJSON.message,
                                    icon: "success"
                                });
                                if (data.success) {
                                    window.location.reload();
                                }
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                Swal.fire({
                                    title: "Not Deleted!",
                                    text: data.responseJSON.message,
                                    icon: "error"
                                });
                            }
                        });

                    }
                });
            }


            var table = $('#user-table').DataTable({
               processing: true,
               serverSide: true,
               searching: false,
               // dom: 'Bfrtip',
               // buttons: [
               //     'copy', 'csv', 'excel', 'pdf', 'print'
               // ],
               ajax: {
                   url: '{{ route('users.index') }}',
                   type: 'GET',
               },
               columns: [
                        { data: 'DT_RowIndex', name: 'No' },
                        { data: 'name', name: 'name' },
                        { data: 'email', name: 'email' },
                        { data: 'roles', name: 'roles', title: 'Role' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ]
            });
        });
</script>
@endSection