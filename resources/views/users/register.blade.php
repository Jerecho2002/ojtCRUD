<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create User</h1>
    @if(session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form action="{{ route('registerSubmitName') }}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="name">
        <input type="email" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="password">
        <button type="submit">Register User</button>
    </form>
    <p>Already have an account? <a href="{{ route('loginPageName') }}">Login</a></p>
</body>
</html>