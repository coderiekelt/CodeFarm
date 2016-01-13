<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view("login");
	}
	
	public function process()
	{
		if (!isset($_POST['username']))
		{
			redirect("login/index");
		}
		
		if (!isset($_POST['password']))
		{
			redirect("login/index");
		}
		
		$this->load->model("usermodel");
		
		$split = explode("_", $_POST['username']);
		$check = false;
		
		if (isset($split[1]))
		{
			$check = true;
		}
		
		if ($check && $split[1] == "edufp")
		{
			if ($this->usermodel->verify("deelnemer", $_POST['username'], $_POST['password']))
			{
				$this->usermodel->setupSession("deelnemer", $_POST['username']);
			} else {
				$this->load->view("login", array("error_creds" => true));
			}
		}
		elseif ($check && $split[1] == "fp")
		{
			if ($this->usermodel->verify("beheerder", $_POST['username'], $_POST['password']))
			{
				$this->usermodel->setupSession("beheerder", $_POST['username']);
			} else {
				$this->load->view("login", array("error_creds" => true));
			}
		} else {
			if ($this->usermodel->verify("gast", $_POST['username'], $_POST['password']))
			{
				$this->usermodel->setupSession("gast", $_POST['username']);
			} else {
				$this->load->view("login", array("error_creds" => true));
			}
		}
	}
	
	public function googledirector()
	{
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
		
		$this->load->model("usermodel");
		
		if ($split[1] == "edu.rocfriesepoort.nl") 
		{
			if ($this->usermodel->verifyFe("deelnemer", $split[0] . "_edufp"))
			{
				$this->usermodel->setupSession("deelnemer", $split[0] . "_edufp");
				echo "eeedu";
				redirect("dashboard");
			}
		} elseif ($split[1] == "rocfriesepoort.nl") 
		{
			if ($this->usermodel->verifyFe("beheerder", $split[0] . "_fp"))
			{
				$this->usermodel->setupSession("beheerder", $split[0] . "_fp");
				redirect("dashboard");
			}
		} else {
			$this->load->view("login", array("error_invalid" => true));
		}
		} catch(RequestException $e) {
			echo $e->getResponse()->json();
		}
	}
}
