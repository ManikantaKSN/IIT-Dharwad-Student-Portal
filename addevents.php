<?php
// Assuming you have a database connection already established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "studentportal";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

    // Process the form data
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $eventDescription = $_POST['eventDescription'];

    // Insert data into the database
    $sql = "INSERT INTO events (event_name,date, event_description) VALUES ('$eventName', '$eventDate', '$eventDescription')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Data entry successful
        echo "<script>alert('Data entry successful'); window.location.href = 'admin.php';</script>";
        exit();
    } else {
        // Handle database error
        echo "Error: " . mysqli_error($your_db_connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url('img/academic.jpg'); 
            /* display: flex; */
            /* align-items: center;
            justify-content: center; */
            height: 100vh;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            display: inline-block;
            margin-right: 20px;
        }

        img {
            height: 50px; /* Adjust the height of the image */
            vertical-align: middle;
        }

        form {
            max-width: 600px;
            margin: auto;
            padding: 30px; /* Increased padding */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        form {
            animation: fadeIn 1s ease-in-out;
        }
    </style>
</head>
<body>

<header>
        <div>
            <img src="img/logo.png"   alt="IIT Dharwad Logo">
            <h1>IIT Dharwad Student Portal</h1>
        </div>
    </header>

    <form method="post" action="addevents.php" style="display: block;">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required><br>

        <label for="eventDate">Event Date:</label>
        <input type="date" id="eventDate" name="eventDate" required><br>

        <label for="eventDescription">Event Description:</label>
        <textarea id="eventDescription" name="eventDescription" required></textarea><br>

        <input type="submit" value="Add Event">
    </form>

</body>
</html>
