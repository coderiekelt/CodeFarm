<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Projecten extends CI_Controller {
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
		$hargs = array();

		$hargs["title"] = "Projecten";

		$this->load->view("header", $hargs);

		$this->load->view("projecten/lijst");

		$this->load->view("footer");
	}
}
