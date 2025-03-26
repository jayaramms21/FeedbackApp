<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Feedback Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgb(216, 244, 248), #ffffff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            background: rgb(23, 223, 110);
            border: none;
            border-radius: 20px;
            padding: 10px;
            width: 100%;
        }
        .btn-primary:hover {
            background: rgb(221, 214, 87);
        }
        .login-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #333;
        }
       
    </style>
</head>
<body>
   <!-- <h2 class="title">FEEDBACK MANAGEMENT SYSTEM</h2> -->

    <div class="login-container">
        <h3 class="login-title">Login</h3>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
    </div>

    <!-- Bootstrap JavaScript for dismissible alert -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
