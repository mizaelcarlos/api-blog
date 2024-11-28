<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Document</title>
</head>
<body>
    <h1>Bem vindo ao meu blog</h1>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>{{ date('Y') }} - Meu Blog</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>