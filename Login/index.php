<?php
include '../db.php';
session_start();

$error_message = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id']; // Assuming you store user ID in session
            $_SESSION['username'] = $username; // Store username in session
            header("Location: ../");
            exit();
        } else {
            $error_message = "Incorrect password.";
        }
    } else {
        $error_message = "No user found with that username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sportify</title>
    <link rel="icon" type="image/x-icon" href="../assets/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Jersey+10&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");


        /* General styles */
        * {
            font-family: "Inter", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Inter", sans-serif;
            background-color: hsl(229, 31%, 21%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            user-select: none;
            overflow: hidden;
            /* Prevent scrolling */
        }

        .form-container {
            background-color: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
            position: relative;
        }

        h2 {
            color: hsl(229, 31%, 21%);
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            font-weight: bold;
        }

        h2 span {
            font-size: 2.5rem;
            font-family: "Jersey 10", sans-serif;
        }

        .alert {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: hsl(0, 94%, 66%);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }


        .alert.show {
            display: block;
        }

        /* Input fields */
        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 0.9rem;
            margin-bottom: 1.2rem;
            border: 1px solid hsl(231, 69%, 60%);
            border-radius: 6px;
            background-color: white;
            color: hsl(229, 31%, 21%);
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: hsl(0, 94%, 66%);
            box-shadow: 0 0 0 3px hsl(0, 94%, 66%, 0.3);
            outline: none;
        }

        /* Button */
        button[type="submit"] {
            width: 100%;
            padding: 0.9rem;
            background-color: hsl(0, 94%, 66%);
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-family: "Jersey 10", sans-serif;
            letter-spacing: 5px;
        }

        button[type="submit"]:hover {
            background-color: hsl(0, 94%, 60%);
            transform: translateY(-1px);
        }

        /* Link */
        p {
            margin-top: 1.5rem;
            color: hsl(229, 31%, 21%);
            font-size: 0.9rem;
        }

        p a {
            color: hsl(231, 69%, 60%);
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        p a:hover {
            color: hsl(0, 94%, 66%);
        }

        /* Home icon */
        .home-icon {
            position: absolute;
            top: 1rem;
            left: 1rem;
            font-size: 1.5rem;
            color: hsl(0, 94%, 66%);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .home-icon:hover {
            color: hsl(0, 94%, 60%);
        }

        /* Responsive adjustments */
        @media (max-width: 400px) {
            .form-container {
                width: 90%;
                padding: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <?php if ($error_message): ?>
            <div class="alert show" id="alert-box"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <i class="fas fa-home home-icon" onclick="window.location.href='../';"></i>
        <form action="../Login/" method="post">
            <h2>Log In To <span>Sportify</span></h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Log In</button>
            <p>Don't have an account? <a href="../Signup/">Sign up here</a></p>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                alertBox.classList.add('animate__animated', 'animate__fadeIn');
                alertBox.style.opacity = '1';
                alertBox.style.visibility = 'visible';

                setTimeout(function() {
                    alertBox.classList.remove('animate__fadeIn');
                    alertBox.classList.add('animate__fadeOut');
                    setTimeout(function() {
                        alertBox.style.display = 'none';
                        ox
                    }, 300);
                }, 5000); // 5 seconds
            }
        });
    </script>
</body>

</html>