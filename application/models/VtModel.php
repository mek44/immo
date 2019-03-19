<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VtModel extends CI_Model {
	protected $date_array = array('dateCreation','dateModification');
	function __construct()
	{

		parent::__construct();//contructeur de la classe
		date_default_timezone_set("Africa/Porto-Novo");
	}

	//Fonction d'ajout d'enregistrements
	function Ajouter($table,$data){

			$data_temp = $data;
			if ($this->date_array!=null || $this->date_array!="" ) {
				foreach ($this->date_array as $d ) {
					if (array_key_exists($d, $data_temp)) {
						unset($data_temp[$d]);
					}
				}
			}

			$result = $this->db->get_where($table, $data_temp);
    		$exist = (bool)$result->num_rows();

    		if ($exist) {
    			return array("success"=>false,"code"=>201,"data"=>null,"message"=>"");exit();
    		}

    		if ($this->date_array!=null || $this->date_array!="" ) {
    			foreach ($this->date_array as $d ) {
					$data[$d] = date('Y-m-d H:i:s');
				}
    		}
    		

			if ($this->db->insert($table,$data)) {
				return array("success"=>true,"code"=>200,"data"=>$data,"message"=>"", "insert_id"=> $this->db->insert_id());
			}else{
				return array("success"=>false,"code"=>500,"data"=>null,"message"=>"");
			}
		
	}

	//Fonction de modification d'enregistrements
	function Modifier($table,$data,$id){
		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}
		if ($this->db->update($table,$data,array($primary_key_name=>$id))) {
			// récupérer l'enregistrement après mise à jour
			return array("success"=>true,"code"=>200,"data"=>$this->ObtenirElement($table,$id)['data']);
		}else{
			return array("success"=>false,"code"=>500,"data"=>null);
		}
		
	}

	//Fonction de suppression d'enregistrements
	function Supprimer($table,$id_array){
		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}

		if (!is_array($id_array)) {
			if ($this->db->delete($table,array($primary_key_name=>$id_array))) {
				return array("success"=>true,"data"=>null);
			}else{
				return array("success"=>false,"data"=>null);
			}
		}else{
			foreach ($id_array as $id) {
				$this->db->delete($table,array($primary_key_name=>$id));
			}
			return array("success"=>true,"data"=>null);
		}
										
	}

	//Fonction de recupération d'un enregistrement 
	function ObtenirElement($table,$id,$sql=null){	
		$primary_key_name = null;
		$col_data = $this->db->query("SHOW COLUMNS FROM ".$table);

		if ($col_data->num_rows()>0) {
			foreach ($col_data->result() as $col) {
				if ($col->Key!='') {
					$primary_key_name = $col->Field;
				}
			}
		}
		if ($sql==null) {
			$q = $this->db
			->select('*')
			->from($table)
			->where($primary_key_name,$id)
			->get();
		}else{
			$q = $this->db
			->select('*')
			->from($table)
			->where($sql)
			->where($primary_key_name,$id)
			->get();
		}
		if($q->num_rows()>0){
			return array("success"=>true,"code"=>200,"data"=>$q->row());
		}else{
			return array("success"=>false,"code"=>500,"data"=>null);
		}
	 }


	//Fonction de récupération des enregistrements d'une table
	function Lister($table,$ivtFiltre=null,$ivtMode=null){
		if ($ivtMode=="loadmore") {
			//
		}else{
			// Lister sans load more
			if ($ivtFiltre==null) {
				$q = $this->db
				->select('*')
				->from($table)
				->get();
			}else{
				$q = $this->db
				->select('*')
				->from($table)
				->where($ivtFiltre)
				->get();
			}
			
			if ($q->num_rows()>0) {
				foreach ($q->result() as $row) {
					$data[] = $row;
				}
				return array("success"=>true,"code"=>200,"data"=>$data);
			}else{
				return array("success"=>false,"code"=>500,"data"=>null);
			}
		}
		
		
	}

}



	 
	 