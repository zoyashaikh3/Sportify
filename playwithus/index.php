<?php
include '../db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/");
    exit();
}

// Query to fetch upcoming events with associated turf name
$sql = "SELECT e.*, p.playgoundlist, p.sector
        FROM events e
        JOIN playgoundlist p ON e.playground_id = p.id
        WHERE e.event_date >= CURDATE()
        ORDER BY e.event_date, e.start_time";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events - Sportify</title>
    <link rel="icon" type="image/x-icon" href="../assets/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="home-icon">
        <a href="../">
            <i class="fas fa-home fa-2x"></i>
        </a>
    </div>
    <div class="events-container">
        <h2>Upcoming Sports Events</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="event-card">
                    <h3><?php echo htmlspecialchars($row['event_name']); ?></h3>
                    <p><strong>Turf Name:</strong> <?php echo htmlspecialchars($row['playgoundlist']); ?>, <strong>Sector:</strong> <?php echo htmlspecialchars($row['sector']); ?></p>
                    <p><strong>Date:</strong> <?php echo htmlspecialchars($row['event_date']); ?></p>
                    <p><strong>Time:</strong> <?php echo htmlspecialchars($row['start_time']); ?> - <?php echo htmlspecialchars($row['end_time']); ?></p>
                    <p><strong>Sports:</strong> <?php echo htmlspecialchars($row['sports']); ?></p>
                    <p><strong>Entry Fee:</strong> ₹<?php echo htmlspecialchars($row['entry_fee']); ?></p>
                    <p><strong>Min Members:</strong> <?php echo htmlspecialchars($row['min_members']); ?></p>
                    <p><strong>Winning Prize:</strong> ₹<?php echo htmlspecialchars($row['winning_prize']); ?></p>

                    <!-- Apply Form -->
                    <form action="apply_event.php" method="POST">
                        <input type="hidden" name="event_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                        <input type="number" name="phone_number" placeholder="Your Phone Number" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <button type="submit" name="apply_event">Apply</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <h2 style="color: hsl(0, 94%, 66%);">No upcoming events found!!!</h2>
        <?php endif; ?>
    </div>
</body>

</html>