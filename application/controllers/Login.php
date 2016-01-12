<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/src/Google/autoload.php");
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
		$redirect_uri = "http://10.100.100.69:8080/login/googleworker";
		
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);
		$client->addScope("email");
		$client->addScope("profile");
		
		$authUrl = $client->createAuthUrl();
		
		redirect($authUrl);
	}
}
