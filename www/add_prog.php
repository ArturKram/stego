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
    <link rel="stylesheet" href="css/style2.css">
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

    <!-- ===========================
    GOOGLE FONTS
    ===========================     <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Antic|Raleway:300"> -->




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
        <!--navbar end-->
        <br>
        <br>
  <div id="servic" class="container">
    <h5 align="center">ДОБАВИТЬ СТЕГАНОПРОГРАММУ:</h5>
        <hr class="separetor">
        <div class="container col-md-10 offset-md-1">
          <form align= "center"method= "post" action="prog_upload.php">
              <div class="form-group row" >
                <label align="center" for="inputEmail3" class="col-md-3 col-form-label" ><h3>Название стегопрограммы</h3></label>
                 <div  class="col-md-5">
                 <input name= "st_name" type="text" class="form-control" id="st_name">
                 </div>
              </div>

                              <div class="form-group row">
                                  <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Вид стеганографии</h3></label>
                                  <div  class="col-md-5">
                                      <select name="vid_st" id="vid_st" class="form-control">
                                              <option value="1">DIGITAL</option>
                                              <option value="2">STRUCTURAL</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Типы контейнеров</h3></label>
                                  <div  class=" col-md-5">
                                       <input name="ras" type="text" class="form-control" id="ras">
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Алгоритм стегановложения</h3></label>
                                  <div  class=" col-md-5">
                                       <input name="alg" type="text" class="form-control" id="alg">
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Год создания программы</h3></label>
                                  <div  class="col-md-5">
                                       <input name="god" type="text" class="form-control" id="god">
                                  </div>
                              </div>
                <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Автор</h3></label>
                                  <div  class="col-md-5">
                                       <input name="author" type="text" class="form-control" id="author">
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Алгоритмы шифрования</h3></label>
                                  <div  class=" col-md-5">
                                       <input name="shifr" type="text" class="form-control" id="shifr">
                                  </div>
                              </div>
                              <div class="form-group row">
                                    <label align="center" for="inputEmail3" class= "col-md-3 col-form-label"><h3>Система</h3></label>
                                  <div  class=" col-md-5">
                                       <input name="os" type="text" class="form-control" id="os">
                                  </div>
                              </div>
                              <div style=" display:table" class="form-check">
                                    <input name= "check" type="checkbox" class="form-check-input" id="check" value="">
                                    <label align="center" class="form-check-label" for="check"><h3>Требуется установка</h3></label>
                              </div>
         <button name= "add1" type="submit" class="btn btn-outline-light offset-md-1"> <b>ДОБАВИТЬ СТЕГАНОПРОГРАММУ</b></button>
         <br><br>
         <br>
	</div>

      </form>
	</div>
    </header>

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
