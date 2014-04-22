<?php 
	
	session_start();
	
	class iadmin extends CI_Controller
	{		

		 public function __construct()
       {	


       	/*
       		if (!$_SESSION['seguridad']) {
       			header("Location:http://localhost");
       		}
		*/



            parent::__construct();
            if ($_SESSION['tipo']!=='admin') {
            	header("Location:".base_url("login_admin/logout"));
            }

            
            $this->periodos = $this->db->query("SELECT * FROM periodos");
            $this->periodo_activo = $this->db->query("SELECT * FROM periodos WHERE Estatus=1")->row();

            $this->date['periodo_activo']=$this->periodo_activo ;
       }

		function config($periodo)
			{		

					if ($periodo) {
					
						$this->db->query("UPDATE periodos SET Estatus=0");
						$this->db->where('periodo',$periodo)->update("periodos",array('Estatus'=>1));
						header("Location:".base_url("iadmin/config"));
					}

					$this->data['result']=$this->periodos;
					$this->data['vista']='admin/config';
					$this->load->view('template/defecto',$this->data);
			}

			function index()
			{		
					
					$this->data['vista']='admin/index';
					$this->load->view('template/defecto',$this->data);
			}


			function router(){
				$Nivel		=	$this->input->post('Nivel');
				$Seccion	=	$this->input->post('Seccion');
				$Mes		=	$this->input->post('Mes');

				header("Location:".base_url("iadmin/horario/$Nivel/$Seccion/$Mes"));

			}


			function horario($Nivel,$Seccion,$Mes)
			{		
					
					$this->data['Nivel']	=	$Nivel;
					$this->data['Seccion']	=	$Seccion;
					$this->data['Mes']		=	$Mes;
					$this->data['Dia']		=	$Dia;

				$this->data['total_dias'] = cal_days_in_month(CAL_GREGORIAN, $Mes, 2014);


			$this->data['result']	= 	$this->db->query(
											"SELECT 
											alumnos.IdAlumno,
											alumnos.CedulaAlumno,
											alumnos.Nombres,
											alumnos.Apellidos,
											inscripciones.Seccion,
											inscripciones.Nivel
											FROM alumnos 
											RIGHT JOIN inscripciones on inscripciones.alumnos_IdAlumno=alumnos.IdAlumno
											RIGHT JOIN periodos on periodos.periodo = inscripciones.periodo
											WHERE 
											inscripciones.Nivel='$Nivel'
											AND 
											inscripciones.Seccion='$Seccion'
									");


					$this->data['vista']='admin/asistencia';
					$this->load->view('template/defecto',$this->data);
			}

			function inactivo($id){

				$this->db->query("DELETE FROM asistencias WHERE IdAsistencia=$id");
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}


			function activo($IdAlumno,$Mes,$Dia){

				$data=array(
						"alumnos_IdAlumno"	=>	$IdAlumno,
						"Mes"				=>	$Mes,
						"Dia"				=>	$Dia,
						"periodos_periodo"	=>	$this->periodo_activo->Periodo 
						);


				$this->db->insert("asistencias",$data);
				header("Location:".$_SERVER["HTTP_REFERER"]);
			}


			function administradores(){

				$crud = new grocery_CRUD();
        		$crud->set_table('admin');
        		$crud->unset_print();
        		$crud->unset_export();


        		$this->data['output'] = $crud->render();

        		$this->data['titulo']='GESTOR DE ADMINISTRADORES';
				$this->data['vista'] = 'admin/crud';
				$this->load->view('template/defecto',$this->data);

			}



			function representantes(){

				$crud = new grocery_CRUD();
        		$crud->set_table('representantes');
        		$crud->unset_print();
        		$crud->unset_export();


        		$this->data['output'] = $crud->render();

        		$this->data['titulo']='GESTOR DE REPRESENTANTES';
				$this->data['vista'] = 'admin/crud';
				$this->load->view('template/defecto',$this->data);

			}


			function alumnos(){

				$crud = new grocery_CRUD();
        		$crud->set_table('alumnos');
        		$crud->unset_print();
        		$crud->unset_export();


        		$this->data['output'] = $crud->render();

        		$this->data['titulo']='GESTOR DE ALUMNOS';
				$this->data['vista'] = 'admin/crud';
				$this->load->view('template/defecto',$this->data);

			}


			function periodos(){

				$crud = new grocery_CRUD();
        		$crud->set_table('periodos');
        		$crud->unset_print();
        		$crud->unset_export();


        		$this->data['output'] = $crud->render();

        		$this->data['titulo']='GESTOR DE PERIODOS';
				$this->data['vista'] = 'admin/crud';
				$this->load->view('template/defecto',$this->data);

			}



			function inscripcion(){

				$crud = new grocery_CRUD();
        		$crud->set_table('inscripciones');
        		$crud->unset_print();
        		$crud->unset_export();

        		$crud->set_relation('alumnos_IdAlumno','alumnos','{CedulaRepresentante} - <b>Representado:</b> {Nombres} {Apellidos}');
        		$crud->display_as('alumnos_IdAlumno','Cedula representante');

        		$crud->field_type('IdAdmin', 'hidden', $_SESSION['IdAdmin']);
        		$crud->field_type('Periodo', 'hidden', $this->periodo_activo->Periodo );

        		$crud->unset_columns('IdAdmin');

        		$this->data['output'] = $crud->render();

        		$this->data['titulo']='PANEL DE INSCRIPCIÓN';
				$this->data['vista'] = 'admin/crud';
				$this->load->view('template/defecto',$this->data);


			}		
	}



?>