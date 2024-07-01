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

    <!-- Start:: row-1 -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header justify-content-between">
                    <div class="card-title">
                        {{ $title }}
                    </div>
                </div>
                <form action="{{ route('parties.store') }}" method="POST">
                    @csrf
                    {{-- @include('partials.alert') --}}
                    <div class="card-body gy-4">
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="input-disabled" class="form-label">Firm Id</label>
                                <input type="hidden" id="input-disabled" class="form-control"
                                    placeholder="Firm Id" disabled="" value="{{ App\Models\Firm::first()->id}}">
                            </div>
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputName" class="col-form-label">Party Name</label>
                                <input type="text" id="inputName" class="form-control"
                                    aria-describedby="nameHelpInline" name="name">
                            </div>
                            <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputshort" class="col-form-label">short code</label>
                                <input type="number" id="inputshort" class="form-control"
                                    aria-describedby="nameHelpInline">
                            </div> -->
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-textarea" class="col-form-label">Address</label>
                                <textarea type="text" class="form-control" id="input-textarea"
                                    placeholder="Address..." name="address"></textarea>
                            </div>
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputshort" class="col-form-label">City</label>
                                <select class="form-control" data-trigger 
                                    id="city" name="city_id">
                                    <option value="">Choose a city</option>
                                    @foreach (App\Models\City::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputState" class="col-form-label">State</label>
                                <select class="form-control" data-trigger 
                                    id="state" name="state_id">
                                    <option value="">Choose a State</option>
                                    @foreach (App\Models\State::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputshort" class="col-form-label">Mobile no.</label>
                                <input type="number" id="inputshort" class="form-control"
                                    aria-describedby="nameHelpInline" name="phone_no">
                            </div>
    
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputGst" class="col-form-label">Gst no.</label>
                                <input type="number" id="inputGst" class="form-control"
                                    aria-describedby="nameHelpInline" name="gst_no">
                            </div>
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputReg" class="col-form-label">Reg. no.</label>
                                <input type="number" id="inputReg" class="form-control"
                                    aria-describedby="nameHelpInline">
                            </div>
    
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputArea" class="col-form-label">Area</label>
                                <select class="form-control" data-trigger 
                                    id="area" name="area_id">
                                    <option value="">Choose a State</option>
                                    @foreach (App\Models\Area::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                        </div>
    
                        <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputPan" class="col-form-label">Cont.Person</label>
                                <select class="form-control" data-trigger 
                                id="contact_person_id" name="contact_person_id">
                                    <option value="">Choose a State</option>
                                    @foreach (App\Models\ContactPerson::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputOwner" class="col-form-label">Owner Name</label>
                                <select class="form-control" data-trigger 
                                id="owner_id" name="owner_id">
                                    <option value="">Choose a State</option>
                                    @foreach (App\Models\Owner::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                            </select>
                            </div>
                        </div>
                        <!-- <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputaccount" class="col-form-label">Bank account</label>
                                <input type="number" id="inputaccount" class="form-control"
                                    aria-describedby="nameHelpInline">
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputIfsc" class="col-form-label">Bank Ifsc</label>
                                <input type="text" id="inputIfsc" class="form-control"
                                    aria-describedby="nameHelpInline">
                            </div>
    
                        </div> -->
    
                        <div class="row mb-2">
                            <!-- ======submit=button==== -->
                            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 mb-2">
                                <div class="row justify-content-end mt-3">
                                    {{-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                        <button class="btn btn-outline-success w-100">Add more</button>
                                    </div>
    
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                        <button class="btn btn-outline-light w-100">Reset</button>
                                    </div> --}}
    
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2 ">
                                        <button class="btn btn-primary w-100" type="submit">Submit</button>
                                    </div>
    
    
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- End:: row-1 -->

</div>
@endSection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\PartyCreateRequest') !!}

@endpush