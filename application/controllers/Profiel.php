<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Profiel extends CI_Controller {
	public function index()
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		redirect("profiel/view/" . $_SESSION['usernaam']);
	}
	
	
	
	public function view ($gebruikersnaam)
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		if ($this->gebruiker->exists($gebruikersnaam))
		{
			$userdata = array();
			
			
			$userdata['avatar'] = $this->gebruiker->get_gravatar($this->gebruiker->get($gebruiker, "email"));
			$userdata["gebruikersnaam"] = $this->gebruiker->get($gebruikersnaam, "gebruikersnaam");
			$userdata["voornaam"] = $this->gebruiker->get($gebruikersnaam, "voornaam");
			$userdata["achternaam"] = $this->gebruiker->get($gebruikersnaam, "achternaam");
			$userdata["email"] = $this->gebruiker->get($gebruikersnaam, "email");
			$userdata["aangemeld"] = $this->gebruiker->get($gebruikersnaam, "datum_aangemeld");
			$userdata["laatsgezien"] = $this->gebruiker->get($gebruikersnaam, "datum_laatsgezien");
			
			$this->load->view("profiel_main", array("gebruiker" => $userdata));
		}
	}
}
