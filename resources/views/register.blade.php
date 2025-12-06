<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h1>Registration</h1>

<div style="border: 3px solid #222; padding: 15px; border-radius: 8px;">

    <form action="/register" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name"><br><br>
        <input type="email" name="email" placeholder="email"><br><br>
        <input type="password" name="password" placeholder="password"><br><br>
        <button>Submit</button>
    </form>

</div>

</body>
</html>
