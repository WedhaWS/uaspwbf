<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin - Register</title>
    <!-- External CSS -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
    <style>
        /* Styling */
        body { background-color: #f4f5f7; }
        .auth-form-light { border-radius: 15px; background: white; padding: 40px; margin-top: 50px; }
        .form-control { border-radius: 5px; padding: 15px; box-shadow: none; border: 1px solid #e0e0e0; }
        .form-group label { font-weight: bold; }
        .input-icon { position: relative; }
        .input-icon input { padding-left: 45px; }
        .input-icon i { position: absolute; top: 50%; left: 15px; transform: translateY(-50%); color: #888; }
    </style>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                
                            </div>
                            <h4 class="text-center">Create a New Account</h4>
                            <form action="/register" method="POST">
                                <!-- Tambah token CSRF -->
                                @csrf
                                <div class="form-group input-icon">
                                    <label for="registerName">Name</label>
                                    <i class="mdi mdi-account"></i>
                                    <input type="text" class="form-control" id="registerName" name="nama_user" placeholder="Enter your name" required>
                                </div>
                                <div class="form-group input-icon">
                                    <label for="registerUsername">Username</label>
                                    <i class="mdi mdi-account-circle"></i>
                                    <input type="text" class="form-control" id="registerUsername" name="username" placeholder="Choose a username" required>
                                </div>
                                <div class="form-group input-icon">
                                    <label for="registerEmail">Email</label>
                                    <i class="mdi mdi-email"></i>
                                    <input type="email" class="form-control" id="registerEmail" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="form-group input-icon">
                                    <label for="registerPassword">Password</label>
                                    <i class="mdi mdi-lock"></i>
                                    <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Create a password" required>
                                </div>
                                <div class="form-group">
                                    <label for="registerUserType">User Type</label>
                                    <select class="form-control" id="id_jenis_user" name="id_jenis_user" required>
                                        <option value="" disabled selected>Pilih User Type</option>
                                        @foreach ($Roles as $Role)
                                        <option value="{{ $Role->id_jenis_user }}">{{ $Role->jenis_user }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100">Register</button>
                                </div>
                            </form>
                            <div class="text-center mt-4 font-weight-light">
                                Already have an account? <a href="/login" class="text-primary">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
