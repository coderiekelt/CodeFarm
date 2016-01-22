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

			$borkborkborkborkborkborkbork = "deelnemer";
			$borkborkborkbork = $this->gebruiker->fetchDomein($borkborkborkborkborkborkbork);
			$borkborkbork = array();
			foreach ($borkborkborkbork as $borkborkborkborkbork)
			{
				$borkborkborkborkborkborkborkbork = $borkborkborkborkbork->gebruikersnaam;
				$bork = explode("_", $borkborkborkborkborkborkborkbork);
				$borkbork = $bork[0];
				array_push($borkborkbork, $borkbork);
			}

			$this->load->view("klassen/nieuw", array("bork" => $borkborkbork));

			$this->load->view("footer");
		} else {
			$hargs = array();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('naam', 'Klasnaam', 'required');

			if ($this->form_validation->run() == FALSE) {
				$hargs["foutmelding"] = "Gelieve alle vereiste velden in te vullen!";
			} else {
				if ($this->klas->existsNaam($_POST['naam']))
				{
					$hargs['foutmelding'] = "Er bestaat al een klas met deze naam!";
				} else {
					$hargs['notificatie'] = "De klas is succesvol aangemaakt!";

					
				}
			}
			$hargs['title'] = "Klas toevoegen";
			$hargs['waarschuwing'] = print_r($_POST);

			$this->load->view("header", $hargs);

			$this->load->view("klassen/nieuw");

			$this->load->view("footer");
		}
	}
}
