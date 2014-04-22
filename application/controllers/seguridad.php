<?php
session_start();
class seguridad extends CI_Controller
{
	
	function index(){

		$_SESSION['seguridad'] = true;

	}
} ?>