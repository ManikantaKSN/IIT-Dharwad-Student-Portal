<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost and Found Form</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('img/campus5.jpg'); /* Specify your background image path */
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column; /* Center content vertically and horizontally */
    }
    header {
      text-align: center;
      margin-bottom: 20px;
      background-color: violet; /* Set the background color to violet */
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
      display: flex;
      flex-direction: row; /* Align items in a row */
      align-items: center; /* Align items vertically */
      justify-content: center; /* Center items horizontally */
    }
    header img {
      max-width: 100%;
      height: auto;
      max-height: 80px; /* Set a maximum height for the logo */
      margin-right: 10px; /* Add margin to create space between the logo and text */
    }
    header h1 {
      margin-top: 10px;
      color: white; /* Set the color of the heading to white */
    }
    form {
      width: 400px; /* Set the form width */
      padding: 20px;
      border: 1px solid violet;
      border-radius: 8px;
      background-color: rgb(161, 73, 216) 
    }
    label {
      display: block;
      margin-bottom: 5px;
      color: white; /* Text color for labels */
    }
    input[type="text"], input[type="number"], input[type="file"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background for input fields */
    }
    .submit-container {
      display: flex;
      justify-content: center;
    }
    input[type="submit"] {
      background-color: #007bff;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
<a href="home.php" style="text-decoration:none;"><header>
        <div>
            <img src="img/logo.png" alt="IIT Dharwad Logo">
            <h1>IIT Dharwad Student Portal</h1>
        </div>
    </header></a>
  <?php
  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Process the form data and insert into the database

      // Assuming you have a database connection
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

      // Get form data
      $name = $_POST['name'];
      $roll_no = $_POST['roll_no'];
      $location = $_POST['location'];
      $item_name = $_POST['item_name'];
      $contact_no = $_POST['contact_no'];

      // File handling
      $target_dir = "lostitems/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);

      if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          // File uploaded successfully
          $file_path = $target_file;

          // Insert data into the database
          $sql = "INSERT INTO lost_items (name, roll_number, Location, item_name, contact_number, file) VALUES ('$name', '$roll_no', '$location', '$item_name', '$contact_no', '$file_path')";

          if ($conn->query($sql) === TRUE) {
              echo '<script>alert("Data uploaded successfully!"); window.location.href = "lostandfound.php";</script>';
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
      } else {
          echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
      }

      // Close database connection
      $conn->close();
  }
  ?>
  <form action="#" method="post" enctype="multipart/form-data">
    <h2 style="color: white;">Lost Item Report Form</h2>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="roll_no">Roll No:</label>
    <input type="text" id="roll_no" name="roll_no" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>

    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" required>

    <label for="contact_no">Contact No:</label>
    <input type="number" id="contact_no" name="contact_no" required>

    <label for="file">Upload File:</label>
    <input type="file" id="file" name="file">

    <div class="submit-container">
      <input type="submit" value="Submit">
    </div>
  </form>
</body>
</html>
