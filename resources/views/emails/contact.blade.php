<!DOCTYPE html>
<html>
<head>
    <title>{{ $topic }}</title>
</head>
<body>
    <h2>Contact Form Message</h2>
    <p><strong>Name Surname:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subject:</strong> {{ $topic }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $messageContent }}</p>
</body>
</html>
