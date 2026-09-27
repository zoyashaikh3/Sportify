<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? htmlspecialchars($_SESSION['username']) : '';
$homePaddingTop = $isLoggedIn ? '5rem' : '15rem';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify - Dare To Bet</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/x-icon" href="./assets/logo.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="assets/logo.png" alt="logo-bookmark">
        </div>

        <nav class="navbar">
            <?php if ($isLoggedIn): ?>
                <a href="logout.php" class="btn">
                    Logout from <?php echo htmlspecialchars($_SESSION['username']); ?>
                </a>
            <?php else: ?>
                <a href="./Login/" class="btn">Log in</a>
                <a href="./Signup/" class="btn">Sign up</a>
            <?php endif; ?>
        </nav>

        <div class="fas fa-bars" id="menu-btn"></div>
    </header>

    <?php if ($isLoggedIn): ?>
        <section class="welcome-message">
            <div class="content">
                <h2>Welcome to <span>Sportify, <?php echo $username; ?>!</span></h2>
            </div>
        </section>
    <?php endif; ?>


    <section class="home" id="home" style="padding-top: <?php echo $homePaddingTop; ?>;">
        <div class="content">
            <h1>SPORTIFY</h1>
            <p>At Sportify, we connect you with nearby sports enthusiasts and the best turfs for your favorite games.
                Our platform makes it easy to find, join, or create matches in your area. Plus, our unique <strong>"Dare to Bet"</strong>
                feature adds extra excitement to every game. Whether you're here for fun or serious competition,
                Sportify is your go-to destination for all things sports.</p>
            <a href="#Learn-More" class="home-btn">Learn More.</a>
        </div>
        <div class="image">
            <img src="./assets/bb.webp">
        </div>
    </section>

    <section class="features">
        <div class="heading">
            <h1>More About <span>Sportify</span></h1>
            <p>Sportify connects you with local players and top turfs for exciting sports matches. Join games, create
                your own, and challenge others with our unique <strong>"Dare to Bet"</strong> feature.
                <br>
                <strong><u>Your game, your turf, your win.</u></strong>
            </p>
        </div>
    </section>


    <?php if (!$isLoggedIn): ?>
        <section class="features">
            <div class=" heading">
                <strong>
                    <p>
                        <u>Login to Play in an upcoming event,</u>
                    </p>
                    <p>
                        <u>Or Create your own challenge!!</u>
                    </p>

                </strong>
            </div>
        </section>
    <?php endif; ?>


    <?php if ($isLoggedIn): ?>
        <section class="user-options">
            <div class="option-box">
                <a href="./playwithus/?|&play_in_an_upcoming_event&|~<?php echo $username ?>" class="btn">Play in an upcoming event</a>
            </div>
            <div class="option-box">
                <a href="./create/?|&create_your_own_challenge&|~<?php echo $username ?>" class="btn">Create your own challenge</a>
            </div>
        </section>
    <?php endif; ?>

    <script src="js/main.js"></script>
</body>

</html>