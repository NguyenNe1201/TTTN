<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ $titlelogin }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/nguyen.jpg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    < </head>

<body class="account-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <!-- Account Logo -->
                <div class="account-logo">
                    <a href="index.html"><img src="/assets/img/nguyen.jpg" alt="Dreamguy's Technologies"></a>
                </div>
                <!-- /Account Logo -->

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Login</h3>
                        @include('admin.alert')
                        @if (session('error'))
                            <div class="alert" style="color: #721c24">{{ session('error') }}</div>
                        @endif
                        <!-- Account Form -->
                        <form action="/admin/users/login/strore" method="post">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email">
                                @error('email')
                                    <span style="color: #721c24">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    {{-- <div class="col-auto">
                                        <a class="text-muted" href="forgot-password.html">
                                            Forgot password?
                                        </a>
                                    </div> --}}
                                </div>
                                <input class="form-control" type="password" name="password">
                                @error('password')
                                    <span style="color: #721c24">* {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Google captcha</label>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer">
                                <p>Don't have an account yet? <a href="#">Register</a></p>
                            </div>
                            @csrf
                        </form>
                        <!-- /Account Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/template/plugins/jquery/jquery.min.js"></script>
    <script src="/template/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="/template/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="/assets/js/app.js"></script>

</body>

</html>
