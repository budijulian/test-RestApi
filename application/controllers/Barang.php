
<?php
class Barang extends CI_Controller{
// construct
  public function __construct(){
	parent::__construct();
	
	$this->load->helper('url');
    $this->load->model('m_barang');
  }
  public function index()
	{
		$databarang = $this->m_barang->all_barang();
		$this->load->view('barang',$databarang);
	}
}
?>