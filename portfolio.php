<!DOCTYPE html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv ="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maoi Madrid</title>
        <link rel ="icon" type="image/x-icon" href="まおまお.png">
        <link rel="stylesheet" href = "portfolio.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header class="header" id="header">
            <a href ="index.php" class="logo"><img src = "マo.png" alt="logo"></a>
            <nav class="navbar">
                <a href ="index.php">Home</a>
                <a href ="aboutme.php">About</a>
                <a href ="portfolio.php">Portfolio</a>
                <a href ="contact.php">Contact</a>
            </nav>
        </header>
        <div class ="portgal">
            <div class = "title">
                <h2>PORTFOLIO</h2>
            </div>
        </div>
        <div class="gallery">
            <div class="artworks" data-name="Cardcaptor Sakura">
                <img src ="sakura_may2020.jpg" alt="Cardcaptor Sakura illustration">
                <h6>Sakura from Cardcaptor Sakura(2020)</h6>
            </div>
            <div class="artworks" data-name="Desiderata">
                <img src ="desiderata_aug2020.jpg" alt="Girl on pillars illustration">
                <h6>Illustration inspired by Max Ehrmann's Desiderata(2020)</h6>
            </div>
            <div class="artworks" data-name="Orange">
                <img src ="orange_aug2020.jpg" alt="Short-haired girl illustration">
                <h6>Illustration of an intrigued girl(2020)</h6>
            </div>
            <div class="artworks" data-name="Digital Self-portrait: Side-profile">
                <img src ="maoi_sep2020.jpg" alt="Side profile of a girl">
                <h6>Self-portrait of my side profile(2020)</h6>
            </div>
            <div class="artworks" data-name="Book cover design">
                <img src ="nuestbookcoverdesign1_oct2020.jpg" alt="Book cover design">
                <h6>Book cover design inspired by NU'EST's "If We"(2020)</h6>
            </div>
            <div class="artworks" data-name="Razor">
                <img src ="razorgenshin_nov2020.jpg" alt="Sketch of Razor from Genshin">
                <h6>Razor from Genshin Impact(2020)</h6>
            </div>
            <div class="artworks" data-name="Genshin Trio">
                <img src ="razordionasucrose_apr2021.jpg" alt="Head illustrations from Genshin Impact">
                <h6>Chibi head illustrations of Razor, Diona and
                    <br>Sucrose from Genshin Impact(2021)</h6>
            </div>
            <div class="artworks" data-name="Girl">
                <img src ="bjin_may2021.jpg" alt="Girl">
                <h6>Illustration of a girl(2021)</h6>
            </div>
            <div class="artworks" data-name="Skye">
                <img src ="skyevalorant_jan2023.jpg" alt="Illustration of Skye from Valorant">
                <h6>Illustration of Skye from Valorant(2023)</h6>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
    <script>
        window.addEventListener('scroll', function() {
    var header = document.getElementById('header');
    if (window.scrollY > 0) {
        header.classList.add('hide');
    } else {
        header.classList.remove('hide');
    }
});
    </script>
    </body>
</html>