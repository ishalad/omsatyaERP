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
                            {{ $title }} [Compliant No : {{ $complaint->id }}]
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
                        <form action="{{ route('complaints.update', ['complaint' => $complaint->id]) }}" method="POST"
                            id="complaint-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="firm_id" value="{{ App\Models\Firm::first()->id }}">
                            <input type="hidden" name="year_id" value="{{ App\Models\Year::first()->id }}">
                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="input-Date" class="form-label">Date</label>
                                    <input type="date" name="date" value="{{ $complaint->date ?? date('Y-m-d') }}"
                                        class="form-control" placeholder="yy/mm/dd">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputBill" class="col-form-label">Time</label>
                                    <input type="time" name="time" value="{{ $complaint->time ?? date('H:i') }}"
                                        class="form-control">
                                </div>

                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="inputSale" class="col-form-label">Party Name</label> <i
                                        class="text-danger">*</i>
                                    {{-- <input type="text" id="inputSale" class="form-control" /> --}}
                                    <select class="form-control" name="party_id" id="party_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\Party::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($complaint->party_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="form-group col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="inputComplain" class="col-form-label">Product</label> <i
                                        class="text-danger">*</i>
                                    <select type="text" id="sales_entry_id" name="sales_entry_id" class="form-control">
                                        <option value="">Choose a Option</option>
                                        @foreach ($sales_entries as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $complaint->sales_entry_id ? 'selected' : '' }}>
                                                {{ $item->product->name . ' - ' . $item->serial_no . ' - ' . $item->mc_no }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-1">

                                <div class="form-group col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Complaint Type</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="complaint_type_id" id="complaint_type_id">
                                        <option value="">Choose a Option</option>
                                        @foreach (App\Models\ComplaintType::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($complaint->complaint_type_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputParty" class="col-form-label">Service Type</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="service_type_id" id="service_type_id">
                                        <option value="">Choose a Service Type</option>
                                        @foreach (App\Models\ServiceType::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($complaint->service_type_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-4 col-sm-12">
                                    <label for="inputStatus" class="col-form-label">Status</label> <i
                                        class="text-danger">*</i>
                                    <select class="form-control" name="status_id" id="status_id">
                                        <option value="">Choose a Product</option>
                                        @foreach (App\Models\Status::all() as $item)
                                            <option value="{{ $item->id }}"
                                                @if ($complaint->status_id == $item->id) selected @endif>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-1">
                                <div class="form-group col-xl-6 col-lg-6 col-md-8 col-sm-12">
                                    <label for="inputRemark" class="col-form-label">Remark</label>
                                    <textarea type="text" id="remark" class="form-control" name="remarks" aria-describedby="nameHelpInline"> {{ $complaint->remarks }} </textarea>
                                </div>

                            </div>

                            <div class="collapse-wpr my-3">
                                <div
                                    class=" p-3 header-secondary row client-name-wpr bg-primary-transparent d-flex align-items-center gap-1">
                                    <div class="form-check form-check-md form-switch">
                                        <input class="form-check-input" type="checkbox" id="switch-md" role="checkbox"
                                            data-bs-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false"
                                            aria-controls="multiCollapseExample1" name="engineer_select">
                                        <h5 class="px-4 mb-0" for="switch-md">Engineer Select</h5>
                                    </div>
                                </div>
                                {{-- @dd($complaint->engineer_id) --}}
                                <div class="row my-3">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputParty" class="col-form-label">Engineer</label>
                                                    <select class="form-control" name="engineer_id" id="engineer_id">
                                                        <option value="">Choose a Engineer</option>
                                                        @foreach (App\Models\Engineer::all() as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($complaint->engineer_id == $item->id) selected @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputJointengg" class="col-form-label">Actual
                                                        Complain</label>
                                                    <select class="form-control" name="engineer_complaint_id"
                                                        id="engineer_complaint_id">
                                                        <option value="">Choose a Option</option>
                                                        @foreach (App\Models\ComplaintType::all() as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ($complaint->engineer_complaint_id == $item->id) selected @endif>
                                                                {{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputDate" class="col-form-label">Engineer In Date</label>
                                                    <input type="date" class="form-control" placeholder="yy/mm/dd"
                                                        name="engineer_in_date" id="engineer_in_date"
                                                        value="{{ $complaint->engineer_in_date ?? date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputshort" class="col-form-label">Engineer In
                                                        Time</label>
                                                    <input type="time" class="form-control" placeholder="hh:mm"
                                                        name="engineer_in_time" id="engineer_in_time"
                                                        value="{{ $complaint->engineer_in_time ?? date('H:i') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputDate" class="col-form-label">Engineer Out
                                                        Date</label>
                                                    <input type="date" class="form-control" placeholder="yy/mm/dd"
                                                        id="engineer_out_date" name="engineer_out_date"
                                                        value="{{ $complaint->engineer_out_date ?? date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputshort" class="col-form-label">Engineer out
                                                        Time</label>
                                                    <input type="time" class="form-control" id="engineer_out_time"
                                                        name="engineer_out_time"
                                                        value="{{ $complaint->engineer_out_time ?? date('H:i') }}">
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 mb-1">
                                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                    <label for="inputJointengg" class="col-form-label">Joint
                                                        Engineer</label>
                                                    <select class="form-control" name="jointengg[]" id="jointengg"
                                                        multiple>
                                                        <option value="">Choose a Option</option>
                                                        @foreach (App\Models\Engineer::all() as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if ( isset($complaint->jointengg) && in_array($item->id, $complaint->jointengg)) selected @endif>
                                                                {{ $item->name }}
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


    <script type="text/javascript">
        $(document).ready(function() {
            
            $("#switch-md").on("change", function() {
                this.setAttribute("checked", true);
            });
            var engineer_id = '{{ $complaint->engineer_id ?? 0 }}';
            if (engineer_id != 0) {
                $("#switch-md").trigger("click");
            }
            $('#party_id').on('change', function() {
                var party = $(this).val();
                var $products = $('#sales_entry_id');

                $.ajax({
                    type: "GET",
                    url: "{{ route('party-products') }}",
                    data: {
                        'id': party
                    },
                    success: function(data) {
                        console.log(data.length, data);
                        $products.empty();
                        $products.append('<option selected disabled>Select Product</option>');
                        $.each(data, function(key, value) {
                            $products.append('<option value="' + value
                                .id + '">' + value.product.name + '- ' + value
                                .serial_no + '- ' + value.mc_no + '</option>');
                        })
                        $('#sales_entry_id').select2({
                            placeholder: 'Select an option'
                        });
                    }
                })

            });

            $('#sales_entry_id').select2({
                placeholder: 'Select an option'
            });
            $('#party_id').select2({
                placeholder: 'Select an option'
            });
            // $('#product_id').select2({
            //     placeholder: 'Select an option'
            // });
            $('#complaint_type_id').select2({
                placeholder: 'Select an option'
            });
            $('#service_type_id').select2({
                placeholder: 'Select an option'
            });
            $('#status_id').select2({
                placeholder: 'Select an option'
            });
            $('#engineer_id').select2({
                placeholder: 'Select an option'
            });
            $('#joint_engineer_id').select2({
                placeholder: 'Select an option'
            });
            $('#engineer_complaint_id').select2({
                placeholder: 'Select an option'
            });
            $('#jointengg').select2({
                placeholder: 'Select an option'
            });


            $("#complaint-form").validate({
                rules: {
                    date: {
                        required: true,
                    },
                    time: {
                        required: true,
                    },
                    sales_entry_id: {
                        required: true
                    },
                    party_id: {
                        required: true
                    },
                    // product_id: {
                    //     required: true
                    // },
                    complaint_type_id: {
                        required: true
                    },
                    service_type_id: {
                        required: true
                    },
                    status_id: {
                        required: true
                    },
                },
                messages: {
                    date: {
                        required: "Please enter the date",
                        date: "Please enter a valid date"
                    },
                    time: {
                        required: "Please enter the time",
                        time: "Please enter a valid time"
                    },
                    sales_entry_id: {
                        required: "Please select a complain number"
                    },
                    party_id: {
                        required: "Please select a party name"
                    },
                    product_id: {
                        required: "Please select a product"
                    },
                    complaint_type_id: {
                        required: "Please select a complaint type"
                    },
                    service_type_id: {
                        required: "Please select a service type"
                    },
                    status_id: {
                        required: "Please select a status"
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
