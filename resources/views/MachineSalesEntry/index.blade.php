@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">{{ $title }}</div>
                <div class="prism-toggle d-flex gap-3">
                    <div class="header-element profile-1">
                        <a href="{{route('machine-sales.create')}}" class="btn btn-md btn-primary "> Create </a>
                    </div>
                    
                    
                </div>
                
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
@endSection