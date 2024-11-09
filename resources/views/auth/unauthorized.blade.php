<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Background styling sama seperti halaman login */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('{{ asset('img/bg3.jpg') }}') no-repeat center;
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

        /* Styling untuk container */
        .container {
            text-align: center;
            padding: 40px;
            border: 1px solid #e3342f;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 400px;
        }

        h1 {
            color: #e3342f;
            font-size: 2em;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.1em;
            color: #555555;
        }

        .back-link {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #ffffff;
            background-color: #e3342f;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Access Denied</h1>
        <p>You do not have permission to access this page</p>
        <a href="{{ route('login') }}" class="back-link">Back to Login Page</a>
    </div>
</body>
</html>
