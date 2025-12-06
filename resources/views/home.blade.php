<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<div style="border: 3px solid #222; padding: 15px; border-radius: 8px;">
    <h2>Login</h2>

    <form action="/login" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <button>Login</button>
    </form>

    <p style="margin-top: 10px;">
        Not a member yet?  
        <a href="/register">Sign Up</a>
    </p>
</div>

</body>
</html>
