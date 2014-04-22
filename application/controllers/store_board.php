<?php 
	
session_start();
	
class store_board extends CI_Controller{

		 
	function index()
			{		


	
	
	$this->data['labels']		=	$this->db->query("SELECT * FROM store_labels");
	$this->data['products']		=	$this->db->query("SELECT * FROM store_products 	WHERE Public=1");
	$this->data['vista']='store_public/store_board';
	$this->load->view('template/control_panel',$this->data);
	
	}











	function send_pay()
			{

				/* FORMATEANDO DATOS DEL FORMULARIO */
				$IdPayCompany 	= 	$this->input->post('PayCompany'); # Plataforma desde la que se realiza el pago
				$PayCod 		= 	$this->input->post('PayCod');	  # Codigo del pago
				$Items			=	json_decode($this->input->post('Items')); # Elementos solicitados


				/* GENERANDO EL TOTAL DE LA ORDEN */
				foreach ($Items as $item)
				{
					
					$Price			=	$this->db->where('IdProduct',$item->ItemId)->get('store_products')->row();
					$Mount 			+=	$Price->Mount;
				}

				
				/* PREPARANDO DATOS ANTES DE GENERAR LA ORDEN*/
				$data=array(
						'user_id'			=> 	1, 				# Usuario que realiza la orden
						'IdPayCompany'		=>	1,	# Plataforma desde la que se realiza el pago o transferencia
						'IdPaymentAccount'	=> 1,				# Cuenta en la que se realizó el pago o trasferencia
						'PayCod'			=>	$PayCod,		# Codigo de seguridad para verificar el pago
						'Mount'				=>	$Mount,			# Monto total a pagar
						'Date'				=>	date('Y-m-d'),	# Fecha en la que se realiza la orden
						'Period'			=>	date('Y-m-d'),	# Fecha de vencimiento de los servicios adquiridos
						'Estatus'			=>	0				# Estado del pago, Aprobado, Rechazado
						);


				/* INSERTANDO LA ORDEN */
				$this->db->insert('store_order',$data); #Insertando la orden en la base de datos
				$IdOrder	= 	$this->db->insert_id(); # Codigo de la orden


				unset($data);
				
				/*PROCESANDO SERVICIOS SOLICITADOS*/
				foreach ($Items as $item)
				{									#Consultando precio del servicio
					$Price						=	$this->db->where('IdProduct',$item->ItemId)->get('store_products')->row();
					$data['Mount']				=	$Price->Mount;
					$data['IdProduct'] 			= 	$item->ItemId;
					$data['IdOrder'] 			= 	$IdOrder;
					$this->db->insert('store_order_detail',$data); #Insertando los servicios de la orden


				}

				header("Location:".base_url("store_board/payment_sent"));
			}


			function payment_sent()
			{

					$this->data['vista']='store_public/payment_sent';
					$this->load->view('template/defecto',$this->data);
			}



}




 

 




 

?>









