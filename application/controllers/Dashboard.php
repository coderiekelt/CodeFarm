<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH."libraries/Google/vendor/autoload.php");

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view("header");
	}
}
