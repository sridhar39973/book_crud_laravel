<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to list of books page</h1>
    @if(session('success'))
    <p style="color:green;">{{session('success')}}</p>
    @endif
    <a href="{{route('book.renderCreate')}}">Add Book</a>
    <table border ="1" cellpadding = "6">
        <tr>
            <th>
                name
            </th>
            <th>
                author
            </th>
            <th>
                price
            </th>
            <th>
                edit
            </th>
            <th>
                delete
            </th>
        </tr>
        @foreach($book as $b)
        <tr>
        <td>{{ $b->name }}</td>
        <td>{{ $b->author }}</td>
        <td>{{ $b->price }}</td>
        <td><a href="{{route('book.renderUpdatePage', ['book'=>$b])}}">edit</a></td>
        <td>
            <form action="{{route('book.delete', ['book'=>$b])}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </td>
        </tr>
        @endforeach
    </table>
</body>
</html>