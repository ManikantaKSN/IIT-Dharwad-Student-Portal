<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>College Events</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9; /* Light gray background */
      color: #46024e;
    }
    header {
      background-color: #46024e;
      color: #fff;
      text-align: center;
      padding: 20px 0;
    }
    .hero {
      background-image: url('event-banner.jpg');
      background-size: cover;
      background-position: center;
      color: #b805cc;
      text-align: center;
      padding: 100px 0;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 0 20px;
      background-color: #fff; /* White container background */
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
    }
    .event {
      background-color: #f5f5f5; /* Lighter gray event background */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .event:hover {
      background-color: #e0e0e0; /* Darker gray on hover */
    }
    .event h2 {
      margin-top: 0;
      color: #b805cc;
    }
    .event-details {
      margin-bottom: 20px;
    }
    .event-details p {
      margin: 5px 0;
    }
    .registration-form {
      display: none;
    }
    .registration-form.active {
      display: block;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .registration-form input[type="text"],
    .registration-form input[type="email"],
    .registration-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .registration-form input[type="submit"] {
      background-color: #46024e;
      color: #b805cc;
      border: none;
      cursor: pointer;
    }
    .registration-form input[type="submit"]:hover {
      background-color: #46024e;
    }
    .hidden {
      display: none;
    }
    .past-events {
      background-color: #f5f5f5; /* Light gray for past events */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .past-events h2 {
      margin-top: 0;
    }
    .past-events ul {
      list-style-type: none;
      padding: 0;
    }
    .past-events li {
      margin-bottom: 5px;
    }
    .search-filter {
      background-color: #46024e; /* Dark background for search filter */
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 20px;
    }
    #searchInput {
      width: 70%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-right: 10px;
    }
    #filterSelect {
      width: 28%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
  <header>
    <h1>College Events</h1>
  </header>
  <div class="hero">
    <h2>Welcome to our Annual Events!</h2>
    <p>Explore our exciting lineup of events.</p>
  </div>
  <div class="container">
    <div class="search-filter">
      <input type="text" id="searchInput" placeholder="Search events...">
      <select id="filterSelect">
        <option value="">Filter by type...</option>
        <option value="Technology Conference">Technology Conference</option>
        <option value="Job Fair">Job Fair</option>
        <option value="Art Show">Art Show</option>
        <option value="Music Concert">Music Concert</option>
        <option value="Science Exhibition">Science Exhibition</option>
      </select>
    </div>
    <div id="eventContainer">
      <?php
    // Database connection details
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

    // Fetch events from the database
    $sql = "SELECT event_name, date, event_description FROM events";
$result = $conn->query($sql);

// Display events
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
   
    echo '<div class="event" >';
    echo '<h2>' . $row['event_name'] . ' (' . $row['date'] . ')</h2>';
    echo '<div class="event-details">';
    echo '<p>Date: ' . $row['date'] . '</p>';
    // echo '<p>Time: ' . $row['time'] . '</p>';
    // echo '<p>Location: ' . $row['location'] . '</p>';
    // echo '<p>Speakers: ' . $row['speakers'] . '</p>';
    echo '<p>Description: ' . $row['event_description'] . '</p>';
    echo '</div>';
    echo '</div>';
    
  }
} else {
  echo '<p>No events found.</p>';
}

// Close the database connection
$conn->close();
    ?>
    </div>
  </div>
  <div class="container">
    <div class="past-events">
      <h2>Past Events</h2>
      <ul id="pastEventsList">
        <!-- Past events will be dynamically added here -->
        <li>Annual Sports Day - February 20, 2024</li>
        <li>Cultural Fest - January 10, 2024</li>
        <li>Science Exhibition - November 5, 2023</li>
      </ul>
    </div>
  </div>
  <script>

    // Function to dynamically populate events
    function populateEvents(events) {
    var eventContainer = document.getElementById("eventContainer");
    events.forEach(function (event, index) {
      var eventDiv = document.createElement("div");
      eventDiv.classList.add("event");
      var timerId = "eventTimer" + index;
      var eventId = "eventDetails" + index;

      // Use event listener to toggle event details visibility on click
      eventDiv.addEventListener("click", function () {
        toggleDetails(eventId, timerId);
      });

      eventDiv.innerHTML = "<h2>" + event.event_name + " (" + event.date + ")<span id='" + timerId + "'></span></h2>" +
        "<div class='event-details hidden' id='" + eventId + "'>" +
        "<p>Date: " + event.date + "</p>" +
        "<p>Description: " + event.event_description + "</p>" +
        "</div>";
      eventContainer.appendChild(eventDiv);

      // Calculate and display countdown timer for each event
      var countdownDate = new Date(event.date + " " + event.time.split(" - ")[0]).getTime();
      var timer = setInterval(function () {
        updateTimer(countdownDate, timerId, timer);
      }, 1000);
    });
  }

    // Function to toggle event details visibility
    function toggleDetails(eventId, timerId) {
    var details = document.getElementById(eventId);
    var timer = document.getElementById(timerId);

    if (details.classList.contains("hidden")) {
      details.classList.remove("hidden");
      // Stop the countdown timer when details are revealed
      clearInterval(timer);
      timer.innerHTML = " - Event details revealed";
    } else {
      details.classList.add("hidden");
    }
  }

    // Function to update countdown timer
    function updateTimer(countdownDate, timerId, timer) {
      var now = new Date().getTime();
      var distance = countdownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById(timerId).innerHTML = " - " + days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
      if (distance < 0) {
        // clearInterval(timer);
        document.getElementById(timerId).innerHTML = " - Event has started";
      }
    }

    // Populate events
    populateEvents();

    // Event filtering
    document.getElementById("filterSelect").addEventListener("change", function() {
      var filterValue = this.value;
      var events = document.querySelectorAll(".event");
      events.forEach(function(event) {
        if (filterValue === "" || event.innerText.includes(filterValue)) {
          event.style.display = "block";
        } else {
          event.style.display = "none";
        }
      });
    });

    // Event search
    document.getElementById("searchInput").addEventListener("input", function() {
      var searchValue = this.value.toLowerCase();
      var events = document.querySelectorAll(".event h2");
      events.forEach(function(event) {
        if (event.innerText.toLowerCase().includes(searchValue)) {
          event.parentNode.style.display = "block";
        } else {
          event.parentNode.style.display = "none";
        }
      });
    });
  </script>
</body>
</html>
