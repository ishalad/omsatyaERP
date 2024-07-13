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
                    <form action="{{ route('parties.store') }}" method="POST" id="party-form">
                        @csrf
                        <input type="hidden" class="form-control" placeholder="Firm Id"
                            value="{{ App\Models\Firm::first()->id }}" name="firm_id">

                        <div class="card-body gy-4">
                            <div class=" row mb-2">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputName" class="col-form-label">Party Name</label> <i
                                        class="text-danger">*</i>
                                    <input type="text" id="inputName" class="form-control" name="name"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputName" class="col-form-label">Party Email</label>
                                    <input type="email" id="inputName" class="form-control" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-2">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <label for="input-textarea" class="col-form-label">Address</label> <i
                                        class="text-danger">*</i>
                                    <textarea type="text" class="form-control" id="input-textarea" name="address" required>{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-2">

                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="area" class="col-form-label">Area</label><i class="text-danger">*</i>
                                    <select class="form-control" id="area" name="area_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\Area::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputshort" class="col-form-label">Mobile no.</label> <i
                                        class="text-danger">*</i>
                                    <input type="tel" id="inputshort" class="form-control" name="phone_no"
                                        value="{{ old('phone_no') }}">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="other_phone_no" class="col-form-label">Other Phone No.</label>
                                    <input type="tel" id="other_phone_no" class="form-control" name="other_phone_no">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group  col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="city" class="col-form-label">City</label>
                                    <select class="form-control" id="city" name="city_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\City::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('city_id') == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="state" class="col-form-label">State</label>
                                    <select class="form-control" id="state" name="state_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\State::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('state_id') == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputGst" class="col-form-label">Gst no.</label>
                                    <input type="text" id="inputGst" class="form-control" name="gst_no"
                                        value="{{ old('gst_no') }}">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputName" class="col-form-label">Pan number</label>
                                    <input type="text" class="form-control" name="pan_no"
                                        value="{{ old('pan_no') }}">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="contact_person_id" class="col-form-label">Cont.Person</label> <i
                                    class="text-danger">*</i>
                                    <select class="form-control" id="contact_person_id" name="contact_person_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\ContactPerson::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('contact_person_id') == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="owner_id" class="col-form-label">Owner Name</label> <i
                                    class="text-danger">*</i>
                                    <select class="form-control" id="owner_id" name="owner_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\Owner::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if (old('owner_id') == $item->id) selected @endif>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 mb-2">
                                    <div class="row justify-content-end mt-3">
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-2 ">
                                            <input type="reset" class="btn btn-outline-light w-100">
                                            {{-- <button class="btn btn-outline-light w-100">Reset</button> --}}
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 mb-2">
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#city').select2({
                placeholder: 'Select an option'
            });
            $('#state').select2({
                placeholder: 'Select an option'
            });

            $('#contact_person_id').select2({
                placeholder: 'Select an option'
            });

            $('#owner_id').select2({
                placeholder: 'Select an option'
            });

            $('#area').select2({
                placeholder: 'Select an option'
            });

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
                    phone_no: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    area_id: {
                        required: true
                    },
                    gst_no: {
                        minlength: 15,
                        maxlength: 15
                    },
                    pan_no: {
                        minlength: 10,
                        maxlength: 10
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
                    phone_no: {
                        required: "Please enter the mobile number",
                        digits: "The mobile number must be numeric",
                        minlength: "The mobile number must be 10 digits long",
                        maxlength: "The mobile number must be 10 digits long"
                    },
                    area_id: {
                        required: "Please select an area"
                    },
                    gst_no: {
                        required: "Please enter the GST number",
                        minlength: "The GST number must be 15 characters long",
                        maxlength: "The GST number must be 15 characters long"
                    },
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
