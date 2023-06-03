<?php 

$mejorHabitacion = ControladorInicio::ctrMejorHabitacion();

$traerFoto = ControladorInicio::ctrTraerFotoHabitacion($mejorHabitacion["mejor"]);

$traerFotoArray = json_decode($traerFoto["galeria"], true);

?>


<div class="card card-success card-outline">

	<div class="card-header">
		<h5 class="m-0"><strong>Habitación más reservada</strong></h5>
	</div>

	<div style="text-align: justify;" class="card-body">

		<img src="<?php echo $traerFotoArray[0]; ?>" class="img-thumbnail">

		<h6 class="card-title py-3"><?php echo $mejorHabitacion["mejor"]; ?></h6>
        
	</div>
    
    <div style="text-align: right ;" class="card-footer">
        
        <a href="reservas" class="btn btn-success"><i class="fa-solid fa-eye"></i> Ver reservas</a>

    </div>

</div>