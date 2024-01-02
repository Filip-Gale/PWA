<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/unos_confirm.css">
    <link rel="shortcut icon" type="image/png" href="img/fav_logo.png"/>
    <meta charset="UTF-8">
    <title>BZ Unos</title>
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
        <?php
            include 'connect.php';

            $picture =  $_FILES['picture']['name'];

            $naslov = $_POST['naslov'];
            $ksad =  $_POST['kSad'];
            $sad =  $_POST['sad'];
            $kategorija =  $_POST['kategorija'];
            $datum =  date("Y/m/d");

            
            $target_dir= 'img/'.$picture;
            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_dir);
            
            if(isset($_POST['archive'])){
                $arhiva = 1;
            }else{
                $arhiva = 0;
            }

            $query= "INSERT INTO clanak  (id, datum, naslov, sazetak, tekst, slika, kategorija, arhiva) 
                    VALUES(NULL, '$datum', '$naslov', '$ksad','$sad','$picture','$kategorija','$arhiva')";

            $result= mysqli_query($dbc, $query) or die('Error querying databese.');

            $query= "SELECT MAX(id) AS problem FROM clanak";
            $result= mysqli_query($dbc, $query);

            $row= mysqli_fetch_array($result);

            mysqli_close($dbc);
        ?>
        <div id="confirm">Uspješno uneseno :)</div><br>
        <div id="visit">
            <?php

            echo'<a href="clanak.php?id='.$row['problem'].'">';
            echo "
            <div id = 'visit_link'>
                Pregled
            </div>
            </a>";
            ?>
        </div><br>
        
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