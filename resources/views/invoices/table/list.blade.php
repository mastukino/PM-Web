<table id="tb-invoices" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Invoice No.</th>
            <th>Project Name</th>
            <th>Customer</th>
            <th>Total Hour / Rate</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $key => $invoice)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$invoice->invoice_no}}</td>
            <td>{{$invoice->project->name}}</td>
            <td>{{$invoice->project->customer->name}}</td>
            <td>{{number_format($invoice->total_hour,2)}} Hrs / SGD$ {{$invoice->project->rate_hour}}</td>
            <td>SGD$ {{number_format($invoice->grand_total,2)}}</td>
            <td>
                @if($invoice->paid == 0)
                <form action="{{route('invoices.mark.as.paid',['id' => $invoice->id])}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Mark as Paid</button>
                </form>
                <br>
                @endif
                <a target="_blank" href="{{route('invoices.print',['id' => $invoice->id])}}" class="btn btn-sm btn-warning">Print</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
