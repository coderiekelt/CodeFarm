<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Klassen extends CI_Controller {
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
		redirect("klassen/lijst/deelnemer");
	}

	public function lijst()
	{
		$hargs = array();

		$hargs["title"] = "Klassen";

		$this->load->view("header", $hargs);

		$klassen = $this->klas->fetchAll();

		$this->load->view("klassen/lijst", array("klassen" => $klassen));

		$this->load->view("footer");
	}

	public function delete($klas, $confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Consent"));

			$this->load->view("klassen/verwijder", array("klas" => $klas));

			$this->load->view("footer");
		} else {
			$this->klas->delete($klas);
			redirect("klassen/lijst");
		}
	}

	public function edit($klas)
	{
		if ($confirm == "no") {
			$this->load->view("header", array("title" => "Bewerk " . $gebruiker));
		
			$geb = $this->gebruiker->fetchdetails($gebruiker);
			$this->load->view("gebruikers/bewerk", array("gebruiker" => $geb));

			$this->load->view("footer");
		} else {
			$this->load->view("header", array("title" => "Bewerk " . $gebruiker, "notificatie" => "Uw weizigingen zijn doorgevoerd naar de database!"));
		
			$this->gebruiker->updatePersonal($gebruiker, $_POST['voornaam'], $_POST['achternaam']);
			$this->gebruiker->set($gebruiker, "email", $_POST['email']);

			$geb = $this->gebruiker->fetchdetails($gebruiker);
			$this->load->view("gebruikers/bewerk", array("gebruiker" => $geb));

			$this->load->view("footer");
		}
	}

	public function create($confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Klas toevoegen"));

			$borkborkborkborkborkbork = "deelnemer";
			$borkborkborkbork = $this->gebruiker->fetchDomein($borkborkborkborkborkbork);
			$borkborkbork = array();
			foreach ($borkborkborkbork as $borkborkborkborkbork)
			{
				$bork = explode("_", $borkborkborkborkbork);
				$borkbork = $bork[0];
				array_push($borkborkbork, $borkbork);
			}

			$this->load->view("klassen/nieuw", array("bork" => $borkborkbork));

			$this->load->view("footer");
		} else {
			$hargs = array();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('gebruikersnaam', 'Gebruikersnaam', 'required');
			$this->form_validation->set_rules('voornaam', 'Voornaam', 'required');
			$this->form_validation->set_rules('achternaam', 'Achternaam', 'required');
			$this->form_validation->set_rules('wachtwoord', 'Wachtwoord', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			if ($this->form_validation->run() == FALSE) {
				$hargs["foutmelding"] = "Gelieve alle vereiste velden in te vullen!";
			} else {
				if ($this->gebruiker->exists($_POST['gebruikersnaam']))
				{
					$hargs['foutmelding'] = "Er bestaat al een gebruiker met deze gebruikersnaam!";
				} else {
					$hargs['notificatie'] = "Uw gebruiker is succesvol toegevoegd!";

					if ($_POST['domein'] == "deelnemer")
					{
						$naam = $_POST['gebruikersnaam'] . "_edufp";
					} elseif ($_POST['domein'] == "beheerder")
					{
						$naam = $_POST['gebruikersnaam'] . "_fp";
					} else {
						$naam = $_POST['gebruikersnaam'];
					}

					$this->gebruiker->create($_POST['domein'], $naam, $_POST['wachtwoord'], $_POST['email']);
					$this->gebruiker->updatePersonal($naam, $_POST['voornaam'], $_POST['achternaam']);
				}
			}
			$hargs['title'] = "Nieuwe gebruiker";

			$this->load->view("header", $hargs);

			$this->load->view("gebruikers/nieuw");

			$this->load->view("footer");
		}
	}
}
