<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1px" style="border-collapse: collapse">
        <tr>
            <td>name</td>
            <td>username</td>
        </tr>
        @foreach ($people as $person)
        <tr>
            <td>{{$person->name}}</td>
            <td>{{$person->username}}</td>
        </tr>
        @endforeach
    </table>
  {{$people->links()}}
</body>
</html>