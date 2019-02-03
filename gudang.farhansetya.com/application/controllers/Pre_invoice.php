<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_invoice extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_preinvoice');
        //$this->load->library('session');
    }
    
	public function index()
	{
	    $data['dropdown']=$this->M_preinvoice->get_datalist('HOST_BL');
		$this->load->view('V_search_preinvoice', $data);
    }
    public function search()
    {
        $pos_no = $_POST['nomor_host'];
        $data['preinvoice']=$this->M_preinvoice->get_preinvoice($pos_no)->result();
        $data['mbl']=$this->M_preinvoice->get_mbl($pos_no)->result();
        $this->load->view('V_preinvoice.php',$data);
    }
    public function biaya()
    {
        $this->load->view('V_estimasi_biaya');
    }
    
//     function insert(){
//         if(isset($_POST['submit'])){
//             $data_mbl = array(
// 				'MBL_NO'	        => $this->input->post('nomor_master'),
// 				'VESSEL_NAME'       => $this->input->post('nama_master'),
// 				'VOYAGE'            => $this->input->post('kapal'),
// 				'TERMINAL_ASAL'     => $this->input->post('terminal'),
// 				'ETA'               => $this->input->post('eta'),
// 				'CNTR_ID'           => $this->input->post('cntr_id'),
// 				'POL'               => $this->input->post('pol'),
// 				'CNTR_SIZE'         => $this->input->post('cntr_size'),
// 				'CNTR_TYPE'         => $this->input->post('cntr_type'),
// 				'CNTR_TYPE_GROUP'   => $this->input->post('cntr_type_group'),
// 				'DG_CODE'           => $this->input->post('dg_code'),
// 				'JOB_NO'            => $this->input->post('nomor_job'),
// 				'BC11_NBR'          => $this->input->post('bc11_nbr'),
// 				'BC11_DATE'         => $this->input->post('bc11_date')
				
// 			);
			
// 			$data_hbl = array(
// 				'POS_NO'	            => $this->input->post('nomor_host'),
// 				'CONSIGNEE'	            => $this->input->post('nama_host'),
// 				'NPWP'                  => $this->input->post('npwp'),
// 				//'CUST_ID'               => $this->input->post('cust_id'),
// 				'HBL_NO'	            => $this->input->post('hbl_no'),
// 				'PARTY_QTY'	            => $this->input->post('party_qty'),
// 				'PARTY_UNIT'            => $this->input->post('party_unit'),
// 				'GROSS_WEIGHT'	        => $this->input->post('gross_weight'),
// 				'GROSS_WEIGHT_UNIT'	    => $this->input->post('gross_weight_unit'),
// 				'CMB'	                => $this->input->post('cmb'),
// 				'UP'                    => $this->input->post('up'),
// 				'COMMODITY'	            => $this->input->post('commodity'),
// 				'HS_CODE'	            => $this->input->post('hs_code'),
// 				'RELEASE_DATETIME'      => $this->input->post('release_datetime'),
// 				'DO_NO'	                => $this->input->post('do_no'),
// 				'DO_EXPIRY_DATETIME'	=> $this->input->post('do_expiry_datetime')
// 			);
			
// 			$input_mbl = $this->M_transaction->insert_mbl($data_mbl);
// 			$input_hbl = $this->M_transaction->insert_hbl($data_hbl);
// 			redirect('C_home');
//         }
//     }
}
