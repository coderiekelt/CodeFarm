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
		$hargs = array();

		$hargs["title"] = "Trajecten";

		if ($_SESSION['domein'] == "deelnemer")
		{
			if (!$this->gebruiker->getklas($_SESSION['usernaam']))
			{
				$hargs["foutmelding"] = "<b>Foutmelding!</b><br>U bent niet toegewezen aan een klas, vraag uw docent om u alsnog toe te wijzen aan een klas om te beginnen.";
			}
		}

		$this->load->view("header", $hargs);
        
        $this->load->view("trajecten/lijst");

		$this->load->view("footer");
	}
}
