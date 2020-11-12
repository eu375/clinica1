<?php if(!isset($_SESSION)) 
    { 
        session_start(); 
    }?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://motion.com.sv/app-medicos/index.php">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> App Médicos
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION['usuario'])){ ?>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Paciente <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?controller=paciente&action=register">Registrar</a></li>
                        <li><a href="?controller=paciente&action=show">Ver pacientes</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-tooggle" data-toggle="dropdown" href="#">Consultas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?controller=historia&action=show">Nueva Consulta</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-tooggle" data-toggle="dropdown" href="#">Revisiones<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?controller=consulta&action=show">Ver consultas</a></li>
                    </ul>
                </li>

			
		<?php } ?>
			</ul>		
			<ul class="nav navbar-nav navbar-right">
			<?php if (isset($_SESSION['usuario'])){?>
				<p class="navbar-text">Bienvenido: <?php echo $_SESSION['usuario_alias']; ?></p>
				<li>
					<a href="?controller=usuario&action=showregister&id=<?php echo $_SESSION['usuario_id'] ?>">
						<span class="glyphicon glyphicon-cog"></span>
							Mi cuenta
					</a>
				</li>					
				<li>
					<a href="?controller=usuario&action=logout">
						<span class="glyphicon glyphicon-log-out"></span>
						Salir
					</a>
				</li>
			<?php } else{ ?>
					<li>
						<a href="?controller=usuario&action=register">
							<span class="glyphicon glyphicon-user"></span>
							Registrarse
						</a>
					</li>
					<li>
						<a href="?controller=usuario&action=showLogin">
							<span class="glyphicon glyphicon-log-in"></span>
							Entrar
						</a>
					</li>
			<?php } ?>
			</ul>
	</div>
</nav>