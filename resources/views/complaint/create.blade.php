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
        <!-- Start:: row-1 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="card-body gy-4">

                        <form action="{{ route('complaints.store') }}" method="POST" id="complaint-form">
                            @csrf

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="input-Date" class="form-label">Date</label>
                                    <input type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control"
                                        placeholder="yy/mm/dd">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputBill" class="col-form-label">Time</label>
                                    <input type="time" name="time" value="{{ date('H:i') }}" class="form-control">
                                </div>

                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputComplain" class="col-form-label">Complain No.</label>
                                    <select type="text" id="sales_entry_id" name="sales_entry_id" class="form-control">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\MachineSalesEntry::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->id }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputSale" class="col-form-label">Party Name</label>
                                    {{-- <input type="text" id="inputSale" class="form-control" /> --}}
                                    <select class="form-control" data-trigger name="party_id" id="party_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\Party::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputProduct" class="col-form-label">Product </label>
                                    <select class="form-control" data-trigger name="product_id" id="product_id">
                                        <option value="">Choose a Product</option>
                                        @foreach (App\Models\Product::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Complaint Type</label>
                                    <select class="form-control" data-trigger name="complaint_type_id"
                                        id="complaint_type_id ">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\ComplaintType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Service Type</label>
                                    <select class="form-control" data-trigger name="service_type_id" id="service_type_id">
                                        <option value="">Choose a Service Type</option>
                                        @foreach (App\Models\ServiceType::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputStatus" class="col-form-label">Status</label>
                                    <select class="form-control" data-trigger name="status_id" id="status_id">
                                        <option value="">Choose a Product</option>
                                        @foreach (App\Models\Status::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-1">
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="inputRemark" class="col-form-label">Remark</label>
                                    <input type="text" id="inputJointengg" class="form-control"
                                        aria-describedby="nameHelpInline">
                                </div>

                            </div>

                            <div class="collapse-wpr my-3">
                                <div
                                    class=" p-3 header-secondary row client-name-wpr bg-primary-transparent d-flex align-items-center gap-1">
                                    <div class="form-check form-check-md form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="switch-md"
                                            data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false"
                                            aria-controls="multiCollapseExample1">
                                        <h5 class="px-4 mb-0" for="switch-md">Engineer Select</h5>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputParty" class="col-form-label">Engineer</label>
                                                    <select class="form-control" data-trigger name="engineer_id"
                                                        id="engineer_id">
                                                        <option value="">Choose a Engineer</option>
                                                        @foreach (App\Models\Engineer::all() as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputJointengg" class="col-form-label">Actual
                                                        Complain</label>
                                                    <select class="form-control" data-trigger name="complaint_type_id"
                                                        id="complaint_type_id">
                                                        <option value="">Choose a Option</option>
                                                        @foreach (App\Models\ComplaintType::all() as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputshort" class="col-form-label">Engineer In
                                                        Time</label>
                                                    <input type="time" class="form-control" placeholder="hh:mm"
                                                        name="engineer_in_time" id="engineer_in_time">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputDate" class="col-form-label">Engineer In Date</label>
                                                    <input type="date" class="form-control" placeholder="yy/mm/dd"
                                                        name="engineer_in_date" id="engineer_in_date">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputDate" class="col-form-label">Engineer Out
                                                        Date</label>
                                                    <input type="date" class="form-control" placeholder="yy/mm/dd"
                                                        id="engineer_out_date" name="engineer_out_date">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputshort" class="col-form-label">Engineer out
                                                        Time</label>
                                                    <input type="time" class="form-control" id="engineer_out_time"
                                                        name="engineer_out_time">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputJointengg" class="col-form-label">Joint
                                                        Engineer</label>
                                                    <select class="form-control" data-trigger name="joint_engineer_id[]"
                                                        id="joint_engineer_id" multiple>
                                                        <option value="">Choose a Option</option>
                                                        @foreach (App\Models\Engineer::all() as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <!-- ======submit=button==== -->
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 mb-2 justify-content-end">
                                        <div class="row justify-content-end mt-3">
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-2 ">
                                                <button class="btn btn-outline-light w-100">Reset</button>
                                            </div>

                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-2 ">
                                                <button class="btn btn-primary w-100">Submit</button>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
        <!-- End:: row-1 -->

    </div>
@endSection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#party-form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    address: {
                        required: true,
                        minlength: 10
                    },
                    pincode: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    phone_no: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    city_id: {
                        required: true
                    },
                    state_id: {
                        required: true
                    },
                    area_id: {
                        required: true
                    },
                    gst_no: {
                        required: true,
                        minlength: 15,
                        maxlength: 15
                    },
                    contact_person_id: {
                        required: true
                    },
                    owner_id: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter the party name",
                        minlength: "The party name must be at least 3 characters long"
                    },
                    address: {
                        required: "Please enter the address",
                        minlength: "The address must be at least 10 characters long"
                    },
                    pincode: {
                        required: "Please enter the pincode",
                        digits: "The pincode must be numeric",
                        minlength: "The pincode must be 6 digits long",
                        maxlength: "The pincode must be 6 digits long"
                    },
                    phone_no: {
                        required: "Please enter the mobile number",
                        digits: "The mobile number must be numeric",
                        minlength: "The mobile number must be 10 digits long",
                        maxlength: "The mobile number must be 10 digits long"
                    },
                    city_id: {
                        required: "Please select a city"
                    },
                    state_id: {
                        required: "Please select a state"
                    },
                    area_id: {
                        required: "Please select an area"
                    },
                    gst_no: {
                        required: "Please enter the GST number",
                        minlength: "The GST number must be 15 characters long",
                        maxlength: "The GST number must be 15 characters long"
                    },
                    contact_person_id: {
                        required: "Please select a contact person"
                    },
                    owner_id: {
                        required: "Please select an owner"
                    }
                },
                errorElement: 'div',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>


@endSection
