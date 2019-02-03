<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction extends CI_Model {
    function get_datalist()
    {
        $query =  $this->db->get('MASTER_BL');
        if ($query->num_rows() > 0 ){
            return $query->result_array();
        }
    }
    function get_datalist_consignee()
    {
        $query =  $this->db->get('CUSTOMERS');
        if ($query->num_rows() > 0 ){
            return $query->result_array();
        }
    }
    function insert_mbl($data_mbl)
	{
		$query = $this->db->insert('MASTER_BL', $data_mbl);
		return $query;
	}
	function insert_hbl($data_hbl)
	{
		$query = $this->db->insert_batch('HOST_BL', $data_hbl);
		return $query;
	}
	function get_mbl_id($mbl_no){
	    $query = $this->db->query("SELECT MBL_ID FROM MASTER_BL WHERE MBL_NO = '$mbl_no'");
	    if ($query->num_rows() > 0) {
         return $query->row()->MBL_ID;
     }
     return false;
	}
	function get_cust_id($consignee){
	    $query = $this->db->query("SELECT CUST_ID FROM CUSTOMERS WHERE CUST_NAME = '$consignee'");
	    if ($query->num_rows() > 0) {
         return $query->row()->CUST_ID;
     }
     return false;
     
	//     $this->db->select('CUST_ID')->from('CUSTOMERS')->where('CUST_NAME',$consignee);
    //     $query = $this->db->get();
    //     return $query->result(); 
	}
	function get_cust_npwp($consignee){
	    $query = $this->db->query("SELECT NPWP FROM CUSTOMERS WHERE CUST_NAME = '$consignee'");
	    if ($query->num_rows() > 0) {
         return $query->row()->NPWP;
     }
     return false;
     
	}
	function get_mbl($mbl_no){
	    return $query = $this->db->query("SELECT * FROM `MASTER_BL` WHERE MBL_NO = '$mbl_no'");
	}
	function get_hbl($mbl_no){
	    return $query = $this->db->query("SELECT * FROM HOST_BL WHERE MBL_NO = '$mbl_no'");
	}
	function get_count_hbl($mbl_no){
	    $query = $this->db->query("SELECT MBL_NO FROM HOST_BL WHERE MBL_NO = '$mbl_no'");
	    if ($query->num_rows() > 0){
	        return $query->num_rows();
	    }
	}
	function update_mbl($table, $data_mbl)
	{
		//$this->db->where($where);
		return $this->db->update_batch('MASTER_BL', $data_mbl);
	}
	function update_hbl($table, $data_hbl)
	{
		//$this->db->where($where);
		return $this->db->update_batch('HOST_BL', $data_hbl);
	}
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
// 	function get_jadwal_murid($nama){
// 	   return $this->db->query("SELECT * FROM `ORDER` WHERE nama_murid = '$nama' AND status = 'Accepted'");
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