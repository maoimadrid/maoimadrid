<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_account.php");
}
// Include the database connection file
include ('./database.php');

?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv ="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maoi Madrid</title>
        <link rel ="icon" type="image/x-icon" href="まおまお.png">
        <link rel="stylesheet" href = "contactme.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header class="header">
            <a href ="index.php" class="logo"><img src = "マo.png" alt="logo"></a>
            <nav class="navbar">
                <a href ="index.php">Home</a>
                <a href ="aboutme.php">About</a>
                <a href ="portfolio.php">Portfolio</a>
                <a href ="contact.php">Contact</a>
            </nav>
        </header>
        <div class ="container">
            <div class ="item">
                <div class ="contact">
                    <div class="first-text">Let's get in touch</div>
                    <img src="マo.png" alt="Logo"class="conlogo">
                    <div class="other-info">
                        <iconify-icon icon="mdi:gmail"></iconify-icon><p>aoimadrid1201@gmail.com</p>
                        <iconify-icon icon="bi:phone"></iconify-icon><p>0968 718 28XX</p>
                    </div>
                    <div class="social-media">
                        <span class="second-text">Connect with me:</span>
                        <ul class="socmed">
                            <li><a href="https://www.facebook.com/maomao.1201/" target="_blank"><iconify-icon icon="ic:baseline-facebook"></iconify-icon></a></li>
                            <li><a href="https://ph.linkedin.com/in/maoi-madrid-ab30b2272" target="_blank"><iconify-icon icon="mdi:linkedin"></iconify-icon></a></li>
                            <li><a href="https://github.com/maoimadrid" target="_blank"><iconify-icon icon="mdi:github"></iconify-icon></a></li>
                            <li><a href="https://ko-fi.com/matchaoi" target="_blank"><iconify-icon icon="simple-icons:kofi"></iconify-icon></a></li>
                        </ul>
                    </div>
                </div>    
                <div class ="submit-form">
                    <h4 class="third-text text">Contact Me</h4>
                    <form method="POST" action="logout_account.php">
                        <div class="input-box">
                            <textarea name="" class="input" required></textarea>
                            <label for="">Message</label>
                        </div>
                        <button type="submit" class="btn">Send</button>
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    </body>
</html>