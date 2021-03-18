@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h2>Create Project</h2>
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
                <div class="card-body">
                    @include('projects.form.creation')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
