<?php 


function multiform($container){

	echo 

	"
	<script type='text/javascript'>

	\$(document).ready(function(){
    var ".$container."_index=1;

    \$('#nuevo_".$container."').click(function(){
        
        ".$container."_index++;
        \$(this).parent().before(\$('#".$container."').clone().attr('id','".$container."' + ".$container."_index));
        \$('#".$container."' + ".$container."_index).css('display','inline');
        \$('#".$container."' + ".$container."_index + ' :input').each(function(){
            \$(this).attr('name',\$(this).attr('name') + ".$container."_index);
            \$(this).attr('id',\$(this).attr('id') + ".$container."_index);
            });
        
    }); 
        \$('#eliminar_".$container."').live('click',function(){
        	padre=\$(this).parent();

            \$(padre).parent().remove();
        });

        \$('#ocultar_".$container."').live('click',function(){
        	\$(this).prev().toggle('fast');
        });



});
</script>
";




}












?>