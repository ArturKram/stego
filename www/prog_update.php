  <?php
  $st_na_upd=$_POST['st_name_upd']; //Название программы для редактирования
  $st_na=$_POST['st_name']; //Название программы
  $vers=$_POST['vers']; //Версия
  $vid_st=$_POST['vid_st']; //Вид стеганопрограммы
  $alg=$_POST['alg']; //Алгоритм вложения
  $ras=$_POST['ras']; //Расширения файлов, с которыми работает программа
  $autor=$_POST['author']; //Автор программы
  $god=$_POST['god']; //Год создания программы
    $os=$_POST['os']; //Год создания программы
  $shifr=$_POST['shifr']; //Шифрование
  if (isset($_POST['check']))
  {$port=1;} //Портабельная версия
  else {$port=0;}; //Непортабельная версия
   $server = 'localhost'; //Создание соединения с СУБД
   $db = array ("Database"=>"stego_as", "UID"=>"sa", "PWD"=>"123");
   $conn = sqlsrv_connect($server, $db);
   if ($conn===false)
   { //Проверка соединения с БД
       die(print_r(sqlsrv_errors()));//Ошибка при подключении к БД
   };
  if ($st_na <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($port <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[is_portable] = '$port'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($vid_st <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[id_vid] ='$vid_st'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($ras <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[extention] = '$ras'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($alg <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[algoritm] = '$alg'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };


  if ($author <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[author] = '$author'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($god <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[year_create] = '$god'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if ($os <> '')
  {
  $sql="UPDATE [stego_as].[dbo].[st_prog]
  SET [stego_as].[dbo].[st_prog].[OS] = '$os'
  WHERE [stego_as].[dbo].[st_prog].[st_prog_name] = '$st_na_upd'";
  }
  $stmt = sqlsrv_query($conn, $sql); //Выполнение SQL-запроса
  if ($stmt===false)
  {//Проверка выпонения SQL-запроса
  die(print_r(sqlsrv_errors(), true)); //Ошибка при выполнении запроса
  };

  if (isset($_POST['upd']))

  $errors="<br><b><i style='color: rgb(0, 0, 0);'>&nbsp;&nbsp; Сведения о &nbsp;".$st_na_upd." &nbsp; успешно изменены.</i><br>";

    ?>

<!DOCTYPE html>
<html lang="en">
    <title>StegoHash</title>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/index.js"></script>
    <script src="js/bootstrap.js"></script>


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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>

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
        <br> <br> <br> <br>
        <div class="modal-title col-md-10 offset-md-1  font-weight-bold font-italic ">
      <b><h4 style="color: rgb(253, 253, 250);margin-left:24%;"><?=$errors?></h4><br>
    </b>
        </div>

      </header>


    </body>

    </html>
