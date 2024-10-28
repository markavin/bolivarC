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
            background: #e0e0e0; /* Ubah warna latar belakang */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #4b5b4e;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            color: #f7f5ee;
        }

        .login-container img {
            width: 80px;
            margin-bottom: 10px;
        }

        .login-container h2 {
            font-weight: 600;
            margin-bottom: 5px;
            color: #f5e0c3;
        }

        .tabs {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .tabs button {
            background-color: #c2b59b;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            color: #4b5b4e;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .tabs button.active {
            background-color: #f5e0c3;
        }

        .input-group {
            margin: 15px 0;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #f5e0c3;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        button.login-button {
            width: 100%;
            padding: 15px;
            background-color: #f5e0c3;
            border: none;
            border-radius: 5px;
            color: #4b5b4e;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.login-button:hover {
            background-color: #e0c7a2;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Menggunakan fungsi asset untuk mengambil gambar dari public/img/logo.jpg -->
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo">
        <h2>Bolívar Coffee</h2>
        <p>The Bolívar Coffee For Work</p>

        <div class="tabs">
            <button class="active" id="owner-tab">Owner</button>
            <button id="employee-tab">Employee</button>
        </div>

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
