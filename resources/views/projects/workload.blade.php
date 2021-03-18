@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">{{$project->name}}</h3>
                    <div class="card-tools">
                        @can('employee')
                        <button type="button" id="btn-save" class="btn btn-tool"><i class="fas fa-pen"></i> Start
                            Work</button>
                        @endcan
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body" id="safeTimerDisplay">
                    <div class="responsive-table">
                        @include('projects.table.workload')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        var tbWorkload = $('#tb-workload').DataTable();
        // Clicking the save button on the open modal for both CREATE and UPDATE
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{route("projects.add.workload")}}',
                data: {
                    project_id : '{{$project->id}}',
                },
                dataType: 'json',
                success: function (data) {
                    Swal.fire(
                    'Success!',
                    'New work has been started',
                    'success'
                    );

                    location.reload();

                },
                error: function (data) {
                    Swal.fire(
                    'Error!',
                    'Error happened',
                    'error'
                    )
                }
            });
        });

        // Clicking the stop button on the open modal for stop working
        $('button[name="btn_stop"]').click(function (e) {

            var workload_id = $(this).prev('input[name="workload_id"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{route("projects.stop.workload")}}',
                data: {
                    workload_id : workload_id,
                },
                dataType: 'json',
                success: function (data) {
                    Swal.fire(
                    'Success!',
                    'Workload has been stopped',
                    'success'
                    );

                    location.reload();

                },
                error: function (data) {
                    Swal.fire(
                    'Error!',
                    'Error happened',
                    'error'
                    )
                }
            });
        });
    } );
</script>
@endsection
