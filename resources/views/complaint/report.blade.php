
<!-- resources/views/complaints/report.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Complaint Status Report</h1>
    
    <form id="columns-form">
        <h3>Select Optional Columns:</h3>
        @foreach($optionalColumns as $column)
            <div>
                <input type="checkbox" name="optional_columns[]" value="{{ $column }}">
                <label>{{ ucfirst(str_replace('_', ' ', $column)) }}</label>
            </div>
        @endforeach
        <button type="button" id="generate-report">Generate Report</button>
    </form>

    <table id="complaints-table" class="table table-bordered">
        <thead>
            <tr>
                @foreach($defaultColumns as $column)
                    <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                @endforeach
            </tr>
        </thead>
    </table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#generate-report').click(function() {
            var defaultColumns = @json($defaultColumns);
            var optionalColumns = $('#columns-form').serializeArray().map(function(item) {
                return item.value;
            });

            var table = $('#complaints-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('complaints.data') }}',
                    data: {
                        default_columns: defaultColumns,
                        optional_columns: optionalColumns
                    }
                },
                columns: defaultColumns.concat(optionalColumns).map(function(column) {
                    return { data: column, name: column, title: column.charAt(0).toUpperCase() + column.slice(1).replace('_', ' ') };
                })
            });
        });
    });
</script>
@endsection
