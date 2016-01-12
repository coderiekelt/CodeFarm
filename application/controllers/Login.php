<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view("login");
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
		if (isset($_SESSION['username'])) { return false; }
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
		
		print_r($service);
		
		$email = $user->email;
		
		$split = explode("@", $email);
		
		if ($split[1] == "edu.rocfriesepoort.nl") 
		{
			echo "Dit is een geldig DEELNEMER email adres.";
		} elseif ($split[1] == "rocfriesepoort.nl") 
		{
			echo "Dit is een geldig BEHEERDER email adres.";
		} else {
			echo "Dit is GEEN geldig email adres.";
			$this->load->view("login", array("error_invalid" => true));
		}
		echo "<br>";
		echo "CLIENT ESP: " . $split[1];
		echo "<br>";
		
		echo "CLIENT EID: ". $user->email;
		} catch(RequestException $e) {
			echo $e->getResponse()->json();
		}
	}
}
