<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="{{ route('updateSubmitName', ['user' => $user]) }}" method="POST">
        @csrf
        @method('put')
        <input type="email" name="email" id="" value="{{ $user->email }}">
        <input type="text" name="name" id="" value="{{ $user->name }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>