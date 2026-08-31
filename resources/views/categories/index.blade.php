<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1> welcome to our resto</h1>
    <ul>
        <!-- hy l ymr2 3l kel category b2l l categories w ytb3 esmha -->
        @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</body>
</html>