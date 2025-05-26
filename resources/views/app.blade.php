<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Lara Quiz</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite([ 'resources/js/app.js','resources/css/app.css'])
    @inertiaHead
    @routes
</head>

<body>
    @inertia
</body>

</html>
