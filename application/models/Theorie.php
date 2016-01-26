<?php 
	// LAATST BEWERKT DOOR: RIEKELT BRANDS / 1-11-2016 18:05

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Theorie extends CI_Model {
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
			$query = $this->db->get_where('projectkoppeling', array('gebruikersnaam' => $gebruiker));     
            $num = $query->num_rows();

            return $num;
		}

        public function exists($id)
        {
            $query = $this->db->get_where('project', array('project_id' => $id));     
            $num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }

        public function fetchForProject($id)
        {
        	$query = $this->db->get_where("projecttheorie", array("project_id" => $id));
        	$result = $query->result();
        	return $result;
        }

        public function fetchDetails($id)
        {
        	$query = $this->db->get_where("theorie", array("theorie_id" => $id));
        	$result = $query->result();
        	return $result[0];
        }


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

		public function delete($domein, $gebruiker)
		{
			$this->db->delete('gebruiker', array('gebruikersnaam' => $gebruiker));
			$this->db->delete($domein, array('gebruikersnaam' => $gebruiker));
		}

		// SETS
		public function Set($id, $key, $value)
		{
			$CI =& get_instance();

			$CI->db->set($key, $value);
			$CI->db->where('theorie_id', $id);
			$CI->db->update('theorie');
		}

		// GETS
		public function Get($id, $key)
		{
			$CI =& get_instance();
			$query = $CI->db->get_where('theorie', array('theorie_id' => $id));
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
