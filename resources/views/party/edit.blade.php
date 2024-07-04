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
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('parties.update' , ['party' => $party]) }}" method="POST" id="party-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control"
                        placeholder="Firm Id"  value="{{$party->firm_id ?? App\Models\Firm::first()->id}}" name="firm_id">
                    {{-- @include('partials.alert') --}}
                    <div class="card-body gy-4">
                        {{-- <div class="row mb-2">
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="input-disabled" class="form-label">Firm Id</label>
                            </div>
                        </div> --}}
    
                        <div class="row mb-2">
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="inputName" class="col-form-label">Party Name</label>
                                <input type="text" id="inputName" class="form-control"
                                    aria-describedby="nameHelpInline" name="name" value="{{ $party->name ?? old('name') }}">
                            </div>
                            <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputshort" class="col-form-label">short code</label>
                                <input type="number" id="inputshort" class="form-control"
                                    aria-describedby="nameHelpInline">
                            </div> -->
                        </div>
    
                        <div class="row mb-2">
                            <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <label for="input-textarea" class="col-form-label">Address</label>
                                <textarea type="text" class="form-control" id="input-textarea"
                                    placeholder="Address..." name="address">{{ $party->address ?? old('address')}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-2">
                        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <label for="inputName" class="col-form-label">Pincode</label>
                            <input type="number"  class="form-control" maxlength="6"
                                aria-describedby="nameHelpInline" name="pincode" value="{{ $party->pincode ?? old('pincode') }}">
                        </div>
                        <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                            <label for="inputshort" class="col-form-label">Mobile no.</label>
                            <input type="tel" id="inputshort" class="form-control"
                                aria-describedby="nameHelpInline" name="phone_no" value="{{ $party->phone_no ?? old('phone_no') }}">
                        </div>
                        </div>
                        <div class="row mb-2">
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputshort" class="col-form-label">City</label>
                                <select class="form-control" data-trigger 
                                    id="city" name="city_id">
                                    <option value="">Choose a Option</option>
                                    @foreach (App\Models\City::all() as $item)
                                    <option value="{{ $item->id }}" @if($party->city_id == $item->id || old('city_id') == $item->id ) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputState" class="col-form-label">State</label>
                                <select class="form-control" data-trigger 
                                    id="state" name="state_id">
                                    <option value="">Choose a Option</option>
                                    @foreach (App\Models\State::all() as $item)
                                    <option value="{{ $item->id }}" @if( $party->state_id == $item->id || old('state_id') == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-2">
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputArea" class="col-form-label">Area</label>
                                <select class="form-control" data-trigger 
                                    id="area" name="area_id">
                                    <option value="">Choose a Option</option>
                                    @foreach (App\Models\Area::all() as $item)
                                    <option value="{{ $item->id }}" @if($party->area_id == $item->id || old('area_id') == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                           
    
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputGst" class="col-form-label">Gst no.</label>
                                <input type="text" id="inputGst" class="form-control"
                                    aria-describedby="nameHelpInline" name="gst_no" value="{{ $party->gst_no ?? old('gst_no') }}">
                            </div>
                        </div>
    
                        <div class="row mb-2">
    
    
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputPan" class="col-form-label">Cont.Person</label>
                                <select class="form-control" data-trigger 
                                id="contact_person_id" name="contact_person_id">
                                    <option value="">Choose a Option</option>
                                    @foreach (App\Models\ContactPerson::all() as $item)
                                        <option value="{{ $item->id }}" @if( $party->contact_person_id == $item->id || old('contact_person_id') == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                <label for="inputOwner" class="col-form-label">Owner Name</label>
                                <select class="form-control" data-trigger 
                                id="owner_id" name="owner_id">
                                    <option value="">Choose a Option</option>
                                    @foreach (App\Models\Owner::all() as $item)
                                        <option value="{{ $item->id }}" @if( $party->owner_id == $item->id || old('owner_id') == $item->id) selected @endif>{{ $item->name }}</option>
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
@section('scripts')
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
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
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });

</script>


@endSection