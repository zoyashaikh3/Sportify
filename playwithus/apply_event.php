<?php
include '../db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/");
    exit();
}

if (isset($_POST['apply_event'])) {
    $event_id = $_POST['event_id'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];
    $applied_on = date('Y-m-d H:i:s');

    // Check if the user has already applied for this event
    $check_sql = "SELECT * FROM event_applications WHERE user_id = '$user_id' AND event_id = '$event_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $error_message = "You have already applied for this event.";
    } else {
        // Insert the application into the database
        $sql = "INSERT INTO event_applications (event_id, user_id, phone_number, email, applied_on) 
                VALUES ('$event_id', '$user_id', '$phone_number', '$email', '$applied_on')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Application submitted successfully!";
            header("refresh:3; url=../");
        } else {
            $error_message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Event - Sportify</title>
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
    <div class="message-container">
        <?php if (isset($success_message)): ?>
            <div class="success-message animate__animated animate__fadeInDown">
                <h2><?php echo $success_message; ?></h2>
                <p style="color: white">Redirecting to home page in 3 seconds...</p>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="error-message animate__animated animate__fadeInDown">
                <h2><?php echo $error_message; ?></h2>
                <a href="../" class="back-home" style="text-decoration: none;">
                    <h2>
                        Back to home
                    </h2>
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>