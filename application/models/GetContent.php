<?php

class getContent extends CI_Model
{
	function getTitle(){
		$result = $this->db->get('pagedetails');
		if($result->num_rows()>0){
			return $result->result();
		}
		else{
			return "About";
		}
	}

		function pageSections(){
			$data = $this->db->select("section,color")
							->from("pagecontent")
							->get();
			if($data->num_rows()>0){
				return $data->result();
			}else{
				return null;
			}
		}


	function pageContent($section=NULL){
		if($section==NULL){
			$data = $this->db->select("*")
							->from("pagecontent")
							->get();
			if($data->num_rows()>0){
				return $data->result();
			}else{
				return null;
			}
		}else{
			$data = $this->db->select("section,body,files,color")
							->from("pagecontent")
							->where("section",$section)
							->get();
			if($data->num_rows()>0){
				return $data->result();
			}else{
				return null;
			}
		}
	}
	
}