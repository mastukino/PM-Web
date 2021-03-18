<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Project;
use PDF;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index')->with(['invoices' => $invoices]);
    }

    public function create()
    {
        $projects = Project::all();
        return view('invoices.create')->with(['projects' => $projects]);
    }

    public function store(Request $request)
    {
        $project = Project::find($request->project_id);

        $total = 0;
        $hours = 0;

        if (empty($project->workloads)) {
            return redirect()->back()->withErrors(['empty' => 'Empty workloads']);
        }

        foreach ($project->workloads as $item) {
            if ($item->end_time != null) {
                $t1 = strtotime($item->end_time);
                $t2 = strtotime($item->start_time);
                $diff = $t1 - $t2;

                $hours = $hours + ($diff /  3600);


            }
        }
        $total = ($hours * $project->rate_hour);

        $tax_value = ($request->tax / 100) * $total;

        $invoice = new Invoice();
        $invoice->project_id = $request->project_id;
        $invoice->invoice_no = $this->generateInvoiceNumber();
        $invoice->description = $request->description ?? "Payment for " . $project->name;
        $invoice->discount = $request->discount;
        $invoice->tax = $request->tax;
        $invoice->tax_value = $tax_value;
        $invoice->total_hour = $hours;
        $invoice->rate_hour = $project->rate_hour;
        $invoice->grand_total = ($total - $request->discount) + $tax_value;
        $invoice->save();

        return redirect()->back()->withSuccess('Invoice created');
    }

    protected function generateInvoiceNumber()
    {
        $countInvoice = Invoice::count();
        $no = date('Ymd') . str_pad(1 + $countInvoice, 6, "0", STR_PAD_LEFT);
        return $no;
    }

    public function print($id)
    {
        $invoice = Invoice::find($id);

        $pdf = PDF::loadView('invoices.print.print_pdf', compact('invoice'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function markAsPaid($id)
    {
        $invoice = Invoice::find($id);
        $invoice->paid = 1;
        $invoice->touch();

        return redirect()->back()->withSuccess('Invoice marked as paid');
    }
}
