<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Admin Header Styling */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #343a40;
            padding: 10px 20px;
            border-radius: 5px;
        }
        
        .admin-header h2 {
            color: white;
            margin: 0;
        }

        /* Button Styling */
        .admin-buttons {
            display: flex;
            gap: 10px;
        }

        .admin-buttons .btn {
            padding: 8px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            cursor: pointer;
        }

        .btn-primary { background-color: #007bff; }
        .btn-success { background-color: #28a745; }
        .btn-secondary { background-color: #6c757d; }
        .btn-danger { background-color: #dc3545; }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>
<body>

    <!-- Admin Panel Header -->
    <div class="admin-header">
        <h2>Admin Dashboard</h2>
        
        <div class="admin-buttons">
            <a href="{{ route('admin.feedback') }}" class="btn btn-primary">View Feedback</a>
            <a href="{{ route('admin.calculate-ratings') }}" class="btn btn-success">Calculate Ratings</a>
            <a href="{{ route('admin.ratings') }}" class="btn btn-secondary">View Ratings</a>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
