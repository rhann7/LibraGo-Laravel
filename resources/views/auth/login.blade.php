<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
    </head>
    <body>
        <form action="{{ route('auth') }}" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Email"> <br>
            <input type="password" name="password" placeholder="Password"> <br>
            <button type="submit">Login</button>

            <a href="{{ route('register') }}">Register</a>
        </form>
    </body>
</html>