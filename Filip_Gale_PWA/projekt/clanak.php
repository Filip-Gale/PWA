<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/preview.css">
    <link rel="shortcut icon" type="image/png" href="img/fav_logo.png"/>
    <meta charset="UTF-8">
    <title>BZ Preview</title>
</head>
<body>
    <?php
        include 'connect.php';
        $id = $_GET['id'];
        $query= "SELECT * FROM clanak WHERE id = $id";
        $result= mysqli_query($dbc, $query);

        $row= mysqli_fetch_array($result);

        define('UPLPATH', 'img/');
        
        $naslov = $row['naslov'];
        $slika  = $row['slika'];
        $tekst = $row['tekst'];
    ?>
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
        <section>
           
            <div class= "news_title">
                <?php
                    echo "<h2>" . $naslov . "</h2>";
                ?>
            </div>
            <?php
                echo "<img src='" . UPLPATH . $slika ."' alt='opis slike'>";
            ?>
            
            
            <div class = "news_descript">
                <p>
                    <?php
                        echo $tekst;
                    ?>
                </p>
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