<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - MSU-IIT Researchers' Repo</title>
</head>
<body>
    <h1>Welcome to MSU-IIT Researchers' Repo!</h1>
    <p>Thank you for registering with  MSU-IIT Researchers' Repository! We were excited to have you on board. To complete your registration and activate your account, please verify your email address by clicking the button below:</p>
    <a href="{{ url('verify/' . $token) }}" style="padding: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Verify Email</a>
    <br>
    <p>If you did not register, please ignore this email.</p>
</body>
</html>
