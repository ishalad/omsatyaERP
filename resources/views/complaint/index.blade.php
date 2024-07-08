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
                        <div class="prism-toggle d-flex gap-3">
                            <div class="header-element profile-1">
                                <a href="{{ route('complaints.create') }}" class="btn btn-md btn-primary "> Create </a>
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

    <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item Parts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('complaints.itemPartStore') }}">
                        @csrf
                        <input type="hidden" name="complaint_id" value="" id="complaint_id">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Part Name</label>
                            <select name="part_id" class="form-control" id="part_id">
                                @foreach (App\Models\ItemPart::all() as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>

                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Remark:</label>
                            <textarea class="form-control" id="remark" name="remark"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Urgent</label>
                            <input type="checkbox" name="remark" id="remark" class="form-check-input" value="0">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script type="text/javascript">
        $(document).ready(function() {

            window.deleteParty = function(complaint) {
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
                            url: "{{ route('complaints.destroy', ':complaint') }}".replace(
                                ':complaint', complaint),
                            data: {
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
            window.addItemPart = function(complaint) {
                var addItem = new bootstrap.Modal(document.getElementById('addItem'), {
                    keyboard: false
                })

                addItem.show();
                $('#complaint_id').val(complaint);
            }

        });
    </script>
@endSection
