<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="{{ route('cb.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>
        
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required><br><br>
        
        <button type="submit">Create User</button>
    </form>
</body>
</html>