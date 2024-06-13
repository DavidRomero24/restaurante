<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Factura</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 5px;
        }

        td {
            text-align: left;

        }

        tr {
            border-bottom: 1px solid #ddd;
        }

        strong {
            display: block;
            text-align: center;
            margin: 30px;
            font-size: 60px;
        }
    </style>
</head>

<body>
    <p>
        Date: {{ $order->date_order }}
        <br>
        Client: {{ $customer->name }}
        <br>
        Document: {{ $customer->identification_document }}
    </p>
    <table>
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">amount</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->product->name }}</td>
                    <td> ${{ $detail->product->price }} </td>
                    <td> {{ $detail->amount }} </td>
                    <td>${{ $detail->product->price * $detail->amount }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <strong>Total: ${{ $order->total }}</strong>
</body>

</html>