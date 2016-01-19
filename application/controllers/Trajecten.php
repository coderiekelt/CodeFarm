<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Trajecten extends CI_Controller {
	public function __construct()
	{
		// CODEIGNITER CONSTRUCTOR
		parent::__construct();

		if (!isset($_SESSION['usernaam']))
		{
			redirect("login");
		}
	}

	public function index()
	{
		$this->load->view("header", array("notificatie" => "Hoi!"));

		$this->load->view("footer");
	}
}
