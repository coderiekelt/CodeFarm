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
			$deelnemers = $this->klas->fetchin($klas);
			foreach ($deelnemers as $deelnemer)
			{
				$this->gebruiker->deleteklas($deelnemer);
			}
			$this->klas->delete($klas);
			redirect("klassen/lijst");
		}
	}

	public function edit($klas, $confirm = "no")
	{
		if ($confirm == "no") {
			$this->load->view("header", array("title" => "Bewerk " . $this->klas->get($klas, "naam")));
		
			$kdata = $this->klas->fetchdetails($klas);
			$this->load->view("klassen/bewerk", array("klas" => $kdata));

			$this->load->view("footer");
		} else {
			$this->load->view("header", array("title" => "Bewerk " . $this->klas->get($klas, "naam"), "notificatie" => "Uw weizigingen zijn doorgevoerd naar de database!"));
		
			$this->klas->set($klas, "naam", $_POST['naam']);

			$kdata = $this->klas->fetchdetails($klas);
			$this->load->view("klassen/bewerk", array("klas" => $kdata));

			$this->load->view("footer");
		}
	}

	public function create($confirm = "no")
	{
		if ($confirm != "confirm")
		{
			$this->load->view("header", array("title" => "Klas toevoegen"));

			$this->load->view("klassen/nieuw");

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
					$this->klas->create($_POST['naam']);
				}
			}
			$hargs['title'] = "Klas toevoegen";

			$this->load->view("header", $hargs);

			$this->load->view("klassen/nieuw");

			$this->load->view("footer");
		}
	}

	public function persons($id)
	{
		$this->load->view("header", array("title" => "Deelnemers"));

		$this->load->view("klassen/personen", array("deelnemers" => $this->klas->fetchin($id), "id" => $id));

		$this->load->view("footer");
	}

	public function deletepersons($id)
	{
		$this->load->view("header", array("title" => "Deelnemers", "notificatie" => "U heeft de deelnemers uit deze klas verwijderd!"));

		foreach($_POST['selected'] as $deelnemer)
			{
				$this->gebruiker->deleteklas($deelnemer);
			}

		$this->load->view("klassen/personen", array("deelnemers" => $this->klas->fetchin($id), "id" => $id));

		$this->load->view("footer");
	}

	public function addpersons($id, $confirm = "no")
	{
		if ($confirm == "no") { 
			$this->load->view("header", array("title" => "Deelnemers"));

			$this->load->view("klassen/addpersonen", array("deelnemers" => $this->gebruiker->fetchdomein("deelnemer"), "id" => $id));

			$this->load->view("footer");
		} else {
			$this->load->view("header", array("title" => "Deelnemers", "notificatie" => "Uw deelnemers zijn toegevoegd!"));

			foreach($_POST['selected'] as $deelnemer)
			{
				$this->gebruiker->setklas($deelnemer, $id);
			}

			$this->load->view("klassen/personen", array("deelnemers" => $this->klas->fetchin($id), "id" => $id));

			$this->load->view("footer");
		}
	}
}
