<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		check_admin();
		$this->load->model('supplier_m');

	}
	public function index()
	{
		
		$data['row'] = $this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data',$data);
	}
	public function add(){
        $supplier = new stdClass();
        $supplier->supplier_id=null;
        $supplier->name=null;
        $supplier->phone=null;
        $supplier->address=null;
        $supplier->description=null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
         

			$this->template->load('template', 'supplier/supplier_form',$data);
		
        
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->supplier_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->supplier_m->edit($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('supplier');
        }
       
    }
	public function edit($id){
		
    
            $query = $this->supplier_m->get($id);
            if ($query->num_rows() > 0){
                $supplier  = $query->row();
                $data = array(
                    'page' => 'edit',
                    'row' => $supplier
                );
                 $this->template->load('template', 'supplier/supplier_form',$data);
             } else{
                echo "<script> alert ('data tidak di temukan');";
                echo "window.location='".site_url('user')."';</script>";
            }

    }
	public function del($id){
	
        $this->supplier_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('supplier');
	
	}
}
