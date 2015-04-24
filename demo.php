<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
    <title>Borkóstolás</title>
    <meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://numericjs.com/lib/numeric-1.2.6.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="/js/Main.js"></script>
    <script type='text/javascript'>
        $(function () {
            $('.topScrollingBlockWrapperForInupt').on('scroll', function () {
                $('.leftTableContainerForInput').scrollLeft($('.topScrollingBlockWrapperForInupt').scrollLeft());
            });
            $('.leftTableContainerForInput').on('scroll', function () {
                $('.topScrollingBlockWrapperForInupt').scrollLeft($('.leftTableContainerForInput').scrollLeft());
            });
        });
        $(window).on('load', function () {
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
        <?php include('sidebar.php'); ?>
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
                Algoritmus:
                <select id='algoritmus' name='Algoritmus'>
                    <option value='hits'>Co_HITS</option>

                    <option value='hamming'>Hamming</option>
                    <option value='cosine'>Koszinusz</option>
                    <option value='precedence'>Precedencia</option>
                    <option value='adjacency'>Összefüggőségi</option>
                    <option value='positional'>Pozíció szerint</option>
                </select>
                <br />
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

            <div id="result">
                <div id="textResult" class="textResult"></div>
                <div id="graph" class="graph"></div>
                <div id="textResult2" class="textResult"></div>
                <div id="graph2" class="graph"></div>
            </div>
        </div>
    </div>

    <!--THE FOOTER-->
    <?php include('footer.php'); ?>
</div>
</body>
</html>

