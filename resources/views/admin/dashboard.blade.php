<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@csrf  <!-- CSRF token -->

<h1>Admin Dashboard</h1>

@if(session()->has('user_id'))
    <p><strong>Logged in User ID:</strong> {{ session('user_id') }}</p>
@else
    <p>No user is logged in.</p>
@endif

 <!-- Logout Link -->
 <a href="{{ route('logout') }}">Logout</a>
 
</body>
</html>