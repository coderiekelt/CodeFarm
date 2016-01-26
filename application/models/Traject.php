<?php 
	// LAATST BEWERKT DOOR: Klaas Hakvoort / 26-1-2016 15:13

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Traject extends CI_Model {
		// CONSTRUCTOR
        public function __construct()
        {
                parent::__construct();
        }

		public function getKlas($naam)
		{
			$query = $this->db->get_where('klaskoppeling', array('deelnemer' => $naam));
			$num = $query->num_rows();
			$result = $query->result();
			
			if ($num == 0) { return false; }
			
			return $result[0]->klas_id;
		}

		public function setKlas($naam, $klas)
		{
			if ($this->getKlas($naam) == false) 
			{
				$data = array(
					"deelnemer" => $naam,
					"klas_id" => $klas
				);
			
            	$this->db->insert('klaskoppeling', $data);
			} else {
				$this->db->set('klas_id', $klas);
				$this->db->where('deelnemer', $naam);
				$this->db->update('klaskoppeling');
			}
		}

		public function numKoppelingen($gebruiker)
		{
			$query = $this->db->get_where('trajectkoppeling', array('groep_naam' => $gebruiker));     
            $num = $query->num_rows();

            return $num;
		}

        public function exists($id)
        {
            $query = $this->db->get_where('traject', array('traject_id' => $id));     
            $num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }

        public function fetchForUser($naam)
        {
        	if (!$this->gebruiker->exists($naam)) { return; }
        	$query = $this->db->get_where("trajectkoppeling", array("gebruikersnaam" => $naam));
        	$result = $query->result();
        	return $result;
        }

        public function fetchDetails($id)
        {
        	$query = $this->db->get_where("traject", array("traject_id" => $id));
        	$result = $query->result();
        	return $result[0];
        }

        public function fetchDomein($domein)
        {
        	$query = $this->db->get($domein);   

        	return $query->result();
        }

        // BESTAAT GEBRUIKER IN DOMEIN? (DEELNEMER, GAST, BEHEERDER)
        public function existsInDomein($domein, $gebruikersnaam)
        {
        	$query = $this->db->get_where($domein, array('gebruikersnaam' => $gebruikersnaam));   

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
		
		public function verify($domein, $gebruikersnaam, $wachtwoord)
		{
			if ($this->existsInDomein($domein, $gebruikersnaam))
			{
				$query = $this->db->get_where('gebruiker', array('gebruikersnaam' => $gebruikersnaam, 'wachtwoord' => hash("sha256", $wachtwoord)));     
				$num = $query->num_rows();
				
				if ($num == 0) { return false ;}
				
				return true;
			} else {
				return false;
			}
		}
		
		public function delete($domein, $gebruiker)
		{
			$this->db->delete('gebruiker', array('gebruikersnaam' => $gebruiker));
			$this->db->delete($domein, array('gebruikersnaam' => $gebruiker));
		}

		public function deleteKlas($gebruiker)
		{
			$this->db->delete('klaskoppeling', array('deelnemer' => $gebruiker));
		}

		public function verifyFe($domein, $gebruikersnaam)
		{
			if ($this->existsInDomein($domein, $gebruikersnaam))
			{
				$query = $this->db->get_where('gebruiker', array('gebruikersnaam' => $gebruikersnaam));     
				$num = $query->num_rows();
				
				if ($num == 0) { return false ;}
				return true;
			} else {
				return false;
			}
		}
		
		public function setupSession($domein, $gebruikersnaam)
		{
			if (!$this->existsInDomein($domein, $gebruikersnaam)) { return false; }
			
			$query = $this->db->get_where('gebruiker', array('gebruikersnaam' => $gebruikersnaam));
			
			$result = $query->result();
			
			if (isset($result[0]->voornaam))
			{
				$_SESSION['displaynaam'] = $result[0]->voornaam . " " . $result[0]->achternaam;
			} else {
				$_SESSION['displaynaam'] = $gebruikersnaam;
			}
			
			$_SESSION['usernaam'] = $gebruikersnaam;
			
			$_SESSION['domein'] = $domein;
			
			$this->set($gebruikersnaam, "datum_laatsgezien", date('Y-m-d H:i:s'));
			return true;
		}
		
		public function destroySession()
		{
			session_destroy();
		}
		
		// SETS
		public function Set($id, $key, $value)
		{
			$CI =& get_instance();

			$CI->db->set($key, $value);
			$CI->db->where('gebruikersnaam', $id);
			$CI->db->update('gebruiker');
		}

		// GETS
		public function Get($id, $key)
		{
			$CI =& get_instance();
			$query = $CI->db->get_where('gebruiker', array('gebruikersnaam' => $id));
			$row = $query->row_array();
	
			if (isset($row))
			{
				return $row[$key];
			} else {
				return false;
			}
		}
	
		public function get_gravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
			$url = 'http://www.gravatar.com/avatar/';
			$url .= md5( strtolower( trim( $email ) ) );
			$url .= "?s=$s&d=$d&r=$r";
			if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
				$url .= ' />';
			}
			return $url;
		}
	}
