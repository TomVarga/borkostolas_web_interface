<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
    <title>Borkóstolás</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <!-- <script type="text/javascript" src="Chart.min.js"></script> -->
    <!-- <script type="text/javascript" src="Legend.js"></script> -->
    <script type="text/javascript" src="http://numericjs.com/lib/numeric-1.2.6.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/Main.js"></script>
    <script type='text/javascript'>
        $(function () {
            $('.topScrollingBlockWrapperForInupt').on('scroll', function (e) {
                $('.leftTableContainerForInput').scrollLeft($('.topScrollingBlockWrapperForInupt').scrollLeft());
            });
            $('.leftTableContainerForInput').on('scroll', function (e) {
                $('.topScrollingBlockWrapperForInupt').scrollLeft($('.leftTableContainerForInput').scrollLeft());
            });
        });
        $(window).on('load', function (e) {
            $('.topScroll').width($('.leftTableForInput').width());
        });
    </script>
    <script type="text/javascript">
        google.load('visualization', '1.0', {'packages':['corechart']});
        // google.setOnLoadCallback(drawChart);
    </script>
</head>


<body>
<div id="wrapper">
    <!--HEADER/LOGO-->
    <div id="header">
        <div id="logo">
            <img src="resources/images/header_image.jpg" alt="Fejléc kép" class="headerImage" />
            <h1>Borkóstolás</h1>
        </div>

        <!--TAB NAVIGATION-->
        <div id="topnav">
            <a href="index.php">Főoldal</a>
            <a href="borkostolasEredmenyek.php">Eredmények</a>
            <a href="demo.php" class="active">Demó</a>
            <a href="modszerek.php">Módszerek</a>
            <a href="kapcsolat.php">Kapcsolat</a>
        </div>
    </div>

    <div id="contentWrapper">
        <!--SIDE BAR CONTENT-->
        <div id="sidebar">
            <div id="container2">
                <div class="blocklinks">
                    <?php include("login3/views/sideBarProfile.php"); ?>
                    <h3>Legfrisseb információk &rsaquo;</h3>
                    <a href="http://bor.tvarga.hu/borkostolas.apk" class="link" target="_blank">Android alkalmazás</a>
                    <h3>Linkek &rsaquo;</h3>
                    <a href="http://www.inf.u-szeged.hu/~london/" class="link">London András honlapja</a>
                    <a href="http://www.inf.u-szeged.hu/~csendes/" class="link">Csendes Tibor honlapja</a>
                </div>
            </div>
        </div>
        <!--MAIN CONTENT-->
        <div id="content">
            <?php
					if ($login->isUserLoggedIn() == true) {
            // echo "logged in". $_SESSION['user_id'];
            $db_connection = null;
            function databaseConnection(){
            global $db_connection;
            // if connection already exists
            if ($db_connection != null) {
            return true;
            } else {
            try {
            $db_connection = new PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            return true;
            } catch (PDOException $e) {
            $errors[] = MESSAGE_DATABASE_ERROR . $e->getMessage();
            }
            }
            return false;
            }
            databaseConnection();
            echo "<h2> Demó &rsaquo;</h2>
            <p>
                <!-- 			<a href='#' id='test' onclick='test()'>Teszt adatok használata</a><br /> -->
                <!--				<a href='#' id='probaketto' onclick='probaketto()'>Teszt proba 2</a><br /> -->
                <!--				<a href='#' id='probaharom' onclick='probaharom()'>Teszt proba 3</a><br /> -->
                <!--				<br /> -->
                <!--				Kóstolók száma: -->
                <!--				<input type='text' id='kostolok' name='Kóstolók száma' class='headerInput' value=''><br /> -->
                <!--				Borok száma: -->
                <!--				<input type='text' id='borok' name='Borok száma' class='headerInput' value=''><br /> -->
                Algoritmus:
                <select id='algoritmus' name='Algoritmus'>
                    <option value='hits'>Co_HITS</option>

                    <option value='hamming'>Hamming</option>
                    <option value='cosine'>Koszinusz</option>
                    <option value='precedence'>Precedencia</option>
                    <option value='adjacency'>Összefüggőségi</option>
                    <option value='positional'>Pozíció szerint</option>
                    <!--<option value='sajat'>Saját</option>-->
                </select>
                <br />
                <!-- <a href='#' id='matrixGenerator' onclick='addMatrix()'>Beviteli mezők generálása</a><br /> -->
            </p>
            <div class='topScrollingBlockWrapperForInupt'>
                <div class='topScroll'><br /></div>
            </div>
            <div class='tableContainer'>
                <div class='leftTableContainerForInput'>
                    <table class='leftTableForInput'>
                        <thead>
                        <tr>
                            <th>Sorszám</th>
                            <th>Bor</th>
                            <th>Pincészet</th>
                            <th></th>
                            <th>Évjárat</th>
                            <th>Összetétel</th>
                            <th>Ár (HUF)</th>
                        </tr>
                        </thead>
                        <tbody>";

                        for($i=1; $i < 56; $i++){
                        $sth = $db_connection->prepare("SELECT * FROM wines where wine_id = $i");
                        $sth->execute();
                        $wine = $sth->fetch(PDO::FETCH_ASSOC);
                        echo "<tr><td>".$wine["wine_id"]."</td>"."<td>".$wine["wine_name"]."</td>"."<td>".$wine["wine_winery"]."</td>"."<td>".$wine["wine_location"]."</td>"."<td>".$wine["wine_year"]."</td>"."<td>".$wine["wine_composition"]."</td>"."<td>".$wine["wine_price"]."</td></tr>";
                        }
                        echo "
                        </tbody>
                    </table>
                </div>
                <div class='rightTableContainerForInput'>
                    <table class='rightTableWithInput'>
                        <thead>
                        <tr>
                            <th>Sorszám</th>
                            <th>Pont</th>
                        </tr>
                        </thead>
                        <tbody>";

                        $user_id = $_SESSION['user_id'];

                        for($i=1; $i < 56; $i++){
                        $sth = $db_connection->prepare("SELECT score FROM scores where wine_id = $i AND user_id = $user_id");
                        $sth->execute();
                        $tScore = $sth->fetch();
                        $nScore = "";
                        if (count($tScore)>1){
                        if ($tScore["score"] == null){
                        $nScore = "";
                        }else{
                        $nScore = $tScore["score"]+0;
                        }
                        }
                        echo "<tr><td>$i</td><td><input id='wine_score_$i' type='text' name='wine_score_$i' class='columnInput' value=$nScore></td></tr>";
                        }

                        $db_connection = null;
                        echo "
                        </tbody>
                    </table>
                </div>
            </div>";
            $user_name = $_SESSION['user_name'];
            echo "<p><a href='#' id='submit' onclick='submitMyScores(\"$user_name\")'>Elküld</a><br /></p>";

            }else{
            echo "<h2>A demo használatához be kell jelentkezni!</h2>";
            }
            ?>
            <!-- <div id="inputMatrix"></div> -->
            <!-- <div id="submitMatrix"></div> -->
            <div id="result">
                <div id="textResult" class="textResult"></div>
                <div id="graph" class="graph"></div>
                <div id="textResult2" class="textResult"></div>
                <div id="graph2" class="graph"></div>
            </div>
        </div>
    </div>

    <!--THE FOOTER-->
    <div id="footer">
        <div id="footerText">
            <p>Készítette - 2014 Varga Tamás</p>
            &nbsp;
        </div>
    </div>
</div>
</body>
</html>

