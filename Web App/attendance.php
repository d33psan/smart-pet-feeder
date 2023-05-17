<?php

require 'common.php';

$query = "SELECT * FROM users";
$users = mysqli_query($conn,$query);
//Grab all users from our database
// $users = $database->select("users", [
//     'id',
//     'name',
// ]);

//Check if we have a year passed in through a get variable, otherwise use the current year
if (isset($_GET['year'])) {
    $current_year = int($_GET['year']);
} else {
    $current_year = date('Y');
}

//Check if we have a month passed in through a get variable, otherwise use the current year
if (isset($_GET['month'])) {
    $current_month = $_GET['month'];
} else {
    $current_month = date('n');
}

//Calculate the amount of days in the selected month
$num_days = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);

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
        <div class="col-md-6 order-md-1 text-center text-md-left pr-md-5 mx-auto">
            <h1>Visits</h1>
            <table class="table table-striped table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Pet Name</th>
                        <?php
                        // Generate headers for all the available days in this month
                        for($iter = 1; $iter <= $num_days; $iter++){
                            echo '<th scope="col" style="min-width:200px;max-width:300px;">' . $iter . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through all available users
                    foreach($users as $user){
                        echo '<tr>';
                        echo '<td scope="row">' . $user['name'] . '</td>';

                    // Iterate through all available days for this month
                    for($iter = 1; $iter <= $num_days; $iter++){

                        
                        // For each pass, grab any attendance that this particular user might have had for that day

                        $start = date('Y-m-d', mktime(0, 0, 0, $current_month, $iter, $current_year));
                        $end = date('Y-m-d', mktime(24, 60, 60, $current_month, $iter, $current_year));

                        $sql = "SELECT clock_in FROM attendance WHERE user_id = {$user['rfid_uid']} AND clock_in BETWEEN '$start' AND '$end'";
                        $attendance = mysqli_query($conn, $sql);

                        
                        // $query1 = "SELECT clock_in FROM attendance WHERE user_id = '$user_id' AND clock_in = '"$current_year"-"$current_month"-"$iter"12:48:20'" ;
                        // $attendance = mysqli_query($conn, $query1);


                        // Check if our database call actually found anything
                        if(!empty($attendance)){
                            // If we have found some data we loop through that adding it to the tables cell
                            echo '<td class="table-success">';
                            foreach($attendance as $attendance_data){
                                echo $attendance_data['clock_in'] . '</br>';
                            }
                            echo '</td>';
                        } else{
                            // If there was nothing in the database notify the user of this.
                            echo '<td class="table-secondary">No Data Available</td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>