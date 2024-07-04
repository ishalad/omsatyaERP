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
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header Close -->


    <!-- Start:: row-4 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">{{ $title }}</div>
                    <div class="prism-toggle d-flex gap-3">
                        <div class="header-element profile-1">
                            <!-- Start::header-link|dropdown-toggle -->
                            
                            <a href="{{route('parties.create')}}" class="btn btn-md btn-primary "> Create </a>
                        </div>
                        
                        
                    </div>
                    
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

{{-- <script src="{{asset('js\datatables.js')}}"></script> --}}
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script type="text/javascript">
        $(document).ready(function() {
            
            window.deleteParty = function(party) {
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
                        url: "{{ route('parties.destroy', ':party') }}".replace(':party', party),
                        data:{
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
        });
    </script>
@endsection