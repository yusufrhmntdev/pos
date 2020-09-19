<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		check_admin();
		$this->load->model('user_m');

	}
	public function index()
	{
		
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data',$data);
	}
	public function add(){
        $user = new stdClass();
        $user->user_id=null;
        $user->name=null;
        $user->phone=null;
        $user->address=null;
        $user->description=null;
        $data = array(
            'page' => 'add',
            'row' => $user
        );
         

			$this->template->load('template', 'user/user_form',$data);
		
        
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->user_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->user_m->edit($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('user');
        }
       
    }
	public function edit($id){
		
    
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0){
                $user  = $query->row();
                $data = array(
                    'page' => 'edit',
                    'row' => $user
                );
                 $this->template->load('template', 'user/user_form',$data);
             } else{
                echo "<script> alert ('data tidak di temukan');";
                echo "window.location='".site_url('user')."';</script>";
            }

    }
	public function del($id){
	
        $this->user_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('user');
	
	}
}
