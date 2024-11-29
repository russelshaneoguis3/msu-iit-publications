<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - MSU-IIT Researchers' Repo</title>
</head>
<center>
<body style="background: #f8f0e8; max-width: 800px; border-radius: 25px">


    <br>
    <br>

    <img style="max-width: 500px" src="{{ $message->embed(public_path() . '/assets/img/web-logo.png') }}" />

    <br>

    <h1 style="color:#a41d21">Welcome to MSU-IIT Researchers' Repo!</h1>
    <p style="color:#000">Thank you for registering with  MSU-IIT Researchers' Repository! We were excited to have you on board. </p>
    <p style="color:#000">To complete your registration and activate your account, please verify your email address by clicking the button below:</p>
    <br><br>
    <a href="{{ url('verify/' . $token) }}" style="padding: 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Verify Email</a>
    <br><br><br>
    <p style="color:#a41d21">If you did not register, please ignore this email.</p>

    <br>
    <br>


</body>
</center>
</html>
