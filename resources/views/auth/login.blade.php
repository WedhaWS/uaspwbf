<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang yang lebih lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Lebar kontainer yang lebih besar */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff; /* Warna untuk heading */
        }
        .form-group {
            margin-bottom: 15px; /* Jarak antar elemen */
        }
        label {
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            width: 100%; /* Tombol memenuhi lebar kontainer */
        }
        .register-link {
            text-align: center;
            margin-top: 15px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="loginUsername">Username</label>
                <!-- Input Username dengan atribut name -->
                <input type="text" class="form-control" id="loginUsername" name="username" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password</label>
                <!-- Input Password dengan atribut name -->
                <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- Tautan Register -->
        <div class="register-link">
            <p>Don't have an account? <a href='/register'>Register</a></p>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
</body>
</html>