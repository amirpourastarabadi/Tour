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

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">first name</th>
        <th scope="col">last name</th>
        <th scope="col">national code</th>
        <th scope="col">birthday</th>
        <th scope="col">email</th>
        <th scope="col">phone number</th>
        <th scope="col">operations</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <td>{{$item->first_name}}</td>
            <td>{{$item->last_name}}</td>
            <td>{{$item->national_code}}</td>
            <td>{{$item->birthday}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->mobile_number}}</td>
            <td>
                <a href="">edit</a>
                <a href="">delete</a>
            </td>

    @endforeach
    </tbody>
</table>

</body>
</html>
