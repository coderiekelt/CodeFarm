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

		$this->load->view("gebruikers_lijst", array("gebruikers" => $gebruikerslijst, "domein" => $domein));

		$this->load->view("footer");
	}

	public function delete($gebruiker, $confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Consent"));

			$gebruiker = $this->gebruiker->fetchDetails($gebruiker);

			$this->load->view("gebruikers_verwijder", array("gebruiker" => $gebruiker));

			$this->load->view("footer");
		}
	}
}
