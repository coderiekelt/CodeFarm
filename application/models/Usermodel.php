<?php 
	// LAATST BEWERKT DOOR: RIEKELT BRANDS / 1-11-2016 18:05
	// OP TIJD VAN SCHRIJVEN NIET GETEST DOOR RIEKELT, KAN IMPLODEREN, GEBRUIK OP EIGEN RISICO.

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
            $num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }

        // BESTAAT GEBRUIKER IN DOMEIN? (DEELNEMER, GAST, BEHEERDER)
        public function existsInDomein($domein, $gebruikersnaam)
        {
        	$query = $this->db->get_where($domein, array('gebruikersnaam' => $naam));   

        	$num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }

		// GEBRUIKER AANMAKEN
		// LETOP: CONTROLEER ZELF EERST OF DEELNEMER AL BESTAAT
        public function create($domein, $gebruikersnaam, $wachtwoord, $email)
        {
        	$isValid = false;
        	$validDomains = array("deelnemer", "gast", "beheerder");

        	foreach ($validDomains as $domain)
        	{
        		if ($domein == $domain)
        		{
        			$isValid = true;
        		}
        	}

        	if (!$isValid) { return false; }

			// GEBRUIKER DATA
			$data = array(
				"gebruikersnaam" => $gebruikersnaam,
				"wachtwoord" => hash("sha256", $wachtwoord),
				"email" => $email
			);
			
			// GEBRUIKER INSERT
            $this->db->insert('gebruiker', $data);
			
			// MAAK DOMEIN ENTRY
			$this->db->insert($domein, array("gebruikersnaam" => $gebruikersnaam));

			return false;
        }

        // UPDATE PERSOONLIJKE GEGEVENS
        // LETOP: OOK HIER WEER ZELF CHECKEN OF GEBRUIKER BESTAAT
        public function updatePersonal($gebruikersnaam, $voornaam, $achternaam)
        {
        	$this->db->set("voornaam", $voornaam);
        	$this->db->set("achternaam", $achternaam);
        	$this->db->where('gebruikersnaam', $gebruikersnaam);
        	$this->db->update('gebruiker');
        }

        // UPDATE WACHTWOORD
        // LETOP: OOK HIER ZELF WEER CHECKEN OF GEBRUIKER BESTAAT, EVT CHECKEN OF OUD WACHTWOORD CORRECT WAS VOOR VEILIGHEID.
        public function updatePassword($gebruikersnaam, $wachtwoord)
        {
        	$this->db->set("wachtwoord", hash("sha256", $wachtwoord));
        	$this->db->where('gebruikersnaam', $gebruikersnaam);
        	$this->db->update('gebruiker');
        }
	}
