<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{route('admin.passengers.update', $passenger)}}" method="post">
    @csrf
    @method('PUT')
    first name <input type="text" name="first_name" value="{{$passenger->first_name}}"> <br>
    @error('first_name') <span>{{$message}}</span>@enderror<br>
    last name <input type="text" name="last_name" value="{{$passenger->last_name}}"><br>
    @error('last_name') <span>{{$message}}</span>@enderror<br>
    national code <input type="text" name="national_code" value="{{$passenger->national_code}}"><br>
    @error('national_code') <span>{{$message}}</span>@enderror<br>
    birthday <input type="date" name="birthday" value="{{$passenger->birthday}}"><br>
    @error('birthday') <span>{{$message}}</span>@enderror<br>
    email <input type="email" name="email" value="{{$passenger->email}}"><br>
    @error('email') <span>{{$message}}</span>@enderror<br>
    phone number <input type="text" name="mobile_number" value="{{$passenger->mobile_number}}"><br>
    @error('mobile_number') <span>{{$message}}</span>@enderror<br>
    <input type="submit" value="edit">
</form>

</body>
</html>
