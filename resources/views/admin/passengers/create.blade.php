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

<form action="{{route('admin.passengers.store')}}" method="post">
    @csrf
    first name <input type="text" name="first_name" value="amir"> <br>
    @error('first_name') <span>{{$message}}</span>@enderror<br>
    last name <input type="text" name="last_name" value="amiri"><br>
    @error('last_name') <span>{{$message}}</span>@enderror<br>
    national code <input type="text" name="national_code" value="0312564789"><br>
    @error('national_code') <span>{{$message}}</span>@enderror<br>
    birthday <input type="date" name="birthday" value="1989-01-03"><br>
    @error('birthday') <span>{{$message}}</span>@enderror<br>
    email <input type="email" name="email" value="ab@gmail.com"><br>
    @error('email') <span>{{$message}}</span>@enderror<br>
    phone number <input type="text" name="mobile_number" value="0235647890"><br>
    @error('mobile_number') <span>{{$message}}</span>@enderror<br>
    password <input type="password" name="password"><br>
    @error('password') <span>{{$message}}</span>@enderror<br>
    confirm password <input type="password" name="confirm_password"><br>
    @error('confirm_password') <span>{{$message}}</span>@enderror<br>
    <input type="submit" value="save">
</form>

</body>
</html>
