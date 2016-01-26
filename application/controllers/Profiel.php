<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Profiel extends CI_Controller {
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
		redirect("profiel/profile/" . $_SESSION['usernaam']);
	}

	public function profile($gebruiker = "199386_edufp")
	{
		$this->load->view("header", array("title" => "Gebruiker " . $gebruiker));
		
		$geb = $this->gebruiker->fetchdetails($gebruiker);
		$this->load->view("gebruikers/profiel", array("gebruiker" => $geb));

		$this->load->view("footer"); 
	}

	public function password($confirm = "no")
	{
		$gebruiker = $_SESSION['usernaam'];

		if ($confirm == "no") {
			$this->load->view("header", array("title" => "Wachtwoord van " . $gebruiker));
		
			$geb = $this->gebruiker->fetchdetails($gebruiker);
			$this->load->view("profiel/wachtwoord", array("naam" => $gebruiker, "gebruiker" => $geb));

			$this->load->view("footer");
		} else {
			$this->load->view("header", array("title" => "Bewerk " . $gebruiker, "notificatie" => "Jouw wachtwoord is opgeslagen!"));

			$geb = $this->gebruiker->updatePassword($gebruiker, $_POST['wachtwoord']);
			$this->load->view("profiel/wachtwoord", array("naam" => $gebruiker));

			$this->load->view("footer");
		}
	}
}
