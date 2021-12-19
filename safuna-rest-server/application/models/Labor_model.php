<?php

class Labor_model extends CI_Model
{
	
	public function getLabor($id = null)
	{
		if($id === null) {
			return $this->db->get('labor')->result_array();
		}else {
			return $this->db->get_where('labor', ['id' => $id])->result_array();
		}
	}
	
	public function deleteLabor($id)
	{
		$this->db->delete('labor', ['id' => $id]);
		return $this->db->affected_rows();
	}
	
	
	public function createLabor($data)
	{
		$this->db->insert('labor', $data);
		return $this->db->affected_rows();
	}
	
	public function updateLabor($data, $id)
	{
		$this->db->update('labor', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}
}