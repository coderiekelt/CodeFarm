<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {
	public function index()
	{
		$this->load->model("usermodel");
		
		$this->usermodel->createLeerling("riekelt", "test123", "allahhuakbar");
		
		echo "ahhh";
		
		return;
	}
}
