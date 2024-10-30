<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bolívar Coffee - Login</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url("{{ asset('/img/bglogin.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color:  rgba(255, 255, 255, 0.1); /* 70% opacity */
            z-index: -1; Keeps the overlay behind the content
        }

        .login-container {
            background-color: #4b5b4e;
            padding: 30px;
            border-radius: 30px;
            /* border-inline-color: #ffffff; */
            box-shadow: 0 0 20px rgba(255, 219, 120, 0.2);
            width: 400px;
            text-align: center;
            color: #ffffff;
            font-size: 15px;
        }
        

        .login-container img {
            width: 120px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .login-container h2 {
            font-weight: 700;
            font-size: 24px;
            margin: 0;
            color: #FFD9B4;
        }

        /* .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        } */

        /* .tabs button {
            background-color: #FFD9B4 (255, 217, 180, 0.6);
            border: none;
            padding: 8px 16px;
            border-radius: 25px;
            cursor: pointer;
            color: #4b5b4e;
            font-weight: bold;
            transition: background-color 0.5s;
            flex: 1;
            margin: 0 5px;
        } */

        /* .tabs button.active {
            background-color: #FFD9B4;
        } */

        .input-group {
            margin: 10px 0;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #FFD9B4;
            font-size: 13px;
        }

        .input-group input {
            width: 95%;
            padding: 12px;
            border-radius: 10px;
            /* border-inline-color: #FFD9B4; */
            border: 1px solid #ffffff;
            margin-top: 5px;
            margin-left: 5px;
            margin-right: 5px;
            font-size: 10px;
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
            background-color: #FFD9B4;
            border: none;
            border-radius: 12px;
            color: #4b5b4e;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.5s;
        }

        button.login-button:hover {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="{{ asset('/img/logoobaru.png') }}" alt="Logo">
        <h2>Bolívar Coffee</h2>
        <p>The Bolívar Coffee For Work</p>
        {{-- 
        <div class="tabs">
            <button class="active" id="owner-tab">Owner</button>
            <button id="employee-tab">Employee</button>
        </div> --}}

        <form action="#" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="forgot-password">
                <a href="#">Reset Password?</a>
            </div>

            <button type="submit" class="login-button">Log In</button>
        </form>
    </div>

    <script>
        const ownerTab = document.getElementById('owner-tab');
        const employeeTab = document.getElementById('employee-tab');

        ownerTab.addEventListener('click', () => {
            ownerTab.classList.add('active');
            employeeTab.classList.remove('active');
        });

        employeeTab.addEventListener('click', () => {
            employeeTab.classList.add('active');
            ownerTab.classList.remove('active');
        });
    </script>
</body>

</html>
