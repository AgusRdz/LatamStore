
<style type="text/css">
  body{background-color:#f9f9f9;}
</style>


<div class="container">

  <!-- Stack the columns on mobile by making one full-width and the other half-width -->


<div class="col-xs-3" >
  <h3><b>APPS</b></h3>
    <div class="list-group">
        <?php foreach ($result->result() as $row): ?>
          <a href="" class="list-group-item"><?php echo $row->Name ?></a>
        <?php endforeach ?>

    </div>
</div>


<div class="col-xs-9">

 <hr>


<div class="col-xs-4" >
	<h4><b>CAPTURAS</b></h4>
  	<ul class="nav nav-pills nav-stacked">
        <?php foreach ($result->result() as $row): ?>
  		    <li class="active"><a href="#"><span class="badge pull-right"><?php echo mt_rand(1,100) ?></span><?php echo $row->Name ?></a></li>
        <?php endforeach ?>
	</ul>
</div>

<div class="col-xs-4" >
	<h4><b>MENSAJES</b></h4>
  	<ul class="nav nav-pills nav-stacked">
  		<?php foreach ($result->result() as $row): ?>
          <li class="active"><a href="#"><span class="badge pull-right"><?php echo mt_rand(1,100) ?></span><?php echo $row->Name ?></a></li>
      <?php endforeach ?>
	</ul>
</div>

<div class="col-xs-4" >
  <h4><b>REBOTES</b></h4>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($result->result() as $row): ?>
          <li class="active"><a href="#"><span class="badge pull-right"><?php echo mt_rand(1,100) ?></span><?php echo $row->Name ?></a></li>
        <?php endforeach ?>
  </ul>
</div>




</div>

</div>


