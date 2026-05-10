<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Create Account</h2>

<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Name" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Password" required>
    <br><br>

    <button type="submit">Sign Up</button>
</form>

@if ($errors->any())
    <p style="color:red">{{ $errors->first() }}</p>
@endif

<br>
<a href="/login">Already have an account? Login</a>

</body>
</html>