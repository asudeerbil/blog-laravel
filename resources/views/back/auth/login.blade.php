<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blog Site</title>
    <link rel="icon" type="image/x-icon" href="{{asset('front')}}/assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('front')}}/css/styles.css" rel="stylesheet" />
    <style>
        body {
            background: #2CA6A4;
            font-family: 'Open Sans', sans-serif;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-container h2 {
            font-family: 'Lora', serif;
            margin-bottom: 20px;
            color: #4A4A4A;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-weight: 600;
            color: #4A4A4A;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            color: #4A4A4A;
        }

        .btn-login {
            background: #4A4A4A;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #333;
        }

        .login-container a {
            display: block;
            margin-top: 10px;
            color: #4A4A4A;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
            color: #333;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{route('homepage')}}">Blog Site</a>
        </div>
    </nav>
    <div class="login-container">
        <h2>Welcome</h2>
        @if($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
        @endif
        <form action="{{route('admin.login.post')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>

    </div>
</body>

</html>