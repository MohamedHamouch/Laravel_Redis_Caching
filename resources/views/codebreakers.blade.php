<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            width: 200px;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Users</h1>
    <div>
        @foreach ($users as $user)
            <div class="card">
                <img src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->role }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>