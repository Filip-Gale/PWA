<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="css/admin.css?v=<?php echo time(); ?>">
    <link rel="shortcut icon" type="image/png" href="img/fav_logo.png"/>
    <meta charset="UTF-8">
    <title>BZ Admin</title>
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
        $uspjesnaPrijava = false;
        $msg = "";
        $admin = false;

            define('UPLPATH', 'img/');
            session_start();
            if(isset($_POST['submit'])){
                
                $prijavaImeKorisnika= $_POST['user'];
                $prijavaLozinkaKorisnika= $_POST['password'];
                $sql= "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime =?";
                $stmt= mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
                mysqli_stmt_fetch($stmt);
                //Provjera lozinke
                
                if(password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
                    $uspjesnaPrijava= true;
                    // Provjera da li je admin
                    if($levelKorisnika== 1) {
                        $admin= true;
                    }else{
                        $admin= false;
                    }//postavljanje session varijabli
                    $_SESSION['$username'] = $imeKorisnika;
                    $_SESSION['$level'] = $levelKorisnika;
                } else{
                    $uspjesnaPrijava= false;
                    $msg = "Unijeli ste pogrešno korisničko ime ili lozinku";
                }
            }


        $link = '"logout.php"';

        $sport = 'Sport';
        $kultura = 'Kultura';

        // Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je
        if(($uspjesnaPrijava== true && $admin== true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {

            if(!isset($imeKorisnika)){
                $imeKorisnika = $_SESSION['$username'];
            }
            
            echo '<div class = "naslov">';
            echo'<h2>Bok '. $imeKorisnika. '! Uspješno ste prijavljeni.</h2>';
            echo "</div>
            <div class='novi_racun'>
            <button id='login' onclick='window.location.href=$link'>Prijavi se na drugi račun</button>
            <a href='unos.html'>
            <button id='dodaj'>
                + Dodaj članak
            </button>
            </a>
            </div>
            ";
            

            
            $query= "SELECT * FROM clanak";
            $result= mysqli_query($dbc, $query);
            while($row= mysqli_fetch_array($result)) {
                echo'<form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                <label for="title">Naslov vjesti:</label>
                <div class="form-field">
                <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                </div></div>
                <div class="form-item">
                <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                <div class="form-field">
                <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                </div></div>
                <div class="form-item">
                <label for="content">Sadržaj vijesti:</label>
                <div class="form-field"><textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
                </div></div>
                <div class="form-item"><label for="pphoto">Slika:</label>
                <div class="form-field">
                <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/> 
                <br><img src="'. UPLPATH . $row['slika'] . '" width=100px alt="opis slike">
                </div></div><div class="form-item">
                <label for="category"> Kategorija vijesti:</label>
                <div class="form-field">
                <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                <option value="'.$sport.'"';
                if($row['kategorija'] == $sport){
                    echo ' selected';
                }
                echo '> Sport </option>
                <option value="'.$kultura.'"';
    
                if($row['kategorija'] == $kultura){
                    echo ' selected';
                }
                echo '> Kultura </option>
                </select></div></div>
                <div class="form-item">
                <label>Spremiti u arhivu: 
                <div class="form-field">';
    
                if($row['arhiva'] == 0) {
                    echo'<input type="checkbox" name="archive" id="archive"/> Arhiviraj';
                } else{
                    echo'<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj';
                }
                echo'</div></label></div></div>
                <div class="form-item">
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" name="update" value="Prihvati" id="promjena"> Izmjeni</button>
                <button type="submit" name="delete" value="Izbriši" id="brisanje" > Izbriši</button>
                </div></form>';
                
                if(isset($_POST['delete'])){
                    $id=$_POST['id'];
                    $EraseQuery= "DELETE FROM clanak WHERE id=$id";
                    $EraseResult= mysqli_query($dbc, $EraseQuery);
                    header("Location: admin.php");
                }
    
                if(isset($_POST['update'])){
                    $picture= $_FILES['pphoto']['name'];
                    $title=$_POST['title'];
                    $about=$_POST['about'];
                    $content=$_POST['content'];
                    $category=$_POST['category'];
                    if(isset($_POST['archive'])){
                        $archive=1;
                    }else{
                        $archive=0;
                    }
                    $target_dir= 'img/'.$picture;
                    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                    $id=$_POST['id'];
                    if($_FILES['pphoto']['name'] != ""){
                        $UpdateQuery= "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content', slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id";
                    }else{
                        $UpdateQuery= "UPDATE clanak SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id";
                    }
                    
                    $UpdateResult= mysqli_query($dbc, $UpdateQuery);
                    header("Location: admin.php");
                }
            }
        }
        elseif($uspjesnaPrijava== true && $admin== false) {
            echo '<div class = "naslov">';
            echo'<h2>Bok '. $imeKorisnika. '! Uspješno ste prijavljeni, ali niste administrator.</h2>';
            echo "</div>
            <div class='novi_racun'>
            <button id='login' onclick='window.location.href=$link'>Prijavi se na drugi račun</button>
            </div>
            ";
            
        }
        elseif(isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
            echo '<div class = "naslov">';
            echo'<h2>Bok '. $_SESSION['$username']. '! Uspješno ste prijavljeni, ali niste administrator.</h2>';
            echo "</div>
            <div class='novi_racun'>
            <button id='login' onclick='window.location.href=$link'>Prijavi se na drugi račun</button>
            </div>
            ";
            
        }
        elseif($uspjesnaPrijava== false) {
            ?>
            <div class="naslov">
                <h1>Prijava za administraciju</h1>
            </div>
            <section id="login_sekcija">
                <form enctype="multipart/form-data"  method="POST">
                    <div class="form-item">
                        <span id="porukaIme" class="bojaPoruke">
                        </span>
                        <label for="user">Korisničko ime: </label>
                        <div class="form-field">
                            <input type="text" name="user" id="user" class="form-field-textual">
                        </div>
                    </div>
                    <div class="form-item">
                        <span id="porukaPrezime" class="bojaPoruke">
                        </span>
                        <label for="password">Lozinka: </label>
                        <div class="form-field">
                            <input type="password" name="password" id="password" class="form-field-textual">
                        </div>
                    </div>
                    <?php echo'<br><span class="bojaPoruke">'.$msg.'</span><br>' ?>
                    <button name="submit" id="submit" type="submit" value="Pošalji">Prijava</button>
                </form>

                <div id=register_div>
                <br><p id="regTekst"> Nemate korisnički račun? Registrirajte se!</p>
                <button id="login2" onclick="window.location.href='Registracija.php'">Registracija</button> 
                </div>

            </section>
            <?php
            
        }
        mysqli_close($dbc);
        ?>
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