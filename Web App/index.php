<?php
require 'common.php';
?>

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

        @media (max-width: 767px) {
        h1 {
            font-size: 36px;
            margin-top: 30px;
            margin-bottom: 15px;
        }
        p.lead {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .btn-lg {
            font-size: 18px;
            padding: 10px;
        }
    }
    @media (min-width: 768px) and (max-width: 991px) {
        h1 {
            font-size: 42px;
            margin-top: 45px;
            margin-bottom: 22.5px;
        }
        p.lead {
            font-size: 21px;
            margin-bottom: 22.5px;
        }
        .btn-lg {
            font-size: 21px;
            padding: 15px;
        }
    }
    </style>
</head>
<body>


<nav class="navbar navbar-dark">
    <a class="navbar-brand" href="#">Smart Pet Feeder</a>
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
    <h1>Welcome Users</h1>
    <p class="lead">
        Dashboard
    </p>
    <div class="row mx-n2">
        <div class="col-md px-2">
            <a href="users.php" class="btn btn-lg btn-outline-secondary w-100 mb-3">Pets</a>
        </div>
        <div class="col-md px-2">
            <a href="attendance.php" class="btn btn-lg btn-outline-secondary w-100 mb-3" >Visits</a>
        </div>
        <!-- <button id="open-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3">Open Dispenser</button>
        <button id="close-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3">Close Dispenser</button> -->
        <button id="auto-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3" onclick="redirectToAutomate()">Automatic Mode</button>
        <button id="manual-dispenser-btn" class="btn btn-lg btn-primary w-100 mb-3" onclick="redirectToManual()">Manual Mode</button>
        <!-- <input type="time" id="feeding-time" name="feeding-time">
        <button id="schedule-feeding-btn" class="btn btn-lg btn-primary w-100 mb-3">Set Feeding Schedule</button> -->
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-database.js"></script>

<script>


// Firebase configuration
var firebaseConfig = {
    apiKey: "",
    authDomain: "",
    databaseURL: "",
    projectId: "",
    storageBucket: "",
    messagingSenderId: "",
    appId: "",
    measurementId: ""
};
firebase.initializeApp(firebaseConfig);
  
  // Get a reference to your Firebase Realtime Database
  var database = firebase.database();
  
  database.ref("setMode").set(null);
  database.ref("exit").set(null);
  database.ref("exit1").set(null);

  // Get a reference to the button element
//   var openDispenserBtn = document.getElementById("open-dispenser-btn");
//   var closeDispenserBtn = document.getElementById("close-dispenser-btn");
  var autoDispenserBtn = document.getElementById("auto-dispenser-btn");
  var manualDispenserBtn = document.getElementById("manual-dispenser-btn");
//   var scheduleFeedingBtn = document.getElementById("schedule-feeding-btn");
//   var feedingTimeInput = document.getElementById("feeding-time");

  
  // Add a click event listener to the button
//   openDispenserBtn.addEventListener("click", function() {
//     // Create a new node in your database with a boolean value of true
//     database.ref("openDispenser").set(true);
//     database.ref("closeDispenser").set(false);
//   });

//   closeDispenserBtn.addEventListener("click", function() {
//     // Create a new node in your database with a boolean value of true
//     database.ref("closeDispenser").set(true);
//     database.ref("openDispenser").set(false);
//   });

  autoDispenserBtn.addEventListener("click", function() {
    // Create a new node in your database with a boolean value of true
    database.ref("setMode").set(false);
  });

  manualDispenserBtn.addEventListener("click", function() {
    // Create a new node in your database with a boolean value of true
    database.ref("setMode").set(true);
  });

//   scheduleFeedingBtn.addEventListener("click", function() {
//   var feedingTime = feedingTimeInput.value;
//   database.ref("feedingSchedules/" + feedingTime).set(true);

// });

function redirectToAutomate() {
  window.location.href = "automatic.php";
}

function redirectToManual() {
  window.location.href = "manual.php";
}
</script>

    </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/7.14.1-0/firebase.js"></script>
<script src="./firebase.js"></script>
</body>
</html>
