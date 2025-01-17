<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification OTP</title>
</head>

<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
        <h2>Email Verification OTP</h2>
        <p>Hello {{ $user->name }},</p>
        <p>Your OTP for email verification is: <strong>{{ $otp }}</strong></p>
        <p>Please use this OTP to verify your identity. Don't share this with anyone.</p>
        <p>Regards,</p>
        <p>World Tech</p>
    </div>
</body>

</html>
