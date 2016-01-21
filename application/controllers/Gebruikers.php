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
		redirect("gebruikers/lijst/deelnemer");
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

		$this->load->view("gebruikers/lijst", array("gebruikers" => $gebruikerslijst, "domein" => $domein));

		$this->load->view("footer");
	}

	public function delete($gebruiker, $domein, $confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Consent"));

			$gebruiker = $this->gebruiker->fetchDetails($gebruiker);

			$this->load->view("gebruikers/verwijder", array("gebruiker" => $gebruiker, "domein" => $domein));

			$this->load->view("footer");
		} else {
			$this->gebruiker->delete($gebruiker, $domein);
			redirect("gebruikers/lijst");
		}
	}

	public function create($confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Gebruiker toevoegen", "waarschuwing" => "Maakt u een nieuwe klas aan? Wij raden u aan om leerlingnummers in het klas aanmaak formulier in te vullen, dit genereert automatisch gebruikers!"));

			$this->load->view("gebruikers/nieuw");

			$this->load->view("footer");
		} else {
			$hargs = array();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('gebruikersnaam', 'Gebruikersnaam', 'required');
			$this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
			$this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == FALSE) {
				$hargs["foutmelding"] = "Gelieve alle vereiste velden in te vullen!";
			} else {
				$wachtwoord = "";
				if (!isset($_POST['password']))
				{
					$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    				for ($i = 0; $i < 8; $i++) {
        				$n = rand(0, count($alphabet)-1);
        				$pass[$i] = $alphabet[$n];
    				}
					$wachtwoord = $pass;
				} else {
					$wachtwoord = $_POST['wachtwoord'];
				}
				if ($this->gebruiker->exists($_POST['gebruikersnaam']))
				{
					$hargs['foutmelding'] = "Er bestaat al een gebruiker met deze gebruikersnaam!";
				} else {
					$hargs['notificatie'] = "Uw gebruiker is succesvol toegevoegd!";
					$this->gebruiker->create($_POST['domein'], $_POST['gebruikersnaam'], $wachtwoord, $_POST['email']);
					$this->gebruiker->updatePersonal($_POST['gebruikersnaam'], $_POST['voornaam'], $_POST['achternaam']);
				}
			}
			$hargs['title'] = "Nieuwe gebruiker";

			$this->load->view("header", $hargs);

			$this->load->view("gebruikers/nieuw");

			$this->load->view("footer");
		}
	}
}
