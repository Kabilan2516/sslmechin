<!DOCTYPE html>
<html>
<head>
    <title>SSL Certificate Generator</title>
</head>
<body>
    <h1>SSL Certificate Generator</h1>
    <form method="post" action="{{ route('generateSSL') }}">
        @csrf
        <label for="domain">Domain:</label>
        <input type="text" value="yourdomain.com" name="domain" required><br><br>

        <label for="email">Email:</label>
        <input type="email" value="youremail@example.com" name="email" required><br><br>
        <label for="challenge_type">Challenge Type:</label>
        <select name="challenge_type">
            <option value="http">HTTP Challenge</option>
            <option value="dns">DNS Challenge</option>
        </select><br><br>
        <button type="submit">Generate SSL Certificate</button>
    </form>
</body>
</html>
