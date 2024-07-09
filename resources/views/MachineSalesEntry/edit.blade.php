@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="p-3 header-secondary row client-name-wpr  bg-primary-transparent">
        <div class="col">
            <div class="d-flex">
                <!-- <h6>Petey Cruiser</h6> -->
                <h6 class="mb-0"> <strong class="mb-0 px-2"> Petey Cruiser </strong> 29/06/24 </h6>
                <!-- <a class=" d-flex client-name" href="javascript:void(0);"> <span class=""></span>  </a> -->
            </div>
        </div>
    </div>

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
                        <div class="card-title">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="card-body gy-4">


                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('machine-sales.update', ['id' => $machine->id]) }}" method="POST"
                            id="machine-sales-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" placeholder="Firm Id"
                                value="{{ $machine->firm_id ?? App\Models\Firm::first()->id }}" name="firm_id">
                            <input type="hidden" class="form-control" placeholder="year_id"
                                value="{{ $machine->year_id ?? App\Models\Year::first()->id }}" name="year_id">
                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputBill" class="col-form-label">Bill No.</label> <i
                                        class="text-danger">*</i>
                                    <input type="text" id="inputBill" class="form-control" name="bill_no"
                                        value="{{ $machine->bill_no ?? old('bill_no') }}" />
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="input-Date" class="form-label">Date</label> <i class="text-danger">*</i>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd" name="date"
                                        value="{{ $machine->date ?? old('date') }}">
                                </div>
                            </div>

                            <div class="row mb-1">
                                <!-- <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                                                                <label for="inputParty" class="col-form-label">Party Name</label>
                                                                                                <input type="text" id="inputParty" class="form-control" />
                                                                                            </div> -->

                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Party Name</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="party_id" id="party_id">
                                        <option value="">Choose a Party Name</option>
                                        @foreach (App\Models\Party::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($machine->party_id == $item->id || old('party_id') == $item->id) selected @endif
                                                data-value={{ json_encode($item) }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                                                                <label for="inputProduct" class="col-form-label">Product</label>
                                                                                                <input type="text" id="inputProduct" class="form-control" />
                                                                                            </div> -->


                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Product Name</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="product_id" id="product_id">
                                        <option value="">Choose a Product</option>
                                        @foreach (App\Models\Product::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($machine->product_id == $item->id || old('product_id') == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputProdsr" class="col-form-label">Serial No.</label> <i
                                        class="text-danger">*</i>
                                    <input type="text" id="inputProdsr" class="form-control" name="serial_no"
                                        value="{{ $machine->serial_no ?? old('serial_no') }}" />
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputM/C" class="col-form-label">M/c No.</label> <i
                                        class="text-danger">*</i>
                                    <input type="text" id="inputM/C" class="form-control" name="mc_no"
                                        value="{{ $machine->mc_no ?? old('mc_no') }}" />
                                </div>
                            </div>

                            <div class="row mb-1">

                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputExpiry" class="col-form-label">Install Date</label> <i
                                        class="text-danger">*</i>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd"
                                        name="install_date" value="{{ $machine->install_date ?? old('install_date') }}">
                                </div>

                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputExpiry" class="col-form-label">Expiry Date</label> <i
                                        class="text-danger">*</i>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd"
                                        name="service_expiry_date"
                                        value="{{ $machine->service_expiry_date ?? old('service_expiry_date') }}">
                                </div>


                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Free Service</label>
                                    <input type="text" name="free_service" id="free_service" class="form-control"
                                        value="{{ $machine->free_service ?? (old('free_service') ?? 0) }}">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Service Type</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="service_type_id" id="service_type_id">
                                        name="service_type_id">
                                        <option value="">Choose a Service Type</option>
                                        @foreach (App\Models\ServiceType::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($machine->service_type_id == $item->id || old('service_type_id') == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputOrder" class="col-form-label">Order No.</label> <i
                                        class="text-danger">*</i>
                                    <input type="text" id="inputOrder" class="form-control" name="order_no"
                                        value="{{ $machine->order_no ?? old('order_no') }}" />
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputOrder" class="col-form-label">Remark </label>
                                    <input type="text" id="inputOrder" class="form-control" name="remarks"
                                        value="{{ $machine->remark ?? old('remark') }}" />
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Fitting Engg.</label>
                                    <select class="form-control" name="mic_fitting_engineer_id"
                                        id="mic_fitting_engineer_id"
                                        value="{{ $machine->mic_fitting_engineer_id ?? old('mic_fitting_engineer_id') }}">
                                        <option value="">Choose a Fitting Engg.</option>
                                        @foreach (App\Models\Engineer::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($machine->mic_fitting_engineer_id == $item->id || old('mic_fitting_engineer_id') == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Delv. Person</label>
                                    <select class="form-control" name="delivery_engineer_id" id="delivery_engineer_id"
                                        value="{{ $machine->delivery_engineer_id ?? old('delivery_engineer_id') }}">
                                        <option value="">Choose a Delv. Person</option>
                                        @foreach (App\Models\Engineer::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($machine->delivery_engineer_id == $item->id || old('delivery_engineer_id') == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputImage" class="col-form-label">Image</label>
                                    <input type="file" id="inputImage" class="form-control" name="image" />
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Map Location</label>
                                    <input type="text" id="inputParty" class="form-control" name="map_url"
                                        value="{{ $machine->map_url ?? old('map_url') }}" />
                                </div>

                            </div>

                            <div class="row mb-1">
                                <!-- <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                                                                                <label for="inputTag" class="col-form-label">Tag</label>
                                                                                                <input type="text" id="inputTag" class="form-control" />
                                                                                            </div> -->
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputActive" class="col-form-label">Is Active</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="switch-sm" name="is_active"
                                            @if ($machine->is_active == 1) checked @endif
                                            value ="{{ $machine->is_active ?? old('is_active') }}">
                                        <label class="form-check-label" for="switch-sm">Default</label>
                                    </div>
                                </div>

                                <div class="form-group col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-2">
                                    <div class="row justify-content-end mt-3">
                                        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                            <button class="btn btn-outline-light w-100" type="reset"
                                                onclick="location.reload()">Reset</button>
                                        </div>

                                        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                            <input type="submit" class="btn btn-primary w-100" value="Submit">
                                        </div>


                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>




    </div>

@endSection
@section('scripts')
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script> --}}
    {{-- {!! JsValidator::formRequest('App\Http\Requests\MachineSalesEntryRequest', '#machine-sales-form'); !!} --}}
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#party_id').select2();

            $('#product_id').select2();

            $('#service_type_id').select2();

            $('#mic_fitting_engineer_id').select2();

            $('#delivery_engineer_id').select2();

            $('#MachineSales-form').validate({
                rules: {
                    bill_no: {
                        required: true,
                        maxlength: 8
                    },
                    date: {
                        required: true,
                        date: true
                    },
                    party_id: {
                        required: true
                    },
                    product_id: {
                        required: true
                    },
                    order_no: {
                        required: true
                    },
                    mc_no: {
                        required: true
                    },
                    install_date: {
                        required: true,
                        date: true
                    },
                    service_expiry_date: {
                        required: true,
                        date: true
                    },
                    service_type_id: {
                        required: true
                    },
                    serial_no: {
                        required: true
                    }
                    free_service: {
                        number: true
                    },
                    remark: {
                        required: true
                    },
                    mic_fitting_engineer_id: {
                        required: true
                    },
                    delivery_engineer_id: {
                        required: true
                    },
                    map_url: {
                        url: true
                    }
                },
                messages: {
                    bill_no: {
                        required: "Please enter the bill number"
                    },
                    date: {
                        required: "Please enter the date",
                        date: "Please enter a valid date"
                    },
                    party_id: {
                        required: "Please select a party"
                    },
                    product_id: {
                        required: "Please select a product"
                    },
                    order_no: {
                        required: "Please enter the order number"
                    },
                    mc_no: {
                        required: "Please enter the machine number"
                    },
                    install_date: {
                        required: "Please enter the installation date",
                        date: "Please enter a valid date"
                    },
                    service_expiry_date: {
                        required: "Please enter the service expiry date",
                        date: "Please enter a valid date"
                    },
                    service_type_id: {
                        required: "Please select a service type"
                    },
                    free_service: {
                        required: "Please select a free service option"
                    },
                    remark: {
                        required: "Please enter a remark"
                    },
                    mic_fitting_engineer_id: {
                        required: "Please select a fitting engineer"
                    },
                    delivery_engineer_id: {
                        required: "Please select a delivery engineer"
                    },
                    map_url: {
                        required: "Please enter the map location URL"
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
        })
    </script>


@endSection
