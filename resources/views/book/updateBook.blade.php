<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to book updation page!</h1>
    @if(session('success'))
    <p style="color:green;">{{session('success')}}</p>
    @endif
    @if($errors->any())
    <ul>
        @foreach($errors as $e)
        <li style="color:red;">{{$e}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{route('book.update', ['book' => $b])}}" method="post">
    @csrf 
    @method('put')
    <label for="name">Name</label><br><br>
    <input type="text" name="name" id="name" value="{{ ($b->name) }}"><br><br>

    <label for="author">Author</label><br><br>
    <input type="text" name="author" id="author" value="{{ ($b->author) }}"><br><br>

    <label for="price">Price</label><br><br>
    <input type="number" name="price" id="price" step="any" value="{{ ($b->price) }}"><br><br>

    <input type="submit" value="Update">        
    </form>
</body>
</html>