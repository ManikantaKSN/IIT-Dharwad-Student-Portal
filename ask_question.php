<?php
// Database connection parameters
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = htmlspecialchars($_POST["question"]);
    $username = htmlspecialchars($_POST["username"]);

    // Insert question into the database
    $sql = "INSERT INTO questions (quest, username) VALUES ('$question', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo "Question submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

.card {
    text-align: center;
}

header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
}

header img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

h1 {
    margin: 0;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

textarea,
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

.card p {
    color: green;
}

/* Responsive Styles */
@media screen and (max-width: 600px) {
    .container {
        padding: 10px;
    }
}

    </style>
</head>
<body>
    <a href="home.php" style="text-decoration:none;">
        <header class="header">
            <div>
                <img src="img/logo.png" alt="IIT Dharwad Logo">
                <h1>IIT Dharwad Student Portal</h1>
            </div>
        </header>
    </a>

    <div class="container">
    <img src="img/question.png" style="width:40%" alt="Side Image" class="side-image">
        <div class="card">
            <h2>Ask a Question</h2>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Display a success message or handle other actions after form submission
                echo "<p>Question submitted successfully! Redirecting...</p>";
                header("refresh:2;url=forums.php");
                exit();
            }
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="question">Your Question:</label>
                <textarea id="question" name="question" rows="4" required></textarea>

                <label for="username">Your Name:</label>
                <input type="text" id="username" name="username" required>

                <button type="submit">Submit Question</button>
            </form>
        </div>
    </div>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
