<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		
		$this->load->model('customer_m');

	}
	public function index()
	{
		
		$data['row'] = $this->customer_m->get();
		$this->template->load('template', 'customer/customer_data',$data);
	}
	public function add(){
        
		$this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('gender','gender','required|trim');
        $this->form_validation->set_rules('phone','phone','required|trim');
        $this->form_validation->set_rules('address','address','required|trim');

        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
   
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() ==false){
			$this->template->load('template', 'customer/customer_add');
		} else{
            $post = $this->input->post(null,TRUE);
            $this->customer_m->add($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('customer');
        }

	}
	public function edit($id){
		
        $this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('gender','gender','required|trim');
        $this->form_validation->set_rules('phone','phone','required|trim');
        $this->form_validation->set_rules('address','address','required|trim');

        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
   
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
        if($this->form_validation->run() ==false){
            $query = $this->customer_m->get($id);
            if ($query->num_rows() > 0){
                $data ['row'] = $query->row();
            $this->template->load('template', 'customer/customerform_edit', $data);
            } else{
                echo "<script> alert ('data tidak di temukan');";
                echo "window.location='".site_url('customer')."';</script>";
            }
		} else{
            $post = $this->input->post(null,TRUE);
            $this->customer_m->edit($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Di edit');
            }
            redirect('customer');
        }

    }
	public function del($id){
		$this->customer_m->del($id);
		if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('customer');
	}
}
