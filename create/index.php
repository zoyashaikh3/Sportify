<?php
include '../db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../Login/");
    exit();
}

$error_message = '';
$success_message = '';
$events_result = '';

// Handle event creation
if (isset($_POST['create_event'])) {
    $username = $_SESSION['username'];
    $event_name = $_POST['event_name'];
    $playground_id = $_POST['playground_id'];
    $event_date = $_POST['event_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $sports = $_POST['sports'];
    $entry_fee = $_POST['entry_fee'];
    $min_members = $_POST['min_members'];
    $winning_prize = $_POST['winning_prize'];

    if (empty($event_name) || empty($playground_id) || empty($event_date) || empty($start_time) || empty($end_time) || empty($sports) || empty($entry_fee) || empty($min_members) || empty($winning_prize)) {
        $error_message = "All fields are required.";
    } else {
        $sports_string = implode(', ', $sports);
        $created_on = date('Y-m-d H:i:s');
        $sql = "INSERT INTO events (created_on, created_by, event_name, playground_id, event_date, start_time, end_time, sports, entry_fee, min_members, winning_prize)
                VALUES ('$created_on', '$username', '$event_name', '$playground_id', '$event_date', '$start_time', '$end_time', '$sports_string', '$entry_fee', '$min_members', '$winning_prize')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Event created successfully!";
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}

// Handle event deletion
if (isset($_POST['delete_event'])) {
    $event_id = $_POST['event_id'];
    $sql = "DELETE FROM events WHERE id = '$event_id' AND created_by = '{$_SESSION['username']}'";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Event deleted successfully!";
    } else {
        $error_message = "Error deleting event: " . $conn->error;
    }
}

// Fetch playgrounds for the dropdown
$playgrounds = $conn->query("SELECT id, playgoundlist FROM playgoundlist");

// Fetch user's created events along with applications
$events_result = $conn->query("SELECT e.*, p.playgoundlist, p.sector 
                               FROM events e 
                               LEFT JOIN playgoundlist p ON e.playground_id = p.id
                               WHERE e.created_by = '{$_SESSION['username']}' 
                               ORDER BY e.created_on DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Own Challenge - Sportify</title>
    <link rel="icon" type="image/x-icon" href="../assets/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="form-container">
        <div class="home-icon">
            <a href="../">
                <i class="fas fa-home fa-2x"></i>
            </a>
        </div>
        <?php if ($error_message): ?>
            <div class="alert show"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <?php if ($success_message): ?>
            <div class="alert show success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <h2>Create a <span>Sports Event</span></h2>
            <input type="text" name="event_name" placeholder="Event Name" required>

            <p>Select Playground</p>
            <select name="playground_id" required>
                <option value="">No Option Selected</option>
                <?php while ($row = $playgrounds->fetch_assoc()): ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['playgoundlist']; ?></option>
                <?php endwhile; ?>
            </select>

            <input type="date" name="event_date" required>

            <p>Start Time</p>
            <input type="time" name="start_time" required>

            <p>End Time</p>
            <input type="time" name="end_time" required>

            <p>Which Sports</p>
            <select id="sports" name="sports[]" multiple required>
                <option value="Football">Football</option>
                <option value="Cricket">Cricket</option>
                <option value="Net Cricket">Net Cricket</option>
                <option value="Badminton">Badminton</option>
                <option value="Tennis">Tennis</option>
                <option value="Basketball">Basketball</option>
            </select>

            <input type="number" name="entry_fee" placeholder="Entry Fee" required>
            <input type="number" name="min_members" placeholder="Minimum Members in Team" required>
            <input type="number" name="winning_prize" placeholder="Winning Prize" required>

            <button type="submit" name="create_event">Create Event</button>
        </form>

        <!-- Display User's Created Events and Applications -->
        <div class="user-events">
            <h2>Your Created Events</h2>
            <?php if ($events_result && $events_result->num_rows > 0): ?>
                <?php while ($event = $events_result->fetch_assoc()): ?>
                    <div class="event-box">
                        <h3><?php echo htmlspecialchars($event['event_name']); ?></h3>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($event['event_date']); ?></p>
                        <p><strong>Time:</strong> <?php echo htmlspecialchars($event['start_time']); ?> - <?php echo htmlspecialchars($event['end_time']); ?></p>
                        <p><strong>Playground:</strong> <?php echo htmlspecialchars($event['playgoundlist']); ?>, <?php echo htmlspecialchars($event['sector']); ?></p>
                        <p><strong>Sports:</strong> <?php echo htmlspecialchars($event['sports']); ?></p>
                        <p><strong>Entry Fee:</strong> ₹<?php echo htmlspecialchars($event['entry_fee']); ?></p>
                        <p><strong>Min Members:</strong> <?php echo htmlspecialchars($event['min_members']); ?></p>
                        <p><strong>Winning Prize:</strong> ₹<?php echo htmlspecialchars($event['winning_prize']); ?></p>

                        <!-- Delete Event Form -->
                        <form action="" method="post" onsubmit="return confirmDelete();">
                            <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
                            <button type="submit" name="delete_event" class="delete-btn">Delete Event</button>
                        </form>


                        <!-- Display Applications -->
                        <?php
                        // Fetch applications for the specific event with username from users table
                        $applications = $conn->query("SELECT a.*, u.username 
                                                      FROM event_applications a
                                                      JOIN users u ON a.user_id = u.id
                                                      WHERE a.event_id = '{$event['id']}'");
                        if ($applications && $applications->num_rows > 0): ?>
                            <div class="applications">
                                <h4>Applications:</h4>
                                <?php while ($app = $applications->fetch_assoc()): ?>
                                    <div class="application-box">
                                        <p><strong>Applicant Username:</strong> <?php echo htmlspecialchars($app['username']); ?></p>
                                        <p><strong>Email:</strong> <?php echo htmlspecialchars($app['email']); ?></p>
                                        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($app['phone_number']); ?></p>
                                        <p><strong>Applied On:</strong> <?php echo htmlspecialchars($app['applied_on']); ?></p>
                                        <br>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php else: ?>
                            <p>No applications yet.</p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No events found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBoxes = document.querySelectorAll('.alert.show');
            alertBoxes.forEach(function(alertBox) {
                alertBox.classList.add('animate__animated', 'animate__fadeInDown');
                setTimeout(function() {
                    alertBox.classList.remove('animate__fadeInDown');
                    alertBox.classList.add('animate__fadeOutUp');
                    setTimeout(function() {
                        alertBox.style.display = 'none';
                    }, 500);
                }, 5000);
            });

            const sportsSelect = new Choices('#sports', {
                removeItemButton: true,
                maxItemCount: 3,
                searchEnabled: true,
            });
        });

        function confirmDelete() {
            return confirm("Are you sure you want to delete this event?");
        }
    </script>
</body>

</html>