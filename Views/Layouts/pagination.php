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