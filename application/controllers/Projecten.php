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

		$error = false;

		if($this->project->numkoppelingen($_SESSION['usernaam']) == 0)
		{
			$error = true;
			$hargs["foutmelding"] = "<b>Foutmelding!</b><br>U bent nog niet gekoppeld aan een project, als dit een fout is neem dan contact op met uw docent!";
		}

		$this->load->view("header", $hargs);

		if ($error == false) {
			$this->load->view("projecten/lijst", array("projecten" => $this->project->fetchforuser($_SESSION['usernaam'])));
		}

		$this->load->view("footer");
	}
}
