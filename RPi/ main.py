#!/usr/bin/env python
import time
from datetime import datetime
import pyrebase
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import mysql.connector
from gpiozero import Servo
import math
from time import sleep
from hx711 import HX711                # import the class HX711
  
GPIO.setmode(GPIO.BCM)                 # set GPIO pin mode to BCM numbering
hx = HX711(dout_pin=5, pd_sck_pin=6)

hx.zero()

ratio = 1740
hx.set_scale_ratio(ratio)

from gpiozero.pins.pigpio import PiGPIOFactory

factory = PiGPIOFactory()

servo = Servo(12, min_pulse_width=0.5/1000, max_pulse_width=2.5/1000, pin_factory=factory)

servo.min()

db = mysql.connector.connect(
  host="sql12.freemysqlhosting.net",
  user="sql12618051",
  passwd="SsE8t7t545",
  database="sql12618051"
)

config = {
    "apiKey": "AIzaSyDVxlCiaLfXQvbKBNtHn7kbREvpwteMpCc",
    "authDomain": "smart-pet-feeder-f8232.firebaseapp.com",
    "databaseURL": "https://smart-pet-feeder-f8232-default-rtdb.asia-southeast1.firebasedatabase.app",
    "projectId": "smart-pet-feeder-f8232",
    "storageBucket": "smart-pet-feeder-f8232.appspot.com",
    "messagingSenderId": "613572040437",
    "appId": "1:613572040437:web:4a2117afc3c3793afc57bc",
    "measurementId": "G-1C8CHXKXKQ"
}

firebase = pyrebase.initialize_app(config)
database = firebase.database()



cursor = db.cursor()
reader = SimpleMFRC522()

while True:
    mode = database.child("setMode").get()
    while mode.val() == True:

        exitstate = database.child("exit").get()
        servostate = database.child("openDispenser").get()
        if servostate.val() == False:
            servo.min()
            print("Closing Dispenser")
            database.child("openDispenser").set(None)
        if servostate.val() == True:
            servo.mid()
            print("Opening Dispenser")
            database.child("openDispenser").set(None)
        if exitstate.val() == True:
            database.child("setMode").set(None)
            break
        

    while mode.val() == False:
        exitstate1 = database.child("exit1").get()
        print('Ready')
        id, text = reader.read()

        cursor.execute("Select id, name FROM users WHERE rfid_uid="+str(id))
        result = cursor.fetchone()


        if cursor.rowcount >= 1:
            t = time.localtime()
            current_time = time.strftime("%H:%M", t)
            dt = datetime.now()
            name = dt.strftime('%A')
            starttime = database.child("schedules/" + name + "/start").get()
            endtime = database.child("schedules/" + name + "/end").get()
            targetweight = database.child("schedules/" + name + "/weight").get()
            tw = float(targetweight.val())
            if starttime.val() <= current_time and endtime.val() >= current_time:
                print("Welcome " + result[1])
                servo.mid()
                while True:
                    weight = hx.get_weight_mean()
                    if(weight >= tw):
                        break
                servo.min()
                cursor.execute("INSERT INTO attendance (user_id) VALUES (%s)", (result[0],) )
                db.commit()
            else:
                print("Not within Time Range")
        else:
            print("Pet does not exist.")
        if exitstate1.val() == True:
            database.child("setMode").set(None)
            break

    
    
#finally:
GPIO.cleanup()

