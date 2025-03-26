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
                <option value="Logic Building & Problem Solving">Logic Building & Problem Solving</option>
    <option value="C++ Programming">C++ Programming</option>
    <option value="Concepts of Operating Systems & Software Development Methodologies">
        Concepts of Operating Systems & Software Development Methodologies
    </option>
    <option value="Object Oriented Programming with Java">Object Oriented Programming with Java</option>
    <option value="Algorithms & Data Structures Using Java">Algorithms & Data Structures Using Java</option>
    <option value="Database Technologies">Database Technologies</option>
    <option value="Web Programming Technologies">Web Programming Technologies</option>
    <option value="Web-based Java Programming">Web-based Java Programming</option>
    <option value="MS.Net Technologies">MS.Net Technologies</option>
    <option value="General Aptitude">General Aptitude</option>
    <option value="Effective Comm.">Effective Comm.</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="topic" class="form-label">Select Topic:</label>
            <select class="form-select" id="topic">
            <option value="">-- Choose Topi --</option>
                <<option value="Logic Building & Problem Solving">Logic Building & Problem Solving</option>
    <option value="C++ Programming">C++ Programming</option>
    <option value="Concepts of Operating Systems & Software Development Methodologies">
        Concepts of Operating Systems & Software Development Methodologies
    </option>
    <option value="Object Oriented Programming with Java">Object Oriented Programming with Java</option>
    <option value="Algorithms & Data Structures Using Java">Algorithms & Data Structures Using Java</option>
    <option value="Database Technologies">Database Technologies</option>
    <option value="Web Programming Technologies">Web Programming Technologies</option>
    <option value="Web-based Java Programming">Web-based Java Programming</option>
    <option value="MS.Net Technologies">MS.Net Technologies</option>
    <option value="General Aptitude">General Aptitude</option>
    <option value="Effective Comm.">Effective Comm.</option>
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
