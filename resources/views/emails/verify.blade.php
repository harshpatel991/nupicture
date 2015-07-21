<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account. <br>
    Please follow the link below to verify your email address
    {{ URL::to('verify/' . $confirmationCode) }}.<br/>

</div>

</body>
</html>