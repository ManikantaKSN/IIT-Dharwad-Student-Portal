<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Forum</title>
    <link rel="stylesheet" href="style.css">
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    background-image: url('img/walmi.jpeg'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
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

.card {
    background-color: #8a70c8; /* violet background color */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px;
    text-align: center;
}

button {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
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

    <div class="card" id="askQuestionCard">
        <h2>Ask a Question</h2>
        <button onclick="redirectTo('ask_question.php')">Let's Go</button>
    </div>

    <div class="card" id="answerQuestionsCard">
        <h2>Answer the Questions</h2>
        <button onclick="redirectTo('answer_questions.php')">Let's Go</button>
    </div>

    <div class="card" id="viewConversationsCard">
        <h2>View Previous Conversations</h2>
        <button onclick="redirectTo('view_conversations.php')">Let's Go</button>
    </div>

    <script>
        function redirectTo(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>