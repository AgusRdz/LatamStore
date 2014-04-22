<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SOFTWARE CENTER</title>

    <!-- Bootstrap -->
    <link href='<?php echo base_url("assets/store/bootstrap-3.1.1-dist/css/bootstrap.min.css")?>' rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url("assets/store/js/angular.min.js")?>"></script>

  </head>
  
  <body ng-app>

     <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
          
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href=" <?php echo base_url() ?>"><b>INICIO</b></a></li>
              <li><a href="#"><b>REGISTRO</b></a></li>
              <li><a href="#"><b>AYUDA</b></a></li>
              <li><a href="#"><b>REGISTRO</b></a></li>
              <li><a href="#"><b>CONTACTO</b></a></li>
              <!--
              <li><a href="#"><b>ESTADISTICAS</b></a></li>
              <li><a href="#"><b>CAPACITACION</b></a></li>
              <li><a href="#"><b>CONSULTAS</b></a></li>
              <li><a href="#"><b>MENTORIA</b></a></li>
            -->
            </ul>
           <form class="navbar-form navbar-left" autocomplete='off' action='<?php echo base_url("site/login") ?>' method='post'>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email" autofocus name='Email'>
          <input type="text" class="form-control" placeholder="*******" name='Pass'>
        </div>
        <button type="submit" class="btn btn-default">Entrar</button>
      </form>
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>

<style type="text/css">
  .carousel-inner {
    height: 300px;
  }
</style>
  

<div id="carousel-example-generic" class="carousel slide col-xs-13" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
        <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
        <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
      </ol>
      
      <div class="carousel-inner">
        <div class="item">
          <img src="<?php echo base_url("assets/store/images/bg.png")?>" alt="" class="img-thumbnail">
        </div>
        <div class="item">
          <img src="<?php echo base_url("assets/store/images/slide2.png")?>" alt="" class="img-thumbnail">
        </div>
        <div class="item active">
          <img src="<?php echo base_url("assets/store/images/slide3.png")?>" alt="" class="img-thumbnail">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>



      
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>



  <?php $this->load->view($vista);?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=" <?php echo base_url("assets/store/js/jquery.min.js") ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/store/bootstrap-3.1.1-dist/js/bootstrap.min.js")?>"></script>
    <!-- ANGULAR DE BEST JAVASCRIPT FRAMEWORK-->

  </body>
</html>


