<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_transaction');
        //$this->load->library('session');
    }
    
	public function index()
	{
	    $data['consignee']=$this->M_transaction->get_datalist_consignee('CUSTOMERS');
		$this->load->view('V_transaction',$data);
    }
    
    function insert($rowCount){
        if(isset($_POST['submit'])){
            
            $data_mbl = array(
				'MBL_NO'	        => $this->input->post('nomor_master'),
				'VESSEL_NAME'       => $this->input->post('nama_master'),
				'VOYAGE'            => $this->input->post('kapal'),
				'TERMINAL_ASAL'     => $this->input->post('terminal'),
				'ETA'               => $this->input->post('eta'),
				'CNTR_ID'           => $this->input->post('cntr_id'),
				'POL'               => $this->input->post('pol'),
				'CNTR_SIZE'         => $this->input->post('cntr_size'),
				'CNTR_TYPE'         => $this->input->post('cntr_type'),
				'CNTR_TYPE_GROUP'   => $this->input->post('cntr_type_group'),
				'DG_CODE'           => $this->input->post('dg_code'),
				'JOB_NO'            => $this->input->post('nomor_job'),
				'BC11_NBR'          => $this->input->post('bc11_nbr'),
				'BC11_DATE'         => $this->input->post('bc11_date')
				
			);
			$input_mbl = $this->M_transaction->insert_mbl($data_mbl);
			$mbl_no = $_POST['nomor_master'];
			$consignee = $_POST['nama_host'];			
			$data_hbl = array();
			for($i = 0;$i < $rowCount; $i++){
				$data_hbl[$i] = array(
					'MBL_ID'                => $this->M_transaction->get_mbl_id($mbl_no),
					'MBL_NO'	            => $this->input->post('nomor_master'),
					'POS_NO'	            => $this->input->post('nomor_host')[$i],
					'CONSIGNEE'	            => $this->input->post('nama_host')[$i],
					'NPWP'                  => $this->M_transaction->get_cust_npwp($consignee[$i]),
					'CUST_ID'               => $this->M_transaction->get_cust_id($consignee[$i]),
					'HBL_NO'	            => $this->input->post('hbl_no')[$i],
					'PARTY_QTY'	            => $this->input->post('party_qty')[$i],
					'PARTY_UNIT'            => $this->input->post('party_unit')[$i],
					'GROSS_WEIGHT'	        => $this->input->post('gross_weight')[$i],
					'GROSS_WEIGHT_UNIT'	    => $this->input->post('gross_weight_unit')[$i],
					'CBM'	                => $this->input->post('cbm')[$i],
					'UP'                    => $this->input->post('up')[$i],
					'COMMODITY'	            => $this->input->post('commodity')[$i],
					'HS_CODE'	            => $this->input->post('hs_code')[$i],
					'RELEASE_DATETIME'      => $this->input->post('release_datetime')[$i],
					'DO_NO'	                => $this->input->post('do_no')[$i],
					'DO_EXPIRY_DATETIME'	=> $this->input->post('do_expiry_datetime')[$i]
				);
			}
			
// 			$input_mbl = $this->M_transaction->insert_mbl($data_mbl);
			$input_hbl = $this->M_transaction->insert_hbl($data_hbl);

			redirect('http://gudang.farhansetya.com/index.php/C_home');
        }
    }
}
