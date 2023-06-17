@extends('templates.teamplate')

@section('contactpage')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mã QR Code</title>
</head>
<body>
    <h1>Mã QR Code</h1>
    <p>Dưới đây là các mã QR code bạn đã đặt:</p>
    @foreach ($qrCodePaths as $qrCodePath)
       {{$qrCodePath}}


    @endforeach
 
</body>
</html>
@endsection


