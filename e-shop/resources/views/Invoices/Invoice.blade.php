<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->id }}</title>
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header, .footer {
            text-align: center; /* Center align the header and footer */
        }
        .header img {
            max-width: 150px;
        }
        .invoice-info {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Two equal columns */
            gap: 20px; /* Gap between columns */
            margin: 20px 0;
            padding: 10px; /* Padding for better spacing */
            border: 1px solid #ddd; /* Border for visual separation */
            border-radius: 5px; /* Rounded corners */
        }
        .invoice-info p {
            margin: 0; /* Remove default margin for paragraphs */
            line-height: 1.5; /* Improve readability with line-height */
        }
        .invoice-info strong {
            display: block; /* Make strong text block-level for better alignment */
            margin-bottom: 5px; /* Space between label and value */
        }
        table {
            width: 100%;
            border: #7d836d 2px solid;
            margin: 20px 0;
            border-collapse: collapse;
        }
        table th, table td {
            border-bottom: #7d836d 1px solid;
            padding: 8px;
            margin: 0;
        }
        table th {
            background-color: #7d836d;
            color: #fff; 
            text-align: left;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        #company_name {
            color: #7d836d;
            margin: 0;
        }
        #Invoice_header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .footer {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 300px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1 id="company_name">Shantaty</h1>
        </div>

        <div class="invoice-info">

            <div>
                <p><strong>Invoice Number:</strong> INV-{{ $order->id }}</p>
                <p><strong>Invoice Date:</strong> {{ $order->created_at_formatted }}</p>
            </div>
            </div>

            <div class="invoice-info">
            <div>
                <p><strong>Bill to:</strong></p>
                <p>Name: {{ $order->user->name }}<br>
                   Address one: {{ $order->userAddress->address1 }}<br>
                   Address two: {{ $order->userAddress->city }}<br>
                   Email: {{ $order->user->email }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->title }}<br>
                            {{ $item->productColor->color->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->product->price, 2) }}</td>
                        <td>${{ number_format($item->quantity * $item->product->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Subtotal</td>
                    <td class="total">${{ number_format($order->subtotal, 2) }}</td>
                </tr>

                <tr>
                    <td colspan="3" class="total">Total</td>
                    <td class="total">${{ number_format($order->total_price, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>www.shantaty.net</p>
        </div>
    </div>
</body>
</html>
