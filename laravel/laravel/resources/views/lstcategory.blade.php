<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    @foreach($categoryitms as $category)    

        <h1>{{$category->id}}</h1> 
        <h3>{{$category->category_name}}</h3>
        <h4>{{$category->category_discription}}</h4>

    @endforeach
    
    
</body>
</html>