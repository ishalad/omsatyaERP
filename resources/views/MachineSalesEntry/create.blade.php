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
                        <form action="{{ route('machine-sales.store') }}" method="POST">
                            @csrf

                        <input type="hidden" class="form-control" placeholder="Firm Id"  value="{{ App\Models\Firm::first()->id}}" name="firm_id">
                        
                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputBill" class="col-form-label">Bill No.</label>
                                    <input type="text" id="inputBill" class="form-control" name="bill_no" />
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="input-Date" class="form-label">Date</label>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd" name="date">
                                </div>
                            </div>

                            <div class="row mb-1">
                                <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputParty" class="col-form-label">Party Name</label>
                                <input type="text" id="inputParty" class="form-control" />
                            </div> -->

                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Party Name</label>
                                    <select class="form-control" data-trigger name="choices-single-groups"
                                        id="choices-single-groups" name="party_id">
                                        <option value="">Choose a Party Name</option>
                                           @foreach (App\Models\Party::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputProduct" class="col-form-label">Product</label>
                                <input type="text" id="inputProduct" class="form-control" />
                            </div> -->


                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Product Name</label>
                                    <select class="form-control" data-trigger name="choices-single-groups"
                                        id="choices-single-groups">
                                        <option value="">Choose a Product</option>
                                        @foreach (App\Models\Product::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputProdsr" class="col-form-label">Order No.</label>
                                    <input type="text" id="inputProdsr" class="form-control" name="order_no" />
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputM/C" class="col-form-label">M/c No.</label>
                                    <input type="text" id="inputM/C" class="form-control" name="mc_no" />
                                </div>
                            </div>

                            <div class="row mb-1">

                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputExpiry" class="col-form-label">Install Date</label>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd" name="install_date">
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputExpiry" class="col-form-label">Expiry Date</label>
                                    <input type="date" class="form-control " placeholder="yy/mm/dd" name="service_expiry_date">
                                </div>


                            </div>

                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Service Type</label>
                                    <select class="form-control" data-trigger name="choices-single-groups"
                                        id="choices-single-groups" name="service_type_id ">
                                        <option value="">Choose a Service Type</option>
                                        @foreach (App\Models\ServiceType::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Free Service</label>
                                    <select class="form-control" data-trigger name="choices-single-groups"
                                        id="choices-single-groups" name="free_service">
                                        <option value="">Choose a Free Service</option>
                                        <optgroup label="Free Service">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </optgroup>
                                    </select>
                                </div>

                            </div>

                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputOrder" class="col-form-label">Order No.</label>
                                    <input type="text" id="inputOrder" class="form-control" name="order_no" />
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputOrder" class="col-form-label">Remark </label>
                                    <input type="text" id="inputOrder" class="form-control" name="remark" />
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Fitting Engg.</label>
                                    <select class="form-control" data-trigger name="mic_fitting_engineer_id"
                                        id="choices-single-groups">
                                        <option value="">Choose a Fitting Engg.</option>
                                        @foreach(App\Models\Engineer::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Delv. Person</label>
                                    <select class="form-control" data-trigger name="delivery_engineer_id"
                                        id="choices-single-groups">
                                        <option value="">Choose a Delv. Person</option>
                                        @foreach(App\Models\Engineer::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="row mb-1">
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputImage" class="col-form-label">Image</label>
                                    <input type="file" id="inputImage" class="form-control" name="image" />
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Map Location</label>
                                    <input type="text" id="inputParty" class="form-control" name="map_url" />
                                </div>

                            </div>

                            <div class="row mb-1">
                                <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputTag" class="col-form-label">Tag</label>
                                <input type="text" id="inputTag" class="form-control" />
                            </div> -->
                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputActive" class="col-form-label">Is Active</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="switch-sm">
                                        <label class="form-check-label" for="switch-sm">Default</label>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-2">
                                    <div class="row justify-content-end mt-3">
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                            <button class="btn btn-outline-light w-100">Reset</button>
                                        </div>

                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                            <button class="btn btn-primary w-100">Submit</button>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>


@endSection
