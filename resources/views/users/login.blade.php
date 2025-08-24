<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login User</h1>
    @if(session()->has('error'))
        <p>{{ session('error') }}</p>
    @endif
    <form action="{{ route('loginSubmitName') }}" method="POST">
        @csrf
        <input type="email" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="password">
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('registerPageName') }}">Register</a></p>
</body>
</html>