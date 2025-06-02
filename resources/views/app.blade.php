<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Lara Quiz</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon-32x32.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite([ 'resources/js/app.js','resources/css/app.css'])
    @inertiaHead
    @routes
</head>

<body>
    <div id="modal-container"></div>
    @inertia
</body>

</html>
