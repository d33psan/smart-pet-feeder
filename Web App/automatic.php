<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Firebase JavaScript SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-database.js"></script>

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
        .schedule-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .schedule-container h3 {
            font-size: 32px;
            font-weight: bold;
            margin-top: 0;
        }
        .schedule-container p {
            font-size: 24px;
        }
        .schedule-form {
            margin-top: 30px;
        }
        .schedule-form .form-group {
            margin-bottom: 20px;
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
            <a href="users.php" class="nav-link">View Pets</a>
        </li>
    </ul>
</nav>
<div class="container">
    <h1>Automatic Feeding Schedules</h1>
    <div class="row">
        <div class="col-md-6 order-md-1">
            <div class="schedule-container" data-day="Monday">
            <img src onerror="data('Monday')">
                <h3>Monday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" data-day="Monday" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" data-day="Monday" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" data-day="Monday" class="form-control">
                <br>
                <button type="submit" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Monday" onclick="setSchedule('Monday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Monday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Tuesday">
            <img src onerror="data('Tuesday')">
                <h3>Tuesday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Tuesday" onclick="setSchedule('Tuesday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Tuesday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Wednesday">
            <img src onerror="data('Wednesday')">
                <h3>Wednesday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Wednesday" onclick="setSchedule('Wednesday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Wednesday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Thursday">
            <img src onerror="data('Thursday')">
                <h3>Thursday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Thursday" onclick="setSchedule('Thursday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Thursday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Friday">
            <img src onerror="data('Friday')">
                <h3>Friday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Friday" onclick="setSchedule('Friday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Friday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Saturday">
            <img src onerror="data('Saturday')">
                <h3>Saturday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Saturday" onclick="setSchedule('Saturday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Saturday')">Delete Schedule</button>
            </div>
            <div class="schedule-container" data-day="Sunday">
            <img src onerror="data('Sunday')">
                <h3>Sunday</h3>
                <p>No Schedule Set</p>
                <label for="food-weight-input">Target food weight (in grams):</label>
                <input type="number" id="food-weight-input" class="form-control">
                <label for="start-input">Start Time:</label>
                <input type="time" id="start-input" class="form-control">
                <label for="end-input">End Time:</label>
                <input type="time" id="end-input" class="form-control">
                <br>
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#set-schedule-modal" data-day="Sunday" onclick="setSchedule('Sunday')">Set Schedule</button>
                <button id="exit-btn" class="btn btn-lg btn-danger" onclick="deleteSchedule('Sunday')">Delete Schedule</button>
            </div>
        </div>
        <div class="col-md-6 order-md-2">
            <h2>Instructions:</h2>
            <p class="lead">To set a feeding schedule for a particular day, click on the "Set Schedule" button under that day.</p>
            <button id="exit-btn" class="btn btn-lg btn-danger w-100 mb-3" onclick="redirectToIndex()">Exit</button>
        </div>
    </div>
</div>

<script>
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
  database.ref("exit1").set(null);
  var exitBtn = document.getElementById("exit-btn");

  function setSchedule(day) {
    // Get the input values from the modal
    var scheduleContainer = document.querySelector('div.schedule-container[data-day="' + day + '"]');
    var timeInput = scheduleContainer.querySelector('input[id="start-input"]');
    var foodInput = scheduleContainer.querySelector('input[id="end-input"]');
    var weightInput = scheduleContainer.querySelector('input[id="food-weight-input"]');
    database.ref(`schedules/${day}/` + 'start').set(timeInput.value);
    database.ref(`schedules/${day}/` + 'end').set(foodInput.value);
    database.ref(`schedules/${day}/` + 'weight').set(weightInput.value);

    // const scheduleRef = firebase.database().ref(`schedules/${day}`);
    // scheduleRef.once('value').then((snapshot) => {
    //     const scheduleData = snapshot.val();

    //     // Update the schedule data with the new input values
    //     scheduleData.time = timeInput.value;
    //     scheduleData.food = foodInput.value;
    //     scheduleData.weight = weightInput.value;

    //     // Save the updated schedule data to Firebase
    //     scheduleRef.set(scheduleData).then(() => {
    //         console.log(`Schedule for ${day} updated successfully`);
    //     }).catch((error) => {
    //         console.error(`Error updating schedule for ${day}: ${error}`);
    //     });
    // });
}

function deleteSchedule(day){
    database.ref(`schedules/${day}/` + 'start').remove();
    database.ref(`schedules/${day}/` + 'end').remove();
    database.ref(`schedules/${day}/` + 'weight').remove();
    var scheduleContainer = document.querySelector('div.schedule-container[data-day="' + day + '"]');
    var scheduleText = scheduleContainer.querySelector('p');
    scheduleText.textContent = 'No Schedule Set';
}

// function displaySchedule(day, scheduleData) {
//     const scheduleContainer = document.querySelector(`[data-day="${day}"]`);
//     scheduleContainer.querySelector('p').textContent = `Feed ${scheduleData.food} at ${scheduleData.time} (target weight: ${scheduleData.weight}g)`;
// }


function data(day){
    var leadsRef = database.ref('schedules');
leadsRef.on('value', function(snapshot) {
    var childData = snapshot.val();
    var scheduleContainer = document.querySelector('div.schedule-container[data-day="' + day + '"]');
    var scheduleText = scheduleContainer.querySelector('p');
    var final = childData[day];
    var final1 = final['start'];
    var final2 = final['end'];
    var final3 = final['weight']
    scheduleText.textContent = 'Scheduled between ' + final1 + ' - ' + final2 + ' ' + final3 + 'g' ;
});
}


function redirectToIndex() {
  window.location.href = "index.php";
  database.ref("exit1").set(true);
  }  

//       function setSchedule(day) {
//     // Get the feeding schedule for the day from the user
//     var schedule = prompt("Enter feeding schedule for " + day + ":");
    
//     // Send the feeding schedule to Firebase
//     database.ref('schedules/' + day).set(schedule);


//     var scheduleContainer = document.querySelector('div.schedule-container[data-day="' + day + '"]');
//     var scheduleText = scheduleContainer.querySelector('p');
//     scheduleText.textContent = 'Scheduled for ' + schedule;
//   }

</script>
</body>
</html>
