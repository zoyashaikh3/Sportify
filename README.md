
# Sportify – Sports Event & Player Connection Platform
🔍 Overview

Sportify is a web-based sports event management and player connection platform designed to connect sports enthusiasts with local players, playgrounds, and upcoming sporting events. The platform allows users to discover available sports events, participate in upcoming matches, and create their own sports challenges.

The project provides a simple and interactive interface where users can view sports events, apply for participation, create new events, and connect with other players based on their preferred sport and location.

A key feature of Sportify is the "Dare To Bet" concept, which adds an engaging challenge-based experience to sports activities.

⚙️ Tech Stack
🖥️ Frontend
HTML5 — Structure and layout of the web pages
CSS3 — Styling, responsive layouts, colors, forms, cards, and UI components
JavaScript — Client-side interactions, form handling, validation, and dynamic functionality
⚙️ Backend
PHP — Server-side application logic, user handling, event management, and database communication
🗄️ Database
MariaDB — Database management system
SQL — Used for storing, retrieving, updating, and managing user and sports-event data
🚀 Key Features
🏠 1. Sportify Home Page

The home page provides an introduction to the Sportify platform and explains how it connects users with nearby sports enthusiasts and sporting venues.

Users can access major features such as:

Play in an Upcoming Event
Create Your Own Challenge
Learn More
User Logout
🏟️ 2. Upcoming Sports Events

Users can browse upcoming sports events available on the platform.

Each event displays information such as:

Event Name
Turf / Playground Name
Location and Sector
Date
Start and End Time
Sport
Entry Fee
Minimum Team Members
Winning Prize

For example:

Weekend Football Championship

Turf: Vashi – Dribble Haware Fantasia
Sport: Football
Entry Fee: ₹500
Minimum Members: 5
Winning Prize: ₹2500

Users can enter their phone number and email address and apply for the event.

➕ 3. Create Your Own Sports Event

Sportify allows users to create their own sporting events.

The event creation form includes:

Event Name
Playground Selection
Event Date
Start Time
End Time
Sport
Entry Fee
Minimum Team Members
Winning Prize

This feature allows users to organize their own football, cricket, or other sports matches.

👥 4. Player Connection

Sportify is designed to help sports enthusiasts find and connect with nearby players.

Users can discover events according to their:

Preferred sport
Location
Available playgrounds
Event schedule

This makes it easier for players to participate in games even when they do not already have a complete team.

🏆 5. Dare To Bet

The "Dare To Bet" feature adds a challenge-oriented element to the platform.

It provides an additional way for users to engage with sports challenges and make their sporting experience more exciting.

🔐 6. User Authentication

The system includes user authentication functionality, allowing registered users to access the platform and securely log out of their accounts.

The interface displays the currently logged-in user and provides a Logout option.

🧩 How It Works

The basic workflow of Sportify is:

             ┌─────────────────┐
             │      User       │
             └────────┬────────┘
                      │
                      ▼
             ┌─────────────────┐
             │ Sportify Website│
             │ HTML/CSS/JS     │
             └────────┬────────┘
                      │
          ┌───────────┴───────────┐
          ▼                       ▼
 ┌─────────────────┐     ┌─────────────────┐
 │ Browse Events   │     │ Create Event    │
 └────────┬────────┘     └────────┬────────┘
          │                       │
          └───────────┬───────────┘
                      ▼
             ┌─────────────────┐
             │      PHP        │
             │ Backend Logic   │
             └────────┬────────┘
                      │
                      ▼
             ┌─────────────────┐
             │    MariaDB      │
             │  SQL Database   │
             └─────────────────┘
Event Participation Flow
User
  ↓
View Upcoming Events
  ↓
Select Sports Event
  ↓
Enter Phone + Email
  ↓
Apply
  ↓
Application Stored/Processed
Event Creation Flow
User
  ↓
Create Your Own Challenge
  ↓
Enter Event Details
  ↓
Select Playground
  ↓
Set Date & Time
  ↓
Set Entry Fee & Prize
  ↓
Create Event
  ↓
Event Available to Other Players
📁 Project Structure

A typical structure for the Sportify project can be organized as:

Sportify/
│
├── index.php
├── login.php
├── register.php
├── logout.php
│
├── upcoming-events.php
├── create-event.php
├── about.php
├── apply.php
│
├── css/
│   └── style.css
│
├── js/
│   └── script.js
│
├── images/
│   └── sports/
│
├── database/
│   └── sportify.sql
│
└── README.md
🗄️ Database

MariaDB is used to manage the application's data. SQL queries are used to perform operations such as:

Creating users
Storing login information
Creating sports events
Storing playground details
Retrieving upcoming events
Managing event applications
Updating event information

Possible database entities include:

Users
  │
  ├── User ID
  ├── Name
  ├── Email
  └── Password
       
Sports Events
  │
  ├── Event ID
  ├── Event Name
  ├── Playground
  ├── Date
  ├── Start Time
  ├── End Time
  ├── Sport
  ├── Entry Fee
  ├── Minimum Members
  └── Winning Prize

Applications
  │
  ├── Application ID
  ├── Event ID
  ├── User ID
  ├── Phone
  └── Email
🖥️ Running the Project Locally

The project can be hosted locally using a PHP development environment such as XAMPP/WAMP with MariaDB.

1️⃣ Start the Server

Start:

Apache
MariaDB/MySQL
2️⃣ Configure Database

Create the Sportify database in phpMyAdmin and import the project's SQL database file.

3️⃣ Place Project Files

Place the Sportify project inside the server's web directory, for example:

htdocs/Sportify/
4️⃣ Open the Website

The project can then be accessed locally through:

http://localhost:8000/
🎯 Objective

The main objective of Sportify is to provide a centralized platform where sports enthusiasts can:

Find nearby sports events
Join existing matches
Discover playgrounds
Connect with other players
Create their own sports events
Organize teams
Participate in sports challenges
🔮 Future Improvements

Future versions of Sportify can include:

📍 GPS-based nearby event discovery
💳 Online payment for event registration
🔔 Event and match notifications
💬 Player-to-player chat
⭐ Player and venue ratings
📱 Mobile application
🗺️ Interactive turf/map integration
🏅 Player rankings and leaderboards
📊 Sports participation analytics
🔐 Enhanced authentication and security
🏆 Tournament management
📜 Project Summary

Sportify is a full-stack web application developed using PHP, MariaDB, SQL, HTML, CSS, and JavaScript. It focuses on simplifying the process of finding, joining, and organizing local sports events. With features such as upcoming events, event creation, player participation, playground selection, and Dare To Bet challenges, Sportify provides an interactive platform for sports communities.

Technologies:
PHP | MariaDB | SQL | HTML5 | CSS3 | JavaScript

Project: Sportify – Your Game, Your Turf, Your Win.
