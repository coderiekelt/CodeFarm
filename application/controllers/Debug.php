<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {
	public function index()
	{
		$this->load->model("usermodel");
		
		if ($this->usermodel->exists("riekelt")) { return; }
		$this->usermodel->create("leerling", "riekelt", "test123", "allahhuakbar");
		
		echo "ahhh";
		
		return;
	}
	
	public function layout()
	{
		$this->load->view("header");
	}
	
	public function wachtwoord()
	{
		echo hash("sha256", "Brands123");
	}
}
