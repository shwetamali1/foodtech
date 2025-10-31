<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #{{ $invoice_id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Invoice #{{ $invoice_id }}</h2>
    <p><strong>Date:</strong> {{ $date }}</p>
    <p><strong>Name:</strong> {{ $customer_name }}</p>
    <p><strong>Email:</strong> {{ $customer_email }}</p>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price (₹)</th>
                <th>Total (₹)</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($items as $item)
                @php $total = $item['qty'] * $item['price']; $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>{{ number_format($item['price'], 2) }}</td>
                    <td>{{ number_format($total, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" align="right"><strong>Grand Total</strong></td>
                <td><strong>₹{{ number_format($grandTotal, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
