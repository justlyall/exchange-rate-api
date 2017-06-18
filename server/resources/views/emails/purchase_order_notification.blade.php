<html>
<body>
    <p>A new purchase order was created</p>
    <table>
        <tr>
            <td><strong>Total cost</strong></td>
            <td>{{ $amount_usd }}</td>
        </tr>
        <tr>
            <td><strong>Amount Purchased</strong></td>
            <td>{{ $amount_purchased }}</td>
        </tr>
        <tr>
            <td><strong>Currency</strong></td>
            <td>{{ $currency['code'] }}</td>
        </tr>
        <tr>
            <td><strong>Exchange Rate</strong></td>
            <td>{{ $exchange_rate }}</td>
        </tr>
    </table>
</body>
</html>