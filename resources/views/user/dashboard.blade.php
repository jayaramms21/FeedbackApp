<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Background with a smooth gradient */
        body {
           background: linear-gradient(to right, rgb(126, 215, 165), rgb(212, 255, 234));
            
           font-family: 'Poppins', sans-serif;
            
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Glassmorphism card effect */
        .dashboard-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            width: 350px;
            text-align: left;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
           /* color: #fff;*/
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        h2 {
            font-weight: bold;
            font-size: 24px;
        }

        .form-label {
            font-weight: bold;
        }

        select {
            border-radius: 8px;
            border: none;
            padding: 10px;
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            color: #333;
        }

        /* Stylish button */
        .btn-feedback {
            background:rgb(232, 106, 131);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            font-size: 18px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-feedback:hover {
            background: #ff4b2b;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>FEEDBACK</h2>

        @if(Auth::check())  <!-- Check if user is logged in -->
            <p><strong>Name:</strong> {{ Auth::user()->username }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not Available' }}</p>
            
        @else
            <p>Please log in to see your details.</p>
        @endif

        <div class="mb-3">
            <label for="module" class="form-label">Select Module:</label>
            <select class="form-select" id="module">
                <option value="">-- Choose Module --</option>
                <option value="Module 1">Module 1</option>
                <option value="Module 2">Module 2</option>
                <option value="Module 3">Module 3</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="topic" class="form-label">Select Topic:</label>
            <select class="form-select" id="topic">
                <option value="">-- Choose Topic --</option>
                <option value="Topic A">Topic A</option>
                <option value="Topic B">Topic B</option>
                <option value="Topic C">Topic C</option>
            </select>
        </div>

        <button class="btn-feedback" onclick="submitFeedback()">Click for Feedback</button>
    </div>

    <script>
      function submitFeedback() {
        let module = document.getElementById('module').value;
        let topic = document.getElementById('topic').value;

        if (!module || !topic) {
            alert("Please select both a module and a topic.");
            return;
        }

        // Redirect to Laravel route with module & topic parameters
        window.location.href = `/feedback?module=${encodeURIComponent(module)}&topic=${encodeURIComponent(topic)}`;
      }
    </script>
</body>
</html>
