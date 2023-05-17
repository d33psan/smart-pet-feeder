# Smart Pet Feeder Application

The Smart Pet Feeder Application is a system designed to automate and simplify the process of feeding pets. It utilizes a Raspberry Pi as the core device and includes both RPi and Web App components. The RPi folder contains the scripts to be run on the Raspberry Pi, while the Web App folder contains files to be hosted on any server.

## Connections

Hardware Required for this project are:

1. Raspberry Pi (3 onwards for Wi-Fi Connectivity)
2. RFID Reader and Key Tag
3. Servo Motor
4. Load Cell with HX711 Module

The connections are done as shown in the circuit diagram:


## RPi Folder

The RPi folder contains the following files:

1. `save_pet.py`: This script is used to register a new pet and store its details onto the database. Run this script to register all the pets in the system. It interacts with the database to save pet information for future reference.

2. `main.py`: This script implements the main functionality of the Smart Pet Feeder Application. It has two modes of operation: manual and automatic. 
   - In manual mode, the dispenser mechanism can be opened and closed manually at any time by the user.
   - In automatic mode, the script actively checks for input from the RFID reader. If the RFID tag read matches a tag present in the database, the dispensing mechanism starts automatically to feed the corresponding pet.

## Web App Folder

The Web App folder contains files that need to be hosted on a server. These files provide the web-based interface for interacting with the Smart Pet Feeder Application. The web application allows pet owners to monitor and control the feeding process remotely.

The web application includes HTML, CSS, JavaScript, and other relevant assets required for the user interface.

## Getting Started

To set up and run the Smart Pet Feeder Application, follow these steps:

1. Register the pets:
   - Run the `save_pet.py` script in the RPi folder to register each pet and store their details in the database.

2. Run the main script:
   - Execute the `main.py` script in the RPi folder to start the main functionality of the application. Choose between manual and automatic mode as per your preference.

3. Host the web application:
   - Host the files from the Web App folder on a server of your choice. Make sure the server is accessible from the devices you intend to use to control the Smart Pet Feeder Application.

4. Access the web application:
   - Use a web browser to access the hosted web application. From there, you can monitor and control the feeding process remotely, depending on the chosen mode of operation.

## System Requirements

- Raspberry Pi with appropriate connectivity modules (e.g., RFID reader, Servo Motor, Load Cell)
- Database system to store pet information
- Server with hosting capabilities for the web application