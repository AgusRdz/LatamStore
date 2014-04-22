<?php 
	
session_start();

class site extends CI_Controller
{	

	 public function __construct()
       {	

            parent::__construct();
            if ($_SESSION['user_id']) {
            	header("Location:".base_url("control_panel"));
            }
        }


	function index(){	
		$this->data['result']=$this->db->query("SELECT * FROM store_products WHERE Public=1");
		$this->data['vista']='site/index';
		$this->load->view('template/defecto',$this->data);
	}




	function login(){

		$post	=	$this->input->post();
		$result	=	$this->db->query("SELECT * FROM user WHERE login='$post[Email]' AND pass='$post[Pass]'")->row();

		

		if ($result->login && $result->user_id) {
			
			$_SESSION['user_id'] = $result->user_id;
            header("Location:".base_url("control_panel"));
			
		}else{
			
			$_SESSION['error']	=	'No has podido iniciar sesion, los datos proporcionados parecen incorrectos';
            header("Location:".base_url());
		}
	}


	function logout(){
		session_destroy();
		header("Location:".base_url());
	}



}


?>