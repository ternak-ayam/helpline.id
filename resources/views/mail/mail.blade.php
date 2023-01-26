<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ env('app.name') }}</title>
</head>
<body>
<h4>Sender Name: {{ $data['name'] }}</h4>
<h4>Sender Email: {{ $data['email'] }}</h4>

<p>{{ $data['body'] }}</p>
</body>
</html>
