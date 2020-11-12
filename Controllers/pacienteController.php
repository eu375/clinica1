<?php 
/**
* Controlador PacienteController, para administrar los pacientes y datos relacionados
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 22-03-2017
*/
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

class PacienteController
{	
	function __construct(){}

	public function register(){
		require_once('Views/Paciente/register.php');
	}

	public function save(){
		$paciente= new Paciente(null,$_POST['cedula'], $_POST['nombres'], $_POST['apellidos'], $_POST['ocupacion'], $_POST['estcivil'], $_POST['genero'],$_POST['date'],$_POST['email'],$_POST['tposangre'],$_POST['direccion'], $_SESSION['usuario_id']);
		Paciente::save($paciente);
		$_SESSION['mensaje']='Registro guardado satisfactoriamente';		
		$this->show();
		//header('Location: index.php');
	}

	//muestra los pacientes por usuario
	public function show(){
		require_once('Utils/paginationUtils.php');
		$pacientes=Paciente::all($_SESSION['usuario_id']);
		//paginator
		$lista_pacientes="";
		$registros=10; // debe ser siempre par		
		if(count($pacientes)>$registros){
			$paginationUtils=PaginationUtils::calcularPaginacion($registros,count($pacientes),$_GET['boton'],$pacientes,5);
		}else{// si no se presenta el paginador
			$paginationUtils= new PaginationUtils(1,$pacientes,count($pacientes),0,1,1,1);
		}
		require_once('Views/Paciente/show.php');
	}

	public function error(){
		require_once('Views/User/error.php');
	} 

	public function showupdate(){
		$id=$_GET['id'];
		$paciente=Paciente::getById($id);
		require_once('Views/Paciente/update.php');
		//Usuario::update($usuario);
		//header('Location: ../index.php');
	}

	public function update(){
		$paciente= new Paciente($_POST['id'],$_POST['dui'], $_POST['nombres'], $_POST['apellidos'], $_POST['ocupacion'], $_POST['estcivil'], $_POST['genero'],$_POST['date'],$_POST['email'],$_POST['tposangre'],$_POST['direccion'], $_SESSION['usuario_id']);

		//var_dump($paciente);
		//die();
		Paciente::update($paciente);
		$_SESSION['mensaje']='Registro actualizado satisfactoriamente';
		$this->show();
		//header('Location: index.php');
	}

	public function delete(){
		Paciente::delete($_GET['id']);
		$_SESSION['mensaje']='Registro eliminado satisfactoriamente';
		$this->show();
		//header('Location: index.php');
	}
	//muestra un paciente por dui
	public function buscar(){
		// si cedula no es vacía busca por cedula
		if (!empty($_POST['dui'])) {
			$lista_pacientes[]=Paciente::getByCedula($_POST['dui']);
			$botones=0;
			require_once('Views/Paciente/show.php');
		}else{//si está vacía trae todos los registros
			$this->show();
		}		
	}

	//Retorna una lista de usuarios. 
	public function buscarExtendida(){
		$filtros=array('usuario'=>$_SESSION['usuario_id'],'dui'=>$_POST['dui'], 'nombre'=>$_POST['nombre'],'apellido'=>$_POST['apellido']);
		$lista_pacientes=Paciente::allByFilter($filtros);
		$botones=0;	
		require_once('Views/Paciente/show.php');		
		/*
		else{//si está vacía trae todos los registros
			$this->show();
		}
		*/		
	}	
}