<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .customer-details, .shipping-details {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        .totals {
            float: right;
            width: 300px;
        }
        .totals table {
            margin-top: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="invoice-header">
        <h1>INVOICE</h1>
        <p>Invoice #{{ $order->id }}</p>
        <p>Date: {{ $order->created_at_formatted }}</p>
    </div>

    <div class="invoice-details">
        <div class="customer-details">
            <h3>Bill To:</h3>
            <p>{{ $order->user->name }}</p>
            <p>{{ $order->user->email }}</p>
        </div>

        <div class="shipping-details">
            <h3>Ship To:</h3>
            <p>{{ $order->address->street_address }}</p>
            <p>{{ $order->address->city }}, {{ $order->address->state }} {{ $order->address->postal_code }}</p>
            <p>{{ $order->address->country }}</p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>JOD {{ number_format($item->product->price, 2) }}</td>
                <td>JOD {{ number_format($item->quantity * $item->product->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td><strong>Subtotal:</strong></td>
                <td>JOD {{ number_format($order->subtotal, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Tax (10%):</strong></td>
                <td>JOD {{ number_format($order->tax, 2) }}</td>
            </tr>
            @if($order->discount_percentage > 0)
            <tr>
                <td><strong>Discount ({{ $order->discount_percentage }}%):</strong></td>
                <td>JOD {{ number_format(($order->subtotal * $order->discount_percentage / 100), 2) }}</td>
            </tr>
            @endif
            <tr>
                <td><strong>Total:</strong></td>
                <td>JOD {{ number_format($order->total_price, 2) }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Thank you for your business!</p>
        <p>If you have any questions about this invoice, please contact us</p>
    </div>
</body>
</html>
