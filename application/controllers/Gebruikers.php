<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Gebruikers extends CI_Controller {
	public function __construct()
	{
		// CODEIGNITER CONSTRUCTOR
		parent::__construct();

		if (!isset($_SESSION['usernaam']))
		{
			redirect("login");
		} else {
			if ($_SESSION['domein'] != "beheerder")
			{
				redirect("trajecten");
			}
		}
	}

	public function index()
	{
		redirect("gebruikers/list/deelnemer");
	}

	public function lijst($domein = "deelnemer")
	{
		$hargs = array();

		$hargs["title"] = "Gebruikers (" . $domein . ")";

		$this->load->view("header", $hargs);

		$userlist = $this->gebruiker->fetchDomein($domein);

		$gebruikerslijst = array();

		foreach ($userlist as $gebruiker)
		{
			$newentry = $this->gebruiker->fetchDetails($gebruiker->gebruikersnaam);
			array_push($gebruikerslijst, $newentry);
		}

		echo "<pre>";
			print_r($gebruikerslijst);
		echo "</pre>";

		$this->load->view("footer");
	}
}
