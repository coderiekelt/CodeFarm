<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Profiel extends CI_Controller {
	public function index()
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		redirect("profiel/view/" . $_SESSION['usernaam']);
	}
	
	
	public function update_about ()
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		$this->gebruiker->set($_SESSION['usernaam'], "overmij", $_POST['overmij']);
		
		redirect("profiel/edit/succes/Uw gegevens zijn bijgewerkt");
	}
	
	public function update_personal ()
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		$this->gebruiker->set($_SESSION['usernaam'], "voornaam", $_POST['voornaam']);
		$this->gebruiker->set($_SESSION['usernaam'], "achternaam", $_POST['achternaam']);
		
		redirect("profiel/edit/succes/Uw gegevens zijn bijgewerkt");
	}
	
	public function update_password ()
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		if ($this->gebruiker->verify($_SESSION['domein'], $_SESSION['usernaam'], $_POST['oldpassword']))
		{
			if ($_POST['newpassword'] == $_POST['oldpassword'])
			{
				$this->gebruiker->set($_SESSION['usernaam'], "wachtwoord", hash("sha256", $_POST['newpassword']));
			} else {
				redirect("profiel/edit/fout/Uw nieuwe wachtwoorden kwamen niet overeen");
			}
		} else {
			redirect("profiel/edit/fout/Uw oude wachtwoord is niet correct");
		}
	}
	
	public function view ($gebruikersnaam)
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		if ($this->gebruiker->exists($gebruikersnaam))
		{
			$userdata = array();
			
			$email = $this->gebruiker->get($gebruikersnaam, "email");
			$userdata['avatar'] = $this->gebruiker->get_gravatar($email, 320);
			$userdata["gebruikersnaam"] = $this->gebruiker->get($gebruikersnaam, "gebruikersnaam");
			$userdata["voornaam"] = $this->gebruiker->get($gebruikersnaam, "voornaam");
			$userdata["achternaam"] = $this->gebruiker->get($gebruikersnaam, "achternaam");
			$userdata["email"] = $this->gebruiker->get($gebruikersnaam, "email");
			$userdata["aangemeld"] = $this->gebruiker->get($gebruikersnaam, "datum_aangemeld");
			$userdata["laatsgezien"] = $this->gebruiker->get($gebruikersnaam, "datum_laatsgezien");
			$userdata["over"] = $this->gebruiker->get($gebruikersnaam, "overmij");
			
			$this->load->view("profiel_main", array("gebruiker" => $userdata));
		}
	}
	
	public function edit ($resultaat = "geen", $bericht = "nee")
	{
		if (!isset($_SESSION['usernaam'])) { redirect("login"); }
		
		$this->load->model("gebruiker");
		
		$gebruikersnaam = $_SESSION['usernaam'];
		
		if ($this->gebruiker->exists($gebruikersnaam))
		{
			$userdata = array();
			
			$email = $this->gebruiker->get($gebruikersnaam, "email");
			$userdata['avatar'] = $this->gebruiker->get_gravatar($email, 320);
			$userdata["gebruikersnaam"] = $this->gebruiker->get($gebruikersnaam, "gebruikersnaam");
			$userdata["voornaam"] = $this->gebruiker->get($gebruikersnaam, "voornaam");
			$userdata["achternaam"] = $this->gebruiker->get($gebruikersnaam, "achternaam");
			$userdata["email"] = $this->gebruiker->get($gebruikersnaam, "email");
			$userdata["over"] = $this->gebruiker->get($gebruikersnaam, "overmij");
			
			if ($resultaat = "succes")
			{
				$this->load->view("profiel_edit", array("gebruiker" => $userdata, "succes" => "Uw gegevens zijn succesvol bijgewerkt."));
			} elseif ($resultaat = "fout")
			{
				$this->load->view("profiel_edit", array("gebruiker" => $userdata, "fout" => "Uw wachtwoorden kwamen niet overeen of het oude wachtwoord was niet correct."));
			} else {
				$this->load->view("profiel_edit", array("gebruiker" => $userdata));
			}
		}
	}
}
