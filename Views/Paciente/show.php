<?php if(!isset($_SESSION)) 
    { 
        session_start();   

    } ?>
<h1>Lista de Pacientes</h1>
	<form class="form-inline" action="?controller=paciente&action=buscarExtendida" method="post">
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" id="dui" name="dui" type="text" placeholder="DUI">
	  </div>	  	  
	</div>
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
	  </div>	
	</div>
	<div class="form-group row">
	  <div class="col-xs-4">
	    <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido">
	  </div>	
	</div>
	<div class="form-group row">
	 <div class="col-xs-4">
	    <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-search"> </span> Buscar</button>
	  </div>
	</div>
	<div class="form-group row">
	 <div class="col-xs-4">
	 	<button type="button" class="btn btn-success" onclick="location.href='?controller=paciente&action=show'"><span class="glyphicon glyphicon-erase"></span> Limpiar</button>
	  </div>
	</div>	
	</form>

		<?php if (isset($_SESSION['mensaje'])) { //mensaje, cuando realiza alguna acción crud ?>
			<div class="alert alert-success">
				<strong><?php echo $_SESSION['mensaje']; ?></strong>
			</div>
		<?php } 
			unset($_SESSION['mensaje']);
		?>
<div class="container">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>DUI</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Ocupación</th>
					<th>Email</th>
					<th>Tipo de Sangre</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($paginationUtils->getListaElementos() as $paciente)  {?>
				<tr>
					<td><?php echo $paciente->getCedula(); ?></td>
					<td><?php echo $paciente->getNombres(); ?></td>
					<td><?php echo $paciente->getApellidos();?></td>
					<td><?php echo $paciente->getOcupacion();?></td>
					<td><?php echo $paciente->getEmail();?></td>
					<td><?php echo $paciente->getTposangre();?></td>
					<td> <button type="button" class="btn btn-primary" onclick="location.href='?controller=paciente&action=showupdate&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-edit"> </span> Actualizar</button></td>
					<td><button type="button" class="btn btn-danger" onclick="location.href='?controller=paciente&action=delete&id=<?php echo $paciente->getId()?>'"><span class="	glyphicon glyphicon-trash"></span> Eliminar</button></td>
					<td><button type="button" class="btn btn-success" onclick="location.href='?controller=historia&action=register&id=<?php echo $paciente->getId()?>'"><span class="glyphicon glyphicon-th"></span> Crear/Editar H. Clínica</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php 
			include_once('Views/Layouts/pagination.php');
		?>
		<div>
		 <p>Total de registros: <?php echo $paginationUtils->getNumeroElementos();?></p>
		</div>
		<ul class ="pagination">
		    <?php if($paginationUtils->getActivoAnterior()){?>
				<li ><a href="?controller=paciente&action=show&boton=<?php echo $paginationUtils->getAnterior(); ?>">&laquo;</a></li>
			<?php } else { ?>
				<li class="disabled"><a href="#">&laquo;</a></li>
			<?php } ?>
			<?php 
			if($paginationUtils->getVisiblePrimero()) { ?>
				<li><a href="?controller=paciente&action=show&boton=<?php echo $paginationUtils->getPrimero(); ?>"><?php echo $paginationUtils->getPrimero(); ?></a></li>
				<li class="disabled"><a href="#">...</a></li>
			<?php }

			for ($i=$paginationUtils->getInicioPaginacion();$i<=$paginationUtils->getNumeroCiclos();$i++){ ?>
				<?php if($_GET['boton']==$i) {?>
					<li class="active"><a href="#"><?php echo $i; ?><span class="sr-only">(página actual)</span></a></li>
				<?php } else { ?>
					<li><a href="?controller=paciente&action=show&boton=<?php echo $i ?>"><?php echo $i; ?></a></li>
				<?php } ?>				
			<?php } 
			if($paginationUtils->getVisibleUltimo()){ ?>	
				<li class="disabled"><a href="#">...</a></li>
				<li><a href="?controller=paciente&action=show&boton=<?php echo $paginationUtils->getUltimo(); ?>"><?php echo $paginationUtils->getUltimo(); ?></a></li>
			<?php } ?>
			<?php if($paginationUtils->getActivoSiguiente()){ ?>
				<li ><a href="?controller=paciente&action=show&boton=<?php echo $paginationUtils->getSiguiente(); ?>">&raquo;</a></li>
			<?php } else {?>
				<li class="disabled"><a href="#">&raquo;</a></li>
			<?php } ?>
		</ul>		
	</div>
</div>