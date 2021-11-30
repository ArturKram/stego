<?php

 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
    $sql="SELECT st_prog_name, is_portable, extention, algoritm, author, year_create, encryption, OS  FROM [stego_as].[dbo].[st_prog] order by st_prog_name desc"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
                       //Создание SQL-запроса добавления справочной информации в таблицу st_prog
    $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
	//print_r($stmt);
    if ($stmt===false) //Проверка выпонения SQL-запроса
    {
        die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
    }
  ?>

<!DOCTYPE html>
<html lang="en">
  <title>StegoHash</title>
<head>
    <meta charset="utf-8">


    <!-- ===========================
    THEME INFO
    =========================== -->


    <!-- DEVEOPER'S NOTE:
    This is a free Bootstrap powered HTML template from EvenFly. Feel free to download, modify and use it for yourself or your clients as long there is no money involved.

    Please don't try to sale it from anywhere; because I want it to be free, forever. If you sale it, That's me who deserves the money, not you :)
    -->

    <!-- ===========================
    SITE TITLE
    =========================== -->
    <title>ВИ МВД 2021</title>

    <link rel="icon" href="img/logo.png">
      <!--   <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-ipad-retina.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-iphone-retina.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-iphone.png" />

    <!-- ===========================
    STYLESHEETS
    =========================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/file_input.js"></script>




    <!-- ===========================
    ICONS:
    =========================== -->
    <link rel="stylesheet" href="css/simple-line-icons.css"> // icons

    <!-- ===========================
    GOOGLE FONTS
    =========================== -->



</head>

<body data-spy="scroll">

    <header>
        <!-- ===========================
        HERO AREA
        =========================== -->
        <div id="hero">
          <div class="logo col-md-1">
          <img src="logo1.png" alt="Эмблема" style=" height: 147px;    margin-top: 43%;    margin-left: 302%;  ">
          </div>
            <div class="container herocontent">
                <h2 class="wow fadeInUp" data-wow-duration="2s"><b><b>ВОРОНЕЖСКИЙ ИНСТИТУТ МВД РОССИИ</b></b></h2>
                <h5 class="wow fadeInDown" data-wow-duration="3s"><b>Кафедра автоматизированных информационных систем ОВД</b></h5>
            </div>

            <!-- Featured image on the Hero area -->
            <!--  <img class="heroshot wow bounceInUp" data-wow-duration="4s" src="img/hero1.png" alt="Featured Work">-->
        </div>
        <!--HERO AREA END-->


        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">

                <div class="navbar-header">

                    <a class="navbar-brand" href="#hero">
                        <span class="brandicon icon-grid"></span>
                        <span class="brandname">ПОИСК СЛЕДОВ ПРИСУТСТВИЯ СТЕГАНОГРАФИЧЕСКОГО ПО</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.html"><span class="btnicon icon-home"></span>Главная</a></li>
                        <li><a href="index.html"><span class="btnicon icon-magnifier"></span>Поиск следов</a></li>
                        <li><a href="#testimonials"> <span class="btnicon icon-user"></span>Наша команда</a></li>
                        <li><a href="mailto:you@yourmail.com"><span class="btnicon icon-envelope-open"></span>Контакты</a></li>
                    </ul>

                </div>
                <!--.nav-collapse -->
            </div>
        </nav>
        <!--navbar end-->
        <br>
        <br>
  <div id="servic" class="container">
    <h5 align="center">СПИСОК УЧТЕННЫХ СТЕГАНОГРАФИЧЕСКИХ ПРОГРАММ:</h5>
        <hr class="separetor">



    <?php

    $sql="SELECT st_prog_name, 'is_portable'=
        CASE WHEN is_portable='1' THEN 'с установкой'
          WHEN is_portable='0' THEN 'портабельная'
          ELSE CAST(is_portable as varchar) END
        , extention, algoritm, author, year_create, encryption  FROM [stego_as].[dbo].[st_prog] order by st_prog_name desc"; //*iconv('UTF-8','windows-1251', --ЕСЛИ ХОТИМ КИРИЛЛИЦУ
    $stmt = sqlsrv_query($conn, $sql);
    $row_num=0;
      if ($stmt===false)
      {
          die(print_r(sqlsrv_errors(), true));
      }
    echo "<br/>";
    echo '<table class="table table-inverse table-bordered table-striped" style="color: rgb(0, 0, 0); border:5px solid #42a960;font-family: sans-serif;">';
      echo '<tr style="font-weight: bold">';
        echo '<td>'.'Номер'."</td>".'<td>'.'Программа'."</td>".'<td>'.'Портабельность'."</td>"."<td>".'Расширения'."</td>"."<td>".'Алгоритм'."</td>"."<td>".'Автор'."</td>"."<td>".'Год'."</td>"."<td>".'Шифрование'."</td>";
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
      $row_num++;
      echo '<tr>';
        echo '<td>'.$row_num."</td>".'<td>'.$row[0]."</td>".'<td>'.$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."<td>".$row[6]."</td>";
       echo '</tr>';
    }
    echo '</table>';
    ?>



	</div>
    </header>
<br>
    <div id="services" class="container">

        <!-- SERVICE SECTION HEADING START -->

        <!--SERVICE SECTION HEADING END-->
        </div>



    <footer>
        <div class="container">
          <!--  <span class="bigicon icon-link"></span>    -->
          <img src="https://img.icons8.com/nolan/50/evidence.png"/>



            <div class="footerlinks">
                <!-- FOOTER LINKS START -->
                <ul>
                    <li><a href="index.html">Главная</a></li>

                    <li><a href="#services">Поиск следов</a></li>

                    <li><a href="#testimonials">Наша команда</a></li>

                    <li><a href="mailto:you@yourmail.com">Контакты</a></li>

                </ul>
            </div>

            <!-- FOOTER LINKS END -->

            <div class="copyright">
                <!-- FOOTER COPYRIGHT START -->
                <p><a href="https://ви.мвд.рф/"> ВОРОНЕЖСКИЙ ИНСТИТУТ МВД РОССИИ </a></p>
            </div>
            <!-- FOOTER COPYRIGHT END -->

            <div class="footersocial wow fadeInUp" data-wow-duration="3s">

                <ul>
                    <li><a href="#"><span class="icon-social-facebook"></span></a></li>
                    <li><a href="#"><span class="icon-social-twitter"></span></a></li>
                    <li><a href="#"><span class="icon-social-youtube"></span></a></li>
                    <li><a href="#"><span class="icon-social-tumblr"></span></a></li>

                </ul>
            </div>

        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jribbble.min.js"></script>
    <script src="js/drifolio.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>
