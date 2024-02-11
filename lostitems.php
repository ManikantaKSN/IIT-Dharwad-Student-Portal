<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost Items</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  align-items: flex-start;
  padding: 20px;
}

.card {
  width: 500px;
  margin: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  overflow: hidden;
  display: flex;
}

.card img {
  width: 150px;
  height: auto;
  border-right: 1px solid #ccc;
}

.card-content {
  padding: 10px;
}

.header {
  background-color: #4a3c8c;
  color: #fff;
  padding: 10px;
  text-align: center;
  width: 100%;
  box-sizing: border-box;
  animation: fadeInDown 1s ease-in-out;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.header div {
  display: flex;
  align-items: center;
  justify-content: center;
}

.header img {
  height: 40px;
  width: auto;
  margin-right: 10px;
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

    // Retrieve data from the database
    $sql = "SELECT id, name, roll_number, Location, item_name, contact_number, file FROM lost_items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="card">
                <img src="<?php echo $row['file']; ?>" alt="Lost Item Image">
                <div class="card-content">
                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                    <p><strong>Roll Number:</strong> <?php echo $row['roll_number']; ?></p>
                    <p><strong>Location:</strong> <?php echo $row['Location']; ?></p>
                    <p><strong>Item Name:</strong> <?php echo $row['item_name']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $row['contact_number']; ?></p>
                </div>
            </div>
            <div style="clear: both;"></div> <!-- Clear floating elements after each card -->
            <?php
        }
    } else {
        echo "No items found in the database.";
    }

    // Close database connection
    $conn->close();
  ?>
</body>
</html>
