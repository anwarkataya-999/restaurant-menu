<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>

    <h1>Add Category</h1>

    <form action="/categories" method="POST">

        @csrf

        <label for="name">Category Name:</label>
        <input type="text" id="name" name="name">

        <br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>

        <br><br>

        <label>
            <input type="checkbox" name="is_active" value="1" checked>
            Active
        </label>

        <br><br>

        <button type="submit">Add Category</button>

    </form>

</body>
</html>