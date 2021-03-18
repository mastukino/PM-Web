@extends('adminlte::page')

@section('content')
<div class="container">
    @can('admin')
    @include('general.admin_widgets')
    @endcan

    @can('employee')
    @include('general.employee_widget')
    @endcan
</div>
@endsection
