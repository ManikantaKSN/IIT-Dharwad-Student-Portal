<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT Dharwad Student Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
       body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.header {
    background-color: #4a3c8c;
    color: #fff;
    padding: 10px;
    text-align: center;
    width: 100%;
    box-sizing: border-box;
    animation: fadeInDown 1s ease-in-out;
    display: flex;
    align-items: center; /* Center items vertically */
    justify-content: space-between; /* Add space between logo and h1 */
}

.header div {
    display: flex;
    align-items: center;
}

.header img {
    max-height: 40px;
    width: auto;
    margin-right: 10px;
}


.conversation {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
}

.qa-box {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
    opacity: 0;
    animation: fadeIn 0.8s ease-in-out forwards;
}

.question {
    background-color: #f2f2f2;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
}

.answer {
    background-color: #e0f7fa;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    text-align: center;
}

strong {
    color: #4CAF50;
}

em {
    color: #2196F3;
}

p {
    margin: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
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
<div class="conversation">
<?php
// Establishing database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "studentportal";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching data from the database
$sql = "SELECT q.id, q.quest, q.username AS question_username, a.answer_text, a.username AS answer_username
        FROM questions q
        LEFT JOIN answers a ON q.id = a.question_id
        ORDER BY q.id";

$result = $conn->query($sql);

// Displaying questions and answers
if ($result->num_rows > 0) {
    $currentQuestionID = null;

    while ($row = $result->fetch_assoc()) {
        $questionID = $row['id'];
        $questionText = $row['quest'];
        $questionUsername = $row['question_username'];
        $answerText = $row['answer_text'];
        $answerUsername = $row['answer_username'];

        if ($currentQuestionID !== $questionID) {
            // Close previous question block
            if ($currentQuestionID !== null) {
                echo "</div>"; // Close the previous question block
            }

            // Open a new question block
            echo '<div class="qa-box question">';
            echo "<strong>Question (ID: $questionID) by $questionUsername: $questionText</strong><br>";

            $currentQuestionID = $questionID;
        }

        // Display answer details
        if ($answerText !== null) {
            // Open a new answer block
            echo '<div class="qa-box answer">';
            echo "<em>Answer by $answerUsername: $answerText</em><br></div>";
        }
    }

    // Close the last question block
    echo "</div>";
} else {
    echo "No conversations found.";
}

// Close the database connection
$conn->close();
?>
</div>
</body>
</html>


