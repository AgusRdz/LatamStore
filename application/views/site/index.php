
<style type="text/css">
  body{background-color:#f9f9f9;}
</style>


<div class="container" ng-controller='cart'>

  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
  <div class="row">
    <div class="col-xs-12 col-md-8">
      <h1>ULTIMATE MARKETING <br><B>SOFTWARE CENTER</B></h1>
      <p>Seleccione el software que desea usar durante su campaña de marketing, <br>al finalizar precione en <b>NOTIFICAR PAGO</b> y proporcione los datos que se le solicitaran.</p>
	<p><b>Nota:</b> Para comprar los servicios debe hacer iniciado sesión, si no posee una cuenta haga <a href="<?php echo base_url() ?>"><b>clic aqui</b></a> para registrarse</p>

    </div>
    <div class="col-xs-6 col-md-4">
      <h1><b>${{Total}} / VP {{VP}}</b></h1>
      <p><span class="badge">$</span> Cargo total</p>
      
      <p><span class="badge">VP</span> Puntos virtuales</p>
    </div>
  </div>



  <div class="col-xs-10" >

  </div>


  <div class="col-xs-3" >

    <h1><b>${{Total}} / VP {{VP}}</b></h1>
    <BR>
    
    <a href='#' class="btn btn-success" data-toggle="modal" data-target="#login">INICIAR SESIÓN <span class="glyphicon glyphicon-ok"></span></a>

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h1 class="modal-title" id="myModalLabel"><?php echo $row->Name ?></h1>
          </div>
          
        
<form method='post' action='<?php echo base_url("site/login") ?>' autocomplete='off'>
          <div class="modal-body">

            <h1><b>INICIO DE SESIÓN</b></h1>
            <p>Inicie sesion para ingresar al centro de software</p>

            <label>Correo electronico</label>
            <input type="text" class="form-control" name='Email' placeholder='email@email.com'>
            <label>Clave</label>
            <input type="password" class="form-control" name='Pass' placeholder='********'>
            <br>
            <a href="">Quiero registrarme</a> / 
            <a href="">He olvidado mi clave</a>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Entrar <span class="glyphicon glyphicon-ok"></span></button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
          </div>

        </div>
</form>

      </div>
    </div> <!--FIN MODAL LOGIN-->

  <br>
  <br>
  <table class="table table-condensed">

   <tr>
    <th>Software</th>
    <th> P/U</th>
    <th> VP</th>
    <th>Option</th>
  </tr>

  <tr ng-repeat="item in Items">
    <td>{{item.Name}}</td>
    <td>{{item.Mount}}</td>
    <td>{{item.VP}}</td>
    <td><button class='btn btn-danger' ng-click="Del($index,item.ItemId)" title='Eliminar'><span class="glyphicon glyphicon-trash"></span></button></td>
  </tr>

</table>

<hr>
</div>


<div class="col-xs-9" style='border-top-left-radius:10px;box-shadow: -10px 0 10px grey; '>

  <?php foreach ($result->result() as $row): ?>
  <div class="col-xs-3">
    <h5><b><?php echo strtoupper($row->Name) ?></b></h5>
    <img src="<?php echo base_url("assets/store/store-thumbs/$row->Image") ?>" alt="" class="img-thumbnail">
    <h5><?php echo ($row->Mount)?'$'.$row->Mount:'Gratis' ?> / VP <?php echo $row->VP ?></h5>
    

    
    <button   
    type="button" 

    disabled="{{ItemDisabled[<?php echo $row->IdProduct ?>]}}"

    class="btn btn-primary" 
    ng-click="
    Add(
    '<?php echo $row->Name ?>' , 
    '<?php echo $row->Mount ?>',
    '<?php echo $row->VP ?>',
    '<?php echo $row->IdProduct ?>' )" id='Btn<?php echo $row->IdProduct ?>'>+</button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?echo $row->IdProduct?>">Caracteristicas</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal_<?echo $row->IdProduct?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h1 class="modal-title" id="myModalLabel"><?php echo $row->Name ?></h1>
          </div>
          <div class="modal-body">
            <p><b>Descripcion:</b> <?php echo $row->Description ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <hr>
  </div>

<?php endforeach ?>
</div>

</div>

<script src="<?php echo base_url("assets/store/js/app.js")?>"></script>