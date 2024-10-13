<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Order SuccessFully Placed on Our Website <a href="{{route('.')}}" style="color:000;">Style And Gadgets</a></h1>

    <strong>OrderId (Tracking id):{{$order['order_id']}}</strong>
    <strong>Order date:{{$order['date']}}</strong>
    <strong>Order Total Amount:{{$order['total']}}</strong>
    <hr>
    <h2>Cutomer Detail</h2>
    <strong>Customer Name:{{$order['c_name']}}</strong>
    <strong>Customer Phone:{{$order['c_phone']}}</strong>
    <strong>Customer Email:{{$order['c_email']}}</strong>
</body>
</html>