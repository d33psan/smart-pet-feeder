<?php

require 'common.php';

//Grab all the users from our database
$query = "SELECT * FROM users";
$users = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Smart Pet Feeder</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
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
    <div class="row">
        <h2>Pets</h2>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pet Name</th>
                <th scope="col">RFID UID</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Loop through and list all the information of each user including their RFID UID
            foreach($users as $user) {
                echo '<tr>';
                echo '<td scope="row">' . $user['id'] . '</td>';
                echo '<td>' . $user['name'] . '</td>';
                echo '<td>' . $user['rfid_uid'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</html>