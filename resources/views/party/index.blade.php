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
                    {{-- <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
                                    <div class="dataTables_length" id="responsiveDataTable_length">
                                        <label class="d-flex align-items-center gap-1">Show
                                            <select name="responsiveDataTable_length w-50"
                                                aria-controls="responsiveDataTable"
                                                class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row justify-content-end">

                                <div class="col-sm-12 col-md-6">
                                    <div id="responsiveDataTable_filter" class="dataTables_filter">
                                        <label><input type="search" class="form-control form-control-sm"
                                                placeholder="Search..."
                                                aria-controls="responsiveDataTable"></label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div> --}}

                     {{-- <div class="table-responsive">
                        <table class="table text-nowrap table-bordered">
                            <thead class="table-secondary bg-gray">
                                <tr>
                                    <th>Firm Id</th>
                                    <th>Name</th>
                                    <th>Short code</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Address</th>
                                    <th>Mobile no.</th>
                                    <th>Area</th>
                                    <th>Gst no.</th>
                                    <th>Reg. no.</th>
                                    <th>Pan no.</th>
                                    <th>Bank Name</th>
                                    <th>Bank Account</th>
                                    <th>Bank Ifsc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15"> <a href="javascript:void(0);"
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill"><i
                                                    class="ri-download-2-line"></i></a> <a
                                                href="javascript:void(0);"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i
                                                    class="ri-edit-line"></i></a> <a
                                                href="javascript:void(0);"
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill"><i
                                                    class="ri-delete-bin-line"></i></a> </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                            <a href="firm-add.html"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                            <a href="firm-add.html"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>



                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                            <a href="firm-add.html"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                            <a href="firm-add.html"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#F-182</td>
                                    <th>Harshrath M. Patel</th>
                                    <td>245846</td>
                                    <td>Surat</td>
                                    <td>Gujarat</td>
                                    <td>394210,udhana, surat</td>
                                    <td>9999884581</td>
                                    <td>Pal</td>
                                    <td>09AAACH7409R1ZZ</td>
                                    <td>29GGGGG1314R9Z6</td>
                                    <td>ABCTY1234D</td>
                                    <td>HDFC</td>
                                    <td>35367790017020</td>
                                    <td>HDFC0000035</td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-success-transparent rounded-pill">
                                                <i class="ri-download-2-line"></i>
                                            </a>
                                            <a href="firm-add.html"
                                                class="btn btn-icon btn-sm btn-info-transparent rounded-pill">
                                                <i class="ri-edit-line"></i>
                                            </a>
                                            <a href=""
                                                class="btn btn-icon btn-sm btn-danger-transparent rounded-pill">
                                                <i class="ri-delete-bin-line"></i></a>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div> --}}

                    {{-- <div class="pagenation-footer mt-3">
                        <div class="row ">
                            <div class="col-md-12 col-sm-12 justify-content-end">
                                <div class="pagenation-num d-flex justify-content-end gap-5 align-content-center align-items-center">
                                    <div role="status" aria-live="polite" class="gridjs-summary d-flex align-items-center gap-1"
                                    title="Page 1 of 1">Showing <b>1</b> to <b>5</b> of <b>5</b> results
                                    </div>
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
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