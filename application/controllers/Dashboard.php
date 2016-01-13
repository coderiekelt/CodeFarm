<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Dashboard extends CI_Controller {
	public function index()
	{
		if (!isset($_SESSION['username'])) { redirect("login"); }
		
		$this->load->view("header");
	}
}
