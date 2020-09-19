<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function login()
	{
	
		$this->load->view('login');
		// $this->form_validation->set_rules('username','Username','required');
		// $this->form_validation->set_rules('password','Password','required');
		// $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
		// $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		check_already_login();
	}

	public function proses(){
		$post = $this->input->post(null,TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			
			if($query->num_rows() > 0 ) {
				$row = $query->row();
				$params = array(
					'user_id' => htmlspecialchars($row->user_id),
					'level'  =>htmlspecialchars($row->level),
					'photo' =>($row->photo)

				);
				
				
				$this->session->set_userdata($params);
				$this->session->set_flashdata('success', 'Login Success');
			    redirect('dashboard');


			} else{
				$this->session->set_flashdata('error', 'username or password was wrong !');
			    redirect('Auth/login');

			}
		}
	}

	public function logout(){
		$params= array('user_id','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
