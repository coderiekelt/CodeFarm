<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include("../libraries/google/src/Google/autoload.php");
class Login extends CI_Controller {
	public function index()
	{
		$this->load->view("login");
	}
	
	public function googledirector()
	{
		if (isset($_SESSION['username'])) { return false; }
		
	}
}
