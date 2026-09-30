# 🏆 Sportify – Sports Event & Player Connection Platform

> 🚀 **The project is running on:** [http://localhost:8080/](http://localhost:8080/) (or [http://127.0.0.1:8080/](http://127.0.0.1:8080/))

The project is running on: http://localhost:8080/

Sportify is a **web-based sports event management and player connection platform** designed to connect sports enthusiasts with local players, playgrounds, and upcoming sporting events.

The platform allows users to **discover sports events, apply for upcoming matches, create their own sports events, and connect with other players** based on their preferred sport and location.

A key feature of Sportify is the **"Dare To Bet"** concept, which adds an engaging challenge-based experience to sports activities.

---

## 🚀 Features

### 🏠 Home Page

- Introduction to the Sportify platform
- Information about sports activities
- **Play in an Upcoming Event**
- **Create Your Own Challenge**
- Learn More option
- User logout functionality

### 🏟️ Upcoming Sports Events

Users can browse upcoming events with details such as:

- Event Name
- Turf / Playground
- Location and Sector
- Date
- Start and End Time
- Sport
- Entry Fee
- Minimum Team Members
- Winning Prize

Users can enter their **phone number and email** to apply for an event.

### ➕ Create Your Own Sports Event

Users can create and organize their own sports events by providing:

- Event Name
- Playground
- Event Date
- Start Time
- End Time
- Sport
- Entry Fee
- Minimum Team Members
- Winning Prize

### 👥 Player Connection

Sportify helps sports enthusiasts discover events based on:

- Preferred sport
- Location
- Available playgrounds
- Event schedule

This makes it easier for players to find and participate in local games.

### 🏆 Dare To Bet

The **Dare To Bet** feature provides a challenge-oriented experience and adds an additional interactive element to sports activities.

### 🔐 User Authentication

- User login
- User session handling
- User logout
- Access to sports activities for registered users

---

## 🛠️ Tech Stack

### 💻 Frontend

- **HTML5** – Web page structure
- **CSS3** – Styling and responsive UI
- **JavaScript** – Client-side interaction and functionality

### ⚙️ Backend

- **PHP** – Server-side logic, event management, authentication, and database communication

### 🗄️ Database

- **MariaDB** – Database management
- **SQL** – Data storage, retrieval, and management

---

## 🧩 How It Works

```text
                    ┌───────────────┐
                    │     User      │
                    └───────┬───────┘
                            │
                            ▼
                  ┌──────────────────┐
                  │ Sportify Website │
                  │  HTML/CSS/JS     │
                  └────────┬─────────┘
                           │
                 ┌─────────┴─────────┐
                 ▼                   ▼
        ┌─────────────────┐ ┌─────────────────┐
        │  Browse Events  │ │  Create Event   │
        └────────┬────────┘ └────────┬────────┘
                 │                   │
                 └─────────┬─────────┘
                           ▼
                  ┌──────────────────┐
                  │       PHP        │
                  │  Backend Logic   │
                  └────────┬─────────┘
                           │
                           ▼
                  ┌──────────────────┐
                  │     MariaDB      │
                  │   SQL Database   │
                  └──────────────────┘
```

---

## 📋 Event Participation Flow

```text
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
Application Stored / Processed
```

---

## ➕ Event Creation Flow

```text
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
```

---

## 📁 Project Structure

```text
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
```

---

## 🗄️ Database

Sportify uses **MariaDB** for managing application data and **SQL** for database operations.

The database handles:

- User accounts
- Login information
- Sports events
- Playground details
- Event applications
- Event information

### 👤 Users

| Field |
|---|
| User ID |
| Name |
| Email |
| Password |

### 🏟️ Sports Events

| Field |
|---|
| Event ID |
| Event Name |
| Playground |
| Date |
| Start Time |
| End Time |
| Sport |
| Entry Fee |
| Minimum Members |
| Winning Prize |

### 📝 Applications

| Field |
|---|
| Application ID |
| Event ID |
| User ID |
| Phone |
| Email |

---

## 💻 Running the Project Locally

### 1. Start the Server

Use a PHP development environment such as **XAMPP/WAMP**.

Start:

- Apache
- MariaDB/MySQL

### 2. Configure the Database

1. Open **phpMyAdmin**
2. Create the Sportify database
3. Import the SQL database file:

```text
database/sportify.sql
```

### 3. Place the Project

Place the project inside your server's web directory:

```text
htdocs/Sportify/
```

### 4. Run the Project

The project is running on: http://localhost:8080/

Open the project in your browser:

```text
http://localhost:8080/
```

---

## 🎯 Objective

The main objective of Sportify is to provide a centralized platform where sports enthusiasts can:

- Find nearby sports events
- Join existing matches
- Discover playgrounds
- Connect with other players
- Create their own sports events
- Organize teams
- Participate in sports challenges

---

## 🔮 Future Improvements

- 📍 GPS-based nearby event discovery
- 💳 Online payment for event registration
- 🔔 Event and match notifications
- 💬 Player-to-player chat
- ⭐ Player and venue ratings
- 📱 Mobile application
- 🗺️ Interactive turf/map integration
- 🏅 Player rankings and leaderboards
- 📊 Sports participation analytics
- 🔐 Enhanced authentication and security
- 🏆 Tournament management

---

## 📌 Project Summary

Sportify is a **full-stack web application** developed using **PHP, MariaDB, SQL, HTML, CSS, and JavaScript**. It focuses on simplifying the process of **finding, joining, and organizing local sports events**.

With features such as **upcoming events, event creation, player participation, playground selection, user authentication, and Dare To Bet challenges**, Sportify provides an interactive platform for sports communities.

---

## 🛠️ Technologies Used

- **PHP**
- **MariaDB**
- **SQL**
- **HTML5**
- **CSS3**
- **JavaScript**

---

## 🏆 Project

### **Sportify – Your Game, Your Turf, Your Win.**
