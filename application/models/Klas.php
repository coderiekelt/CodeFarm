<?php 
	// LAATST BEWERKT DOOR: RIEKELT BRANDS / 1-15-2016 10:58

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Klas extends CI_Model {
		// CONSTRUCTOR
        public function __construct()
        {
                parent::__construct();
        }
		
		// BESTAAT KLAS? (ID)
        public function exists($id)
        {
            $query = $this->db->get_where('klas', array('klas_id' => $id));     
            $num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }

        public function existsNaam($naam)
        {
            $query = $this->db->get_where('klas', array('naam' => $naam));     
            $num = $query->num_rows();

            if ($num == 0) 
            {
            	return false;
            }
            return true;
        }
		
		public function fetchAll()
		{
			$query = $this->db->get('klas');
			
			return $query->result();
		}

		public function fetchIn($klas)
		{
			$query = $this->db->get_where('klaskoppeling', array("klas_id" => $klas));
			
			return $query->result();
		}


		public function fetchId($naam)
        {
        	$query = $this->db->get_where("klas", array("naam" => $naam));
        	$result = $query->result();
        	return $result[0]->klas_id;
        }

		public function fetchDetails($id)
        {
        	$query = $this->db->get_where("klas", array("klas_id" => $id));
        	$result = $query->result();
        	return $result[0];
        }

        public function delete($id)
		{
			$this->db->delete('klas', array('klas_id' => $id));
			$this->db->delete('klaskoppeling', array('klas_id' => $id));
		}
		
		// KLAS AANMAKEN
		// LETOP: CONTROLEER ZELF EERST OF KLAS AL BESTAAT
        public function create($naam)
        {
			$data = array(
				"naam" => $naam
			);
		
            $this->db->insert('klas', $data);
        }
		
		// SETS
		public function Set($id, $key, $value)
		{
			$CI =& get_instance();

			$CI->db->set($key, $value);
			$CI->db->where('klas_id', $id);
			$CI->db->update('klas');
		}

		// GETS
		public function Get($id, $key)
		{
			$CI =& get_instance();
			$query = $CI->db->get_where('klas', array('klas_id' => $id));
			$row = $query->row_array();
	
			if (isset($row))
			{
				return $row[$key];
			} else {
				return false;
			}
		}
	}
