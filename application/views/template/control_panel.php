<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-COMMERCE</title>

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
              <li><a href=" <?php echo base_url('store_board/') ?>"><b>SOFTWARE CENTER</b></a></li>
              <li><a href=" <?php echo base_url() ?>"><b>APPS</b></a></li>
              <li><a href="#"><b>AYUDA</b></a></li>
              <li><a href="#"><b>CONTACTO</b></a></li>
              <li><a href="<?php echo base_url("site/logout") ?>"><b>SALIR</b></a></li>
              <!--
              <li><a href="#"><b>ESTADISTICAS</b></a></li>
              <li><a href="#"><b>CAPACITACION</b></a></li>
              <li><a href="#"><b>CONSULTAS</b></a></li>
              <li><a href="#"><b>MENTORIA</b></a></li>
            -->
            </ul>
           
            <ul class="nav navbar-nav navbar-right">
              
              <li><a href="../navbar-static-top/"><b>Afiliados clasificados:</b> 150</a></li>
              <li><a href="../navbar-fixed-top/"><b>Bono Abril:</b> $100</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
 

  <?php $this->load->view($vista);?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src=" <?php echo base_url("assets/store/js/jquery.min.js") ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("assets/store/bootstrap-3.1.1-dist/js/bootstrap.min.js")?>"></script>
    <!-- ANGULAR DE BEST JAVASCRIPT FRAMEWORK-->

  </body>
</html>


