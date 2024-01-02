<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/Home.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="img/fav_logo.png"/>
    <meta charset="UTF-8">
    <title>BZ Home</title>
</head>
<body>
    <header>
        <div id = "header_topRed" ></div>
        <img id = "header_logo" src= "img/Logo_1200x574.png" alt="logo">
    </header>
    <nav>
        <ul id = "nav_ul">
            <li id ="nav_li_home" class="nav_li"><a href="index.php">Home</a></li>
            <li class="nav_li"><a href="kategorija.php?id=sport">Sport</a></li>
            <li class="nav_li"><a href="kategorija.php?id=kultura">Culture</a></li>
            <li class="nav_li"><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
    <main>
        <section id="section_sport">
            <div class="section_title">
                <p>berlin-sport ></p>
            </div>
            <div class="section_content">
                <?php
                include 'connect.php';

                $query= "SELECT * FROM clanak WHERE arhiva=1 AND kategorija = 'sport' ORDER BY id DESC LIMIT 3";
                $result= mysqli_query($dbc, $query);

                define('UPLPATH', 'img/');

                while($row= mysqli_fetch_array($result)){ 
                    $naslov = $row['naslov'];
                    $sazetak = $row['sazetak'];
                    $slika = $row['slika'];
                    echo "<article>";
                        echo'<a href="clanak.php?id='.$row['id'].'">';
                        echo "
                        <img src='" . UPLPATH . $slika . "' alt='opis slike'>
                        <div class= 'news_title'>
                            <h4> $naslov</h4>
                        </div>
                        <div class = 'news_descript'>
                        <p> $sazetak </p>
                        </div>
                        </a>
                    </article>";
                }
                ?>
                
            </div>
        </section>

        <section id="section_culture">
            <div class="section_title">
                <p>culture ></p>
            </div>
            <div class="section_content">
            <?php

            $query= "SELECT * FROM clanak WHERE arhiva=1 AND kategorija = 'kultura' ORDER BY id DESC LIMIT 3 ";
            $result= mysqli_query($dbc, $query);

            while($row= mysqli_fetch_array($result)){ 
                $naslov = $row['naslov'];
                $sazetak = $row['sazetak'];
                $slika = $row['slika'];
                echo "<article>";
                    echo'<a href="clanak.php?id='.$row['id'].'">';
                    echo "
                    <img src='" . UPLPATH . $slika ."' alt='opis slike'>
                    <div class= 'news_title'>
                        <h4> $naslov</h4>
                    </div>
                    <div class = 'news_descript'>
                    <p> $sazetak </p>
                    </div>
                    </a>
                </article>";
            }
            mysqli_close($dbc);
            ?>
            </div>
        </section>
    </main>
    <footer>
        <div id = "footer_content" >
            <div id= "footer_content_top"></div>
            <div id= "footer_content_bottom">
                <p>Author: Filip Gale</p>
                <p>E-mail: fgale@tvz.hr</p>
                <p>TVZ IRAČ, PWA 2021</p>
            </div>
        </div>
    </footer>
    
</body>
</html>