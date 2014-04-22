<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>SISTEMA</title>

  		<!--UIKIT FRAMEWORK-->
  		<link rel="stylesheet" href="<?php echo base_url()?>assets/template/uikit/css/uikit.min.css" />
  		<link rel="stylesheet" href="<?php echo base_url()?>assets/template/uikit/css/uikit.almost-flat.min.css" />
  		<link rel="stylesheet" href="<?php echo base_url()?>assets/template/uikit/css/uikit.gradient.min.css" />
  		<link rel="stylesheet" href="<? echo base_url("assets/template/slideshow/")?>/css/font-awesome.min.css">
  		
  		<!--JQUERY FRAMEWORK-->
  		<script src="<?php echo base_url()?>assets/template/js/jquery.min.js"></script>
  		<script src="<?php echo base_url()?>assets/template/uikit/js/uikit.min.js"></script>

  		<style type="text/css">
  		body{padding-left: 10px;padding-right: 10px}
  		</style>

	</head>
<body>

<div class="uk-grid">

<div class="uk-width-1-1">

  <img src="<?php echo base_url("assets/template/banner.jpg")?>">  

	    <div class='uk-width-1-1' style="margin-bottom:15px">
      	<nav class="uk-navbar">
        <ul class="uk-navbar-nav">
          <li class="uk-active"><a href="<?php echo base_url()?>">INICIO</a></li>
          <li class="uk-hidden-small"><a href="<?php echo base_url("login_usuario")?>">USUARIO</a></li>
          <li class="uk-hidden-small"><a href="<?php echo base_url("login_admin")?>">ADMIN</a></li>
          <li class="uk-hidden-small"><a href="<?php echo base_url("login_gestor")?>">GESTOR</a></li>
        </ul>
        <div class="uk-navbar-flip">
          <ul class="uk-navbar-nav">
            <li><a href="#" style='color:black' class="uk-icon-twitter"></a></li>
            <li><a href="#" style='color:black' class="uk-icon-instagram"></a></li>
            <li><a href="#" style='color:black' class="uk-icon-facebook"></a></li>
          </ul>
        </div>

        
        </nav>
      </div>


</div>


		
			
				<div class="uk-width-10-10">
					<?php $this->load->view($vista);?>
				</div>

</div>



</body>