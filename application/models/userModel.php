<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class UserModel extends CI_Model {
		// CONSTRUCTOR
        public function __construct()
        {
                parent::__construct();
        }

		// BESTAAT GEBRUIKER?
        public function exists($naam)
        {
            $query = $this->db->get_where('gebruiker', array('gebruikersnaam' => $naam));           
        }

		// LEERLING AANMAKEN
        public function createLeerling($gebruikersnaam, $wachtwoord, $email)
        {
			$data = array(
				"gebruikersnaam" => $gebruikersnaam,
				"wachtwoord" => hash("sha256", $wachtwoord),
				"email" => $email
			);
			
            $this->db->insert('gebruiker', $data);
        }

	}