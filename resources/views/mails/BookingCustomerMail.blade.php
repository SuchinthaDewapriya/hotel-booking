<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation</title>
</head>
<body>
<center>
    <img src="{{ asset('public/images/project-logo.png')}}" width="50px">
    <h2>Your reservation is under review</h2>
</center>
<span>Hello, {{$data['name']}}</span><br>
<span>We have received your reservation. We will confirm your reservation as soon as possible.</span>
</body>
</html>