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

<a href="{{route('admin.passengers.create')}}"><h3>create new passenger</h3></a>
@auth
@endauth

@guest
    bye
@endguest
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">name</th>
        <th scope="col">last name</th>
        <th scope="col">phone number</th>
        <th scope="col">national code</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{Auth::user()->first_name}}</td>
            <td>Mark</td>
            <td>Otto</td>
            <td{{$item->national_code}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
