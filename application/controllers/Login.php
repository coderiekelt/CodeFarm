<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Login extends CI_Controller {
	public function index()
	{
		if (isset($_SESSION['username']))
		{
			redirect("trajecten");
		}
		
		$this->load->view("login");
	}
	
	public function loguit()
	{
		session_destroy();
		redirect("login");
	}
	
	public function process()
	{
		if (isset($_SESSION['username']))
		{
			redirect("dashboard");
		}
		
		if (!isset($_POST['username']))
		{
			redirect("login/index");
		}
		
		if (!isset($_POST['password']))
		{
			redirect("login/index");
		}
		
		$this->load->model("gebruiker");
		
		$split = explode("_", $_POST['username']);
		$check = false;
		
		if (isset($split[1]))
		{
			$check = true;
		}

		if ($check && $split[1] == "edufp")
		{
			if ($this->gebruiker->verify("deelnemer", $_POST['username'], $_POST['password']))
			{
				$this->gebruiker->setupSession("deelnemer", $_POST['username']);
				redirect("trajecten");
			} else {
				$this->load->view("login", array("error" => "Ongeldige gebruikersnaam of wachtwoord!"));
			}
		}
		elseif ($check && $split[1] == "fp")
		{
			if ($this->gebruiker->verify("beheerder", $_POST['username'], $_POST['password']))
			{
				$this->gebruiker->setupSession("beheerder", $_POST['username']);
				redirect("trajecten");
			} else {
				$this->load->view("login", array("error" => "Ongeldige gebruikersnaam of wachtwoord!"));
			}
		} else {
			if ($this->gebruiker->verify("gast", $_POST['username'], $_POST['password']))
			{
				$this->gebruiker->setupSession("gast", $_POST['username']);
				redirect("trajecten");
			} else {
				$this->load->view("login", array("error" => "Ongeldige gebruikersnaam of wachtwoord!"));
			}
		}
	}
	
	public function googledirector()
	{
		if (isset($_SESSION['username']))
		{
			redirect("trajecten");
		}
		
		if (isset($_SESSION['username'])) { return false; }
		
		// DIT MET NIEMAND DELEN
		$client_id = "690571784639-t8fcgfh35ec0ns4prjl38intv8mkoc02.apps.googleusercontent.com";
		$client_secret = "VllCcK4yzqzoykW_JSI4bmDj";
		$redirect_uri = "http://riekeltbrands.nl/kutding.php";
		
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");
		
		$authUrl = $client->createAuthUrl();
		
		redirect($authUrl);
	}
	
	public function googleworker()
	{
		if (isset($_SESSION['username']))
		{
			redirect("trajecten");
		}
		
		try {
		if (isset($_SESSION['username'])) { echo "ha"; return false; }
		if (!isset($_GET['code'])) { redirect("googledirector");}
		
		// DIT MET NIEMAND DELEN
		$client_id = "690571784639-t8fcgfh35ec0ns4prjl38intv8mkoc02.apps.googleusercontent.com";
		$client_secret = "VllCcK4yzqzoykW_JSI4bmDj";
		$redirect_uri = "http://riekeltbrands.nl/kutding.php";
		
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");
		
		$service = new Google_Service_Oauth2($client);
		
		$client->authenticate($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();
		$client->setAccessToken($_SESSION['access_token']);
		
		$user = $service->userinfo->get();
		
		$email = $user->email;
		
		$split = explode("@", $email);
		
		$this->load->model("gebruiker");
		
		if ($split[1] == "edu.rocfriesepoort.nl") 
		{
			if ($this->gebruiker->verifyFe("deelnemer", $split[0] . "_edufp"))
			{
				$this->gebruiker->setupSession("deelnemer", $split[0] . "_edufp");
				redirect("trajecten");
			}
		} elseif ($split[1] == "rocfriesepoort.nl") 
		{
			if ($this->gebruiker->verifyFe("beheerder", $split[0] . "_fp"))
			{
				$this->gebruiker->setupSession("beheerder", $split[0] . "_fp");
				redirect("trajecten");
			}
		} else {
			$this->load->view("login", array("error_invalid" => true));
		}
		} catch(RequestException $e) {
			echo $e->getResponse()->json();
		}
	}
}
