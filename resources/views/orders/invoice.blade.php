<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #444;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0;
            color: #777;
        }
        .details {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }
        .details-left, .details-right {
            display: table-cell;
            width: 50%;
        }
        .details-right {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .total-row td {
            border-top: 2px solid #333;
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: #777;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            background: #28a745;
            color: #fff;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <h1>Restaurant Receipt</h1>
            <p>Restaurant location i.e Address</p>
            <p>Tel: +255 123 456 789</p>
        </div>

        <div class="details">
            <div class="details-left">
                <p><strong>Order ID:</strong> #{{ $order->id }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</p>
                <p><strong>Served At:</strong> {{ $order->served_at?->format('M d, Y H:i') ?? 'N/A' }}</p>
            </div>
            <div class="details-right">
                <p><strong>Created By:</strong> {{ $order->created_by }}</p>
                <p><strong>Served By:</strong> {{ $order->served_by ?? 'N/A' }}</p>
                <!-- <p><span class="status-badge">PAID</span></p> -->
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>TZS {{ number_format($item->unit_price, 0) }}</td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td style="text-align: right;">TZS {{ number_format($item->unit_price * $item->quantity, 0) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="3" style="text-align: right;">Total Amount</td>
                    <td style="text-align: right;">TZS {{ number_format($order->price, 0) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Thank you for dining with us!</p>
            <p>Please come again.</p>
        </div>
    </div>
</body>
</html>
