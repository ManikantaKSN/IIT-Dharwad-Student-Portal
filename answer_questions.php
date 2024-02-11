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
    $selectedQuestionId = htmlspecialchars($_POST["selected_question"]);
    $answerText = htmlspecialchars($_POST["answer"]);
    $username = htmlspecialchars($_POST["username"]);

    // Insert answer into the database
    $sql = "INSERT INTO answers (question_id, answer_text, username) VALUES ('$selectedQuestionId', '$answerText', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Answer submitted successfully!");</script>';
        header("Location:forums.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve questions from the database
$sqlQuestions = "SELECT id, quest FROM questions";
$resultQuestions = $conn->query($sqlQuestions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Questions</title>
    <link rel="stylesheet" href="style.css">
    <style>
      body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
}

header {
    background-color: #007bff;
    color: #fff;
    padding: 15px;
    display: flex;
    align-items: center;
}

header img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
}

.container {
    max-width: 600px;
    margin: 20px auto;
}

.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h2 {
    color: #007bff;
}

form {
    margin-top: 15px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

select,
input,
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
<header>
                <img src="img/logo.png" alt="IIT Dharwad Logo">
                <h1>IIT Dharwad Student Portal</h1>
            </header>
    <div class="container">
        <div class="card">
           

            <h2>Answer Questions</h2>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="selected_question">Select a Question to Answer:</label>
                <select id="selected_question" name="selected_question" required>
                    <?php
                    while ($row = $resultQuestions->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['quest']}</option>";
                    }
                    ?>
                </select>

                <label for="username">Your Name:</label>
                <input type="text" id="username" name="username" required>

                <label for="answer">Your Answer:</label>
                <textarea id="answer" name="answer" rows="4" required></textarea>

                <button type="submit">Submit Answer</button>
            </form>
        </div>
    </div>

    <?php
    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
