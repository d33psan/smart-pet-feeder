
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Smart Pet Feeder</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .navbar {
            background-color: #4CAF50;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
        }
        .nav-link {
            color: #fff !important;
        }
        .nav-link.active {
            background-color: #fff !important;
            color: #4CAF50 !important;
        }
        h1 {
            font-size: 48px;
            font-weight: bold;
            margin-top: 60px;
            margin-bottom: 30px;
        }
        p.lead {
            font-size: 24px;
            margin-bottom: 30px;
        }
        .btn-lg {
            font-size: 24px;
            padding: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <a class="navbar-brand" href="index.php">Smart Pet Feeder</a>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="attendance.php" class="nav-link">View Visits</a>
        </li>
        <li class="nav-item">
            <a href="users.php" class="nav-link active">View Pets</a>
        </li>
    </ul>
</nav>
<div class="container">
<div class="col-md-6 order-md-1 text-center text-md-left pr-md-5 mx-auto">
    <h1>Manual Mode</h1>
    <div class="row mx-n2">
        <button id="open-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3">Open Dispenser</button>
        <button id="close-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3">Close Dispenser</button>
        <button id="exit-btn" class="btn btn-lg btn-danger w-100 mb-3" onclick="redirectToIndex()">Exit</button>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-database.js"></script>

<script>
// Firebase configuration
var firebaseConfig = {
    apiKey: "AIzaSyDVxlCiaLfXQvbKBNtHn7kbREvpwteMpCc",
    authDomain: "smart-pet-feeder-f8232.firebaseapp.com",
    databaseURL: "https://smart-pet-feeder-f8232-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "smart-pet-feeder-f8232",
    storageBucket: "smart-pet-feeder-f8232.appspot.com",
    messagingSenderId: "613572040437",
    appId: "1:613572040437:web:4a2117afc3c3793afc57bc",
    measurementId: "G-1C8CHXKXKQ"
};
firebase.initializeApp(firebaseConfig);
  
  // Get a reference to your Firebase Realtime Database
  var database = firebase.database();
  database.ref("exit").set(null);
  // Get a reference to the button element
  var openDispenserBtn = document.getElementById("open-dispenser-btn");
  var closeDispenserBtn = document.getElementById("close-dispenser-btn");
  var exitBtn = document.getElementById("exit-btn");
  
  // Add a click event listener to the button
  openDispenserBtn.addEventListener("click", function() {
    // Create a new node in your database with a boolean value of true
    database.ref("openDispenser").set(true);
    database.ref("closeDispenser").set(false);
  });

  closeDispenserBtn.addEventListener("click", function() {
    // Create a new node in your database with a boolean value of true
    database.ref("closeDispenser").set(true);
    database.ref("openDispenser").set(false);
  });

  exitBtn.addEventListener("click", function() {
    // Create a new node in your database with a boolean value of true
    database.ref("exit").set(true);
    database.ref("openDispenser").set(null);
  });

  function redirectToIndex() {
  window.location.href = "index.php";
  }   
</script>

    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
<script src="./firebase.js"></script>
</body>
</html>
