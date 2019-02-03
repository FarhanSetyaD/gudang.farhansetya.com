<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_preinvoice extends CI_Model {
	function get_preinvoice($pos_no){
	   return $this->db->query("SELECT * FROM `HOST_BL` WHERE POS_NO = '$pos_no'");
	   //return $this->db->query("SELECT MBL_NO, CNTR_ID, VESSEL_NAME  FROM `MASTER_BL` WHERE MBL_NO = (SELECT MBL_NO FROM `HOST_BL` WHERE POS_NO = '$pos_no') JOIN `HOST_BL` ON MASTER_BL.MBL_NO = HOST_BL.MBL_NO 
	   //WHERE POS_NO = '$pos_no'");
	}
	function get_mbl($pos_no){
	   return $this->db->query("SELECT MBL_NO, CNTR_ID, VESSEL_NAME  FROM `MASTER_BL` WHERE MBL_NO = (SELECT MBL_NO FROM `HOST_BL` WHERE POS_NO = '$pos_no')");
	}
	function get_datalist(){
        $query =  $this->db->get('HOST_BL');
        if ($query->num_rows() > 0 ){
            return $query->result_array();
        }
    }
//     function insert($data)
// 	{
// 		$query = $this->db->insert('USER', $data);
// 		return $query;
// 	}
// 	function cek_login($table,$where){		
// 		return $this->db->get_where($table,$where);
// 	}
// 	function get_user(){
// 	    return $this->db->get('USER');
// 	}
// 	function get_guru(){
// 	   return $this->db->query('SELECT * FROM USER WHERE ROLE = "guru"');
// 	}
// 	function edit_user($where,$table){		
// 		return $this->db->get_where($table,$where);
// 	}
// 	function update_user($where,$data,$table){
// 		$this->db->where($where);
// 		$this->db->update($table,$data);
// 	}
// 	function hapus_user($where,$table){
// 		$this->db->where($where);
// 		$this->db->delete($table);
// 	}
// 	function get_id($id){
// 	    return $this->db->query("SELECT * FROM USER WHERE ID_USER = '$id'");
// 	}
// 	function insert_order($data)
// 	{
// 		$query = $this->db->insert('ORDER', $data);
// 		return $query;
// 	}
// 	function hapus_order($where,$table){
// 		$this->db->where($where);
// 		$this->db->delete($table);
// 	}
// 	function get_jadwal_guru_acc($nama){
// 	   return $this->db->query("SELECT * FROM `ORDER` WHERE nama_guru = '$nama' AND status = 'Declined'");
// 	}
// 	function get_jadwal_guru($nama){
// 	   return $this->db->query("SELECT * FROM `ORDER` WHERE nama_guru = '$nama' AND status = 'Accepted'");
// 	}
// 	function edit_acc($id){
// 	    return $this->db->query("UPDATE `ORDER` SET status = 'Accepted' WHERE ORDER.id_order = '$id'");
// 	}
// 	function get_id_session($username){
// 	    $id = $this->db->get_where('USER', array('username' => $username))->row();
// 	    return $id;
// 	}
}