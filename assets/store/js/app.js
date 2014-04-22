//CONTROLADOR DE LA APPLICACION
function cart($scope)
{
    
    $scope.Items    = [];     // Cesta vacia
    $scope.Total    = 0;      // Total de la cesta
    $scope.VP       = 0;      // Puntos virtuales de la cesta
    $scope.ItemDisabled  = [];  //Elementos activos o inactivos 

   $scope.Add = function(Name,Mount,VP,ItemId)
   {  

      //Desactivar item al agregar un item a la cesta
      
    
      document.getElementById('Btn'+ItemId).setAttribute("disabled"); 

      //Sumar el costo al total del pedido
      $scope.Total += parseInt(Mount);

      //Sumar puntos virtuales
      $scope.VP += parseInt(VP);

      //Agregar item a la cesta
      $scope.Items.push({'Name':Name , 'Mount':Mount , 'VP':VP , 'ItemId':ItemId});
   };


   $scope.Del = function(index,ItemId) {
      
      document.getElementById('Btn'+ItemId).removeAttribute("disabled"); 

      $scope.Total -= parseInt($scope.Items[index].Mount);
      $scope.VP -= parseInt($scope.Items[index].VP);
      $scope.Items.splice(index, 1);
    };




}
