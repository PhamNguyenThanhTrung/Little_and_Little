@extends('templates.teamplate')
@section('contactpage')
<!DOCTYPE html>
<html>
<head>
    <title>Email Template</title>
</head>
<body>
    <h1>Thông tin liên hệ</h1>
    <p>Họ và tên: {{ $contact['Full_name'] }}</p>
    <p>Số điện thoại: {{ $contact['Tell'] }}</p>
    <p>Email: {{ $contact['Email'] }}</p>
    <p>Địa chỉ: {{ $contact['Address'] }}</p>
    <p>Nội dung tin nhắn: {{ $contact['message'] }}</p>
</body>
</html>



@endsection
