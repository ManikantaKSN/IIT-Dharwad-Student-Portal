<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT Dharwad Student Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0;
    background-image: url('img/map.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


.card-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.card {
    text-align: center;
    width: 350px;
    padding: 20px;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
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

.card img {
    max-width: 100%;
    border-radius: 4px;
    margin-bottom: 10px;
}

.card h2 {
    color: #333;
}

.card p {
    color: #555;
    max-width: 100%;
    text-align: justify;
    margin-bottom: 20px;
    line-height: 1.5;
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
    <div class="card-container">
    <div class="card">
        <!-- <img src="path_to_image1.jpg" alt="Card 1 Image"> -->
        <h2>Lost an Item ?</h2>
        <p>Ever experienced that sinking feeling when you realize something valuable is missing? Before the panic sets in, take a moment to breathe and follow a simple yet crucial step - check the lost items list. It's your first line of defense against the chaos of losing your belongings. But wait, there's more! If your item doesn't make a cameo on the list, don't despair. It's time to take matters into your own hands and report the loss. Your lost treasure deserves to be found, and the journey starts with a click or a call. Don't let your prized possession slip through the cracks - act now and let the search begin!</p>
        <a href="lostform.php"><button>Report Lost Item</button></a><br><br>
        <a href="founditems.php"> <button>View Found Items</button></a>
    </div>

    <div class="card">
        <!-- <img src="path_to_image2.jpg" alt="Card 2 Image"> -->
        <h2>Found an Item ?</h2>
        <p>Discovering a lost item is like stumbling upon a hidden treasure, and now it's your turn to be the hero! Don't let the excitement fade away - take a moment to report your found item. Your act of kindness could reunite someone with their cherished belongings. Be the link between loss and rediscovery, and make a difference today. Reporting found items is not just a good deed; it's a chance to be the beacon of hope for someone desperately seeking what they thought was gone forever. Seize the opportunity to be a hero and play your part in this tale of lost and found</p>
        <a href="foundform.php
        "><button>Report Found Item</button></a><br><br>
        <a href="lostitems.php"><button>View Missing List</button></a>
    </div></div>
</body>
</html>
