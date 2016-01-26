<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Projmanager extends CI_Controller {
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
		$hargs = array();

		$hargs["title"] = "Projecten";

		$error = false;

		$this->load->view("header", $hargs);

		if ($error == false) {
			$this->load->view("projmanager/lijst", array("projecten" => $this->project->fetchall()));
		}

		$this->load->view("footer");
	}

	public function view($id)
	{
		$hargs = array();

		$hargs['title'] = "Project " . $this->project->get($id, "naam");

		$this->load->view("header", $hargs);

		$this->load->view("projecten/view", array("project" => $this->project->fetchdetails($id), "content" => $this->theorie->fetchforproject($id)));

		$this->load->view("footer");
	}

	public function theorie($id)
	{
		$hargs = array();

		$hargs['title'] = $this->theorie->get($id, "naam");

		$this->load->view("header", $hargs);

		$this->load->view("projecten/theorie", array("theorie" => $this->theorie->fetchdetails($id)));

		$this->load->view("footer");
	}
}
