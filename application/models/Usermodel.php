<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Usermodel extends CI_Model {
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
        public function createDeelnemer($gebruikersnaam, $wachtwoord, $email)
        {
			// LEERLING DATA
			$data = array(
				"gebruikersnaam" => $gebruikersnaam,
				"wachtwoord" => hash("sha256", $wachtwoord),
				"email" => $email
			);
			
			// LEERLING INSERT
            $this->db->insert('gebruiker', $data);
			
			// MAAK LEERLING ENTRY
			$this->db->insert("deelnemers", array("gebruikersnaam" => $gebruikersnaam));
        }

	}
