<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            border: 2px solid black;
        }
        .format {
            padding: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>

    @auth
    <p>Hewwo {{ auth()->user()->name }}!/p>

    @else
    <div class="container">
        <h2 class="format">Register</h2>
        <form action="/register" method="POST" class="format">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>Register</button>
        </form>
    </div>
    <div class="container">
        <h2 class="format">Login</h2>
        <form action="/login" method="POST" class="format">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button>Login</button>
        </form>
    </div>

    @endauth



</body>
</html>
