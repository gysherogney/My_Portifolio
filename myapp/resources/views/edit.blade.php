<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ url('update_student/'.$photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" value="how" name="how">  --}}
        <input type="file" name="Photos" placeholder="image"/> 
        <img src="{{ asset('/images/'.$photo->Photos) }}" width="80px" height="80px" alt="image">
        <button type="submit" >Update</button>
     </form>
</body>
</html>