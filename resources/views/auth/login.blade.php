<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bolívar Coffee - Login</title>
    <style>
        /* Styling halaman */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('img/bg3.jpg') no-repeat center;
            background-size: 120%; /* Zoom out background image */
            background-color: #e0e0e0; /* Backup color */
            transition: background-position 0.3s; /* Smooth animation */
        }

        /* Background position for larger screens */
        @media (min-width: 1200px) {
            body {
                background-position: center 30%;
            }
        }

        .login-container {
            background-color: #445D48;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            text-align: center;
            color: #FFF8E8;
        }

        .login-container img {
            width: 100px;
            margin-bottom: 10px;
        }

        .login-container h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 24px;
            margin: 0;
            color: #FFD9B4;
        }

        .input-group {
            margin: 10px 0;
            text-align: left;
            width: 100%;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #FFD9B4;
            font-size: 13px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #ffffff;
            font-size: 14px;
            box-sizing: border-box;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .forgot-password a {
            color: #FFD9B4;
            text-decoration: none;
            font-size: 12px;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        button.login-button {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            background-color: #FFD9B4;
            border: none;
            color: #4b5b4e;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.5s;
            box-sizing: border-box;
            margin-top: 10px;
        }

        button.login-button:hover {
            background-color: #CEAD8E;
        }

        .error-message {
            color: #ff4d4d;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo">
        <h2>Bolívar Coffee</h2>
        <p>The Bolívar Coffee For Work</p>

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            {{-- <div class="forgot-password">
                <a href="#">Reset Password?</a>
            </div> --}}

            <button type="submit" class="login-button">Log In</button>
        </form>
    </div>
</body>
</html>
