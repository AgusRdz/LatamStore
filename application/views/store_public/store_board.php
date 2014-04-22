
<style type="text/css">

</style>
<div class="container" ng-controller='cart'>

  <!-- Stack the columns on mobile by making one full-width and the other half-width -->
  <div class="row">
    <div class="col-xs-12 col-md-8">
      <h1><B>E-COMMERCE</B></h1>
      <p>Seleccione los productos que desea agregar al pedido</p>
      <br>
    </div>
    <div class="col-xs-6 col-md-4">
      <div class='text-right'>
        <h1><b>Total: ${{Total}}</b></h1>
        <button type="button" ng-disabled="!Total" class="btn btn-success" data-toggle="modal" data-target="#factura">NOTIFICAR PAGO <span class="glyphicon glyphicon-ok"></span></button>
      </div>


      <!-- @MODAL NOTIFICAR PAGO -->

      <div class="modal fade" id="factura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h1 class="modal-title" id="myModalLabel"><?php echo $row->Name ?></h1>
            </div>



            <form method='post' action='<?php echo base_url("store_board/send_pay") ?>'>
              <div class="modal-body">

                <h1><b>NOTIFICAR PAGO:</b></h1>
                <p>Por favor, verifique que ha solicitado los servicios correctos, de ser así precione en continuar, de lo contrario modifique su solicitud</p>

                <label>Metodo de pago</label>
                <select name='Metodo' class="form-control" >
                  <option>Seleccione un metodo</option>
                  <option>Paypal</option>
                  <option>Western Union</option>
                </select>

                <label>Codigo del deposito o transferencia</label>
                <input type="text" class="form-control" name='Codigo'>
                <input type="hidden" class="form-control" name='Items' value='{{Items}}'>

                <br>

                <table class="table table-condensed">
                  <tr>    
                    <th>Software</th>
                    <th>P/U</th>
                    <th>Option</th>
                  </tr>

                  <tr ng-repeat="item in Items">
                    <td style='color:green'><span class="glyphicon glyphicon-ok-sign" style='color:green'></span> {{item.Name}}</td>
                    <td>{{item.Mount}}</td>
                    <td>{{item.VP}}</td>
                    <td><button class='btn btn-danger ' ng-click="Del($index,item.ItemId)" ><span class="glyphicon glyphicon-trash"></span></button></td>
                  </tr>
                </table>
                <h5><b>Total a pagar: ${{Total}}</b></h5>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-success" ng-disabled="!Total">Enviar pago <span class="glyphicon glyphicon-ok"></span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
              </div>

            </div>
          </form>
        </div>
      </div>
      <!-- @ FINMODAL NOTIFICAR PAGO -->


    </div>


  </div>

  <div>
    <hr>
  </div>


  <!--BEGIN CATS-->
<div class="col-xs-3" >
  <ul class="nav nav-pills nav-stacked">


<?php /* Recursive LIST menu function */
  mysql_connect("localhost",'root','1737656420409949');
  mysql_select_db('store');
   
$result = mysql_query("SELECT * FROM store_labels") or die(mysql_error()); 
while ($m = mysql_fetch_array($result))
  { $menu[] = array(
    'id'=>$m['IdLabel'],
    'text'=>$m['Label'],
    'parent'=>$m['Parent']);
}

function treemenu($rows,$parent=0) { 
  $result = "<ul >"; foreach ($rows as $row){

if ($row['parent'] == $parent) { 
  $result.= "<li class='active'><a href='#'><span class='badge pull-right'>42</span>  {$row[text]}</a></li>"; 
  foreach ($row as $r) { 
    if ($r['parent'] == $r['id'])
      $children = true; else $children = false;
  } 
    if ($children == true) 
      $result.= treemenu($rows,$row['id']) . "</li>"; 
    }

  } $result .= "</ul>"; return $result; 
} 

echo treemenu($menu);
?>

</ul>

</div>

<!--END CATS-->



<div class="col-xs-9" style='border-top-left-radius:10px;box-shadow: -10px 0 10px grey; '>

  <?php foreach ($products->result() as $row): ?>
  <div class="col-xs-4">
    <h5><b><?php echo strtoupper($row->Name) ?></b></h5>
    <img src="<?php echo base_url("assets/store/store-thumbs/$row->Image") ?>" alt="" class="img-thumbnail">
    <h5><?php echo ($row->Mount)?'$'.$row->Mount:'Gratis' ?> / VP <?php echo $row->VP ?></h5>
    

    <div class="btn-group">
      <button   
      type="button" 

      disabled="{{ItemDisabled[<?php echo $row->IdProduct ?>]}}"

      class="btn btn-primary" 
      ng-click="Add('<?php echo $row->Name ?>' , 
      '<?php echo $row->Mount ?>',
      '<?php echo $row->VP ?>',
      '<?php echo $row->IdProduct ?>' )" id='Btn<?php echo $row->IdProduct ?>'><span class="glyphicon glyphicon-ok-sign"></span></button>

      

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_<?echo $row->IdProduct?>">Caracteristicas</button>

    </div>


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
