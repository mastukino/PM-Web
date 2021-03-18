<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: #333;
            text-align: left;
            font-size: 18px;
            margin: 0;
        }

        .container {
            margin: 0 auto;
            margin-top: 35px;
            padding: 40px;
            width: 100%;
            height: auto;
            background-color: #fff;
        }

        caption {
            font-size: 28px;
            margin-bottom: 15px;
        }

        table {
            border: 1px solid #333;
            border-collapse: collapse;
            margin: 0 auto;
            width: 740px;
        }

        td,
        tr,
        th {
            padding: 12px;
            border: 1px solid #333;
            width: 185px;
        }

        th {
            background-color: #f0f0f0;
        }

        h4,
        p {
            margin: 0px;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <caption>
                INVOICE
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong># {{$invoice->invoice_no}}</strong></th>
                    <th>{{date_format($invoice->created_at,'d-M-Y')}}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Company: </h4>
                        <p>PT. Example.<br>
                            Jl Sultan Hasanuddin Batam<br>
                            085343966997<br>
                            support@tribinajasaindo.id
                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Billed To: </h4>
                        <p>
                            {{$invoice->project->customer->name}}<br>
                            Tel {{$invoice->project->customer->tel}}/ Phone {{$invoice->project->customer->phone}}<br>
                            {{$invoice->project->customer->email}}<br>
                            {{$invoice->project->customer->address}}<br>
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Description</th>
                    <th>Working Hrs</th>
                    <th>Rate</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>{{$invoice->project->name}}</td>
                    <td>{{number_format($invoice->total_hour,2)}}</td>
                    <td>Rp {{number_format($invoice->rate_hour,2)}}</td>
                    <td>
                        <?php $subtotal = $invoice->rate_hour * $invoice->total_hour; ?>
                        Rp {{number_format($subtotal,2)}}
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Subtotal</th>
                    <td>Rp {{number_format($subtotal,2)}} </td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td colspan="2">Rp. {{number_format($invoice->dicsount,2)}}</td>
                    <td>
                        <?php $subtotal = $subtotal - $invoice->dicsount; ?>
                        Rp {{number_format($subtotal,2)}}</td>
                </tr>
                <tr>
                    <th>PPN</th>
                    <td>Rp. {{number_format($invoice->tax_value,2)}}</td>
                    <td>{{$invoice->tax}}%</td>
                    <td>
                        <?php $subtotal = $subtotal + $invoice->tax_value; ?>
                        Rp. {{number_format($subtotal,2)}}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <td>Rp. {{number_format($invoice->grand_total,2)}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>
