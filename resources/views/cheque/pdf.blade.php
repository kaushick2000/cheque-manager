<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheque {{ $cheque->id }}</title>
</head>
<body>
    <table border="1" width="100%" cellpadding="5" style="border-collapse: collapse;">
        <tbody>
            <tr>
                <th colspan="2" align="center">{{ Auth::user()->name }}</th>
            </tr>
            <tr>
                <th colspan="2" align="center">{{ Auth::user()->bank_account_no }}</th>
            </tr>
            <tr>
                <th>Client Name</th>
                <td>{{ $cheque->client_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Cheque No</th>
                <td>{{ $cheque->cheque_no ?? '-' }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ date('d-m-Y', strtotime($cheque->date)) ?? '-' }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>Rs. {{ $cheque->amount ?? '-' }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
