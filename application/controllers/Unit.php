<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		
		$this->load->model('unit_m');

	}
	public function index()
	{
		
		$data['row'] = $this->unit_m->get();
		$this->template->load('template', 'unit/unit_data',$data);
	}
	public function add(){
        
		$this->form_validation->set_rules('name','name','required|trim');
	
        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
   
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() ==false){
			$this->template->load('template', 'unit/unit_add');
		} else{
            $post = $this->input->post(null,TRUE);
            $this->unit_m->add($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('unit');
        }

	}
	public function edit($id){
		
        $this->form_validation->set_rules('name','name','required|trim');
	
        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
   
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
        if($this->form_validation->run() ==false){
            $query = $this->unit_m->get($id);
            if ($query->num_rows() > 0){
                $data ['row'] = $query->row();
            $this->template->load('template', 'unit/unitform_edit', $data);
            } else{
                echo "<script> alert ('data tidak di temukan');";
                echo "window.location='".site_url('unit')."';</script>";
            }
		} else{
            $post = $this->input->post(null,TRUE);
            $this->unit_m->edit($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('unit');
        }

    }
	public function del($id){	
		$this->unit_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
		if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
		}
        redirect('unit');
	}
}
