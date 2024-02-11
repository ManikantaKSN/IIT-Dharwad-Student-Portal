<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Links</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
            /* background-color: violet; Set the background color to violet */
            padding: 10px;
        }

        header img {
            max-width: 100%;
            height: auto;
            max-height: 80px; /* Set a maximum height for the logo */
        }

        header h1 {
            margin-top: 10px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            text-align: center;
            width: 45%; /* Set a fixed width for the cards */
            box-sizing: border-box;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added a subtle box shadow */
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px; /* Adjusted margin below the image */
        }

        .card a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .card {
                width: calc(100% - 20px);
            }
        }
    </style>
</head>
<body>
<a href="home.php">
<header>
    <div>
        <img src="img/logo.png" alt="IIT Dharwad Logo">
        <h1>IIT Dharwad Student Portal</h1>
    </div>
</header>
    </a>
<div class="card-container">
    <a href="https://www.iitdh.ac.in/" class="card">
        <img src="img/main.png" alt="Main Website">
        <h2>Main Website</h2>
    </a>

    <a href="https://www.iitdh.ac.in/timetable" class="card">
        <img src="img/schedule.png" alt="Time Table">
        <h2>Time Table</h2>
    </a>

    <a href="https://www.iitdh.ac.in/curriculum" class="card">
        <img src="img/curriculum.png" alt="Curriculum">
        <h2>Curriculum</h2>
    </a>

    <a href="https://smp.iitdh.ac.in/" class="card">
        <img src="img/mentor.png" alt="Student Mentors">
        <h2>Student Mentors</h2>
    </a>

    <a href="https://www.iitdh.ac.in/faculty" class="card">
        <img src="img/faculty.png" alt="Faculty">
        <h2>Faculty</h2>
    </a>
</div>

</body>
</html>
