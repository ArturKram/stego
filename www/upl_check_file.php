<?php

 $server = 'localhost'; //Создание соединения с СУБД
 $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
 $conn = sqlsrv_connect($server, $db);
    if ($conn===false) { //Проверка соединения с БД
     die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
  };
  $sql="SELECT q.check_name FROM [stego_as].[dbo].[check] q group by q.check_name order by q.check_name desc"; //*iconv('UTF-8','windows-1251', —ЕСЛИ ХОТИМ КИРИЛЛИЦУ

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
    <meta name="description" content="A free Bootstrap powerd HTML template exclusively crafted for the super lazy designers like me who designed thousand of websites till today but never got a chance to build one himself.">
    <meta name="keywords" content="Free Portfolio Template, Free Template, Free Bootstrap Template, Dribbble Portfolio Template, Free HTML5 Template">
    <meta name="author" content="EvenFly Team">

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
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.js"></script>



    <!-- ===========================
    ICONS:
    =========================== -->
    <link rel="stylesheet" href="css/simple-line-icons.css">





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
                        <!-- Replace Drifolio Bootstrap with your Site Name and remove icon-grid to remove the placeholder icon -->
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
    <h5 align="center"> ПОИСКОВОЕ ДЕЛО<br>(выбор объектов поиска):</h5>
        <hr class="separetor">


        <br>
        <div class="modal-title col-md-9 offset-md-3 text-uppercase font-weight-bold font-italic " style=" margin-left: 37%">

                <b><h5 style="color: rgb(0, 0, 0)" >Добавление файлов</h5></b>
        </div>
<br>
        <br>
        <form action="directory_upload.php" method="POST" enctype="multipart/form-data">
        <div class="offset-md-1">

         <div class="form-group row  offset-md-1">

         <br>
            <select name="$_POST['check_name']" class=" col-md-5 form-control" style="margin-left:29%;">
         <?php
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
         {
         echo "<option>".$row['check_name']."</option>";
         }
         ?>
            </select>
         </div>

         <br>

         <input type="hidden" name="uploaded" value="1" />
           <input class="btn btn-outline-light " style="color: white; margin-left:36%" type="file" name="directory[]" webkitdirectory />
         <br><br>
             <button type="submit" class="btn btn-outline-light" name="add_name" style="margin-left:45%">Добавить файлы</button>

            </div>
            <br><br>    <br>
        </form>
        <div class="modal-title col-md-9 offset-md-3 text-uppercase font-weight-bold font-italic " style="margin-left: 10%;    width: 113%;">
          <b><h5 style="color: rgb(0, 0, 0); " >Добавление снимков реестра(Windows) или log-файлов (Linux):</h5></b>
      </div>

      <br>
<br>
      <?php

       $server = 'localhost'; //Создание соединения с СУБД
       $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123") ;
       $conn = sqlsrv_connect($server, $db);
          if ($conn===false) { //Проверка соединения с БД
           die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
        };
        $sql="SELECT q.check_name FROM [stego_as].[dbo].[check] q group by q.check_name order by q.check_name desc"; //*iconv('UTF-8','windows-1251', —ЕСЛИ ХОТИМ КИРИЛЛИЦУ

                             //Создание SQL-запроса добавления справочной информации в таблицу st_prog
          $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
      	//print_r($stmt);
          if ($stmt===false) //Проверка выпонения SQL-запроса
          {
              die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
          }
        ?>

      <form action="search_key_reg.php" method="POST" enctype="multipart/form-data">
      <div class="offset-md-1">

       <div class="form-group row  offset-md-1">

       <br>
          <select name="check_name_reg" class=" col-md-5 form-control" style="margin-left:29%;">
       <?php
       while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
       {
       echo "<option>".$row['check_name']."</option>";
       }
       ?>
          </select>
       </div>

       <br>
       <input type="hidden" name="uploaded" value="1" />

           <input type="file" class="btn btn-outline-light" name="userfile" id="file" style="color: white; margin-left:36%" type="button">
       <br><br>
           <button type="submit" class="btn btn-outline-light" name="add1_name" style="margin-left:45%">Добавить </button>

          </div>
      </form>




                <br><br>  <br><br>  <br><br>

	</div>

    </header>




    <footer>

        <div class="container">
          <!--  <span class="bigicon icon-link"></span>     <p style="color: rgb(0, 0, 0); font-size: 17px; margin-left:33%">
           <br>
           Выберите файл</p>  -->
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
