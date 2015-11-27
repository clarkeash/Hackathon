<!DOCTYPE html>
<html>
<head>
    <title>Support</title>
</head>
<body>
@if (auth()->user())
    <a href="/logout">Logout</a>
    <br>
@endif

@yield('content')
</body>
</html>
