<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Klassenbeheer extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['usernaam']))
		{
			redirect("login");
		} elseif (!$_SESSION['domein'] == "beheerder")
		{
			redirect("dashboard");
		}
	}
	
	public function index()
	{
		$this->load->view("header", array("title" => "Klassen beheer"));
		
		$this->load->view("footer");
	}
}
