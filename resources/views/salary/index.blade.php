@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row mb-2 justify-content-center">
        <div class="col-sm-12">
            @include('general.flash')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Salary of Current Month</div>
                <div class="card-body">
                    <form action="{{route('salary-report.paid')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Paid Checked Employee</button> <br>
                            <span style="color:red">Please export the records first before you mark as paid</span>
                        </div>
                        @include('salary.table.list')
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Salary History</div>
                <div class="card-body">
                    @include('salary.table.history')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('adminlte_js')
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tb-salary').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    filename: 'salary_report'
                },
                {
                    extend: 'pdf',
                    filename: 'salary_report'
                }
            ]
        });
        $('#tb-salary-history').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    filename: 'salary_repor_all'
                },
                {
                    extend: 'pdf',
                    filename: 'salary_report_all'
                }
            ]
        });
    } );
</script>
@endsection
