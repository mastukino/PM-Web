@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-12">
            <a href="{{route('customers.create')}}" class="btn btn-md btn-success">Create Customer</a>
        </div>
    </div>
    <div class="row mb-2 justify-content-center">
        <div class="col-sm-12">
            @include('general.flash')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer List</div>
                <div class="card-body">
                    @include('customers.table.list')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('adminlte_js')
<script>
    $(document).ready(function() {
        $('#tb-customers').DataTable();
    } );
</script>
@endsection
