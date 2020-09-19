<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent ::__construct();
     
        check_not_login();
        check_admin();
        $this->load->model('user_m');

    }


	public function index()
	{
       
        $data ['row'] = $this->user_m->get();
        $this->template->load('template', 'user/user_data', $data);
        // $this->load->view('template', $data);
    }

    // public function foto_user(){
    //     $data ['foto'] = $this->user_m->get();
		
    // }
    
    public function add(){
        
		$this->form_validation->set_rules('fullname','Name','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim|min_length[4]|is_unique[login.username]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[6]');
        $this->form_validation->set_rules('password2','konfirm_Password','required|trim|matches[password]', array('matches'=>'tidak sesuai dengan password'));
        $this->form_validation->set_rules('level','Level','required|trim');
        $this->form_validation->set_rules('address','address','required|trim');

        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
        $this->form_validation->set_message('min_length', 'Minimal 6 karakter password');
        $this->form_validation->set_message('matches', 'password harus sama');
        $this->form_validation->set_message('is_unique',' oops username tidak boleh sama');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() ==false){
			$this->template->load('template', 'user/userform_add');
        } else{
            $config['upload_path']      = './uploads/user';
            $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
            $config['max_size']         = 2040;
            $config['file_name']         = 'user-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);
            $post =$this->input->post(null,TRUE);
            if(@$_FILES['photo']['name'] != null){
                if($this->upload->do_upload('photo')){
                    $post['photo'] =$this->upload->data('file_name');
                    $this->user_m->add($post);
                    if($this->db->affected_rows() > 0 ){
                        $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
                    } else{ 
                        }
                    redirect('user');
        } else{
                $error =$this->upload->display_errors();
                // print_r($error);
                // exit;
                $this->session->set_flashdata('error',$error);
                redirect('user/add');
        }
     } else{
        $post['photo'] =null;
        $this->user_m->add($post);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        redirect('user');

     }
        }
    }
    public function edit($id){
        
		$this->form_validation->set_rules('fullname','Name','required|trim');
        $this->form_validation->set_rules('username','Username','required|trim|min_length[4]|callback_username_check');
        if($this->input->post('password')){
		$this->form_validation->set_rules('password','Password','trim|min_length[6]');
        $this->form_validation->set_rules('password2','konfirm_Password','trim|matches[password]', array('matches'=>'tidak sesuai dengan password'));
        }
        if($this->input->post('password2')){
            $this->form_validation->set_rules('password2','konfirm_Password','required|trim|matches[password]', array('matches'=>'tidak sesuai dengan password'));
         }
        $this->form_validation->set_rules('level','Level','required|trim');
        $this->form_validation->set_rules('address','address','required|trim');

        $this->form_validation->set_message('required', 'Oops Masih ada yang belum di isi, silahkan di isi');
        $this->form_validation->set_message('min_length', 'Minimal 6 karakter password');
        $this->form_validation->set_message('matches', 'password harus sama');
        $this->form_validation->set_message('is_unique',' oops username tidak boleh sama');
        $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

        if($this->form_validation->run() ==false){
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0){
                $data ['row'] = $query->row();
            $this->template->load('template', 'user/userform_edit', $data);
            } else{
                echo "<script> alert ('data tidak di temukan');";
                echo "window.location='".site_url('user')."';</script>";
            }
		} else{
            $post = $this->input->post(null,TRUE);
            $this->user_m->edit($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('user');
        }
    }
    // public function add(){
       
    //     $item = new stdClass();
    //     $item->user_id= null;
    //     $item->username=null;
    //     $item->password= null;
    //     $item->name= null;
    //     $item->address= null;
    //     $item->level= null;
    //     $item->photo= null;
    //     $query_category = $this->category_m->get();
    //     $data = array(
    //         'page' => 'add',
    //         'row' => $row,
    //         'category' =>$query_category,
    //         'unit'=> $unit,'selectedunit' =>null,
    //         'kode' => $this->item_m->kode()
    //     );
         

	// 		$this->template->load('template', 'item/item_form',$data);
		
        
    // }
    // public function proses(){
        
    //     $config['upload_path']      = './uploads/product';
    //     $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
    //     $config['max_size']         = 2040;
    //     $config['file_name']         = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
    //     $this->load->library('upload', $config);
    //     $post =$this->input->post(null,TRUE);
    //     if(isset ($_POST['add'])){
    //         if($this->item_m->check_barcode($post['barcode'])->num_rows() > 0) {
	// 			$this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
	// 			redirect('item/add');
    //         } else{
    //                 if(@$_FILES['image']['name'] != null){
    //                     if($this->upload->do_upload('image')){
    //                         $post['image'] =$this->upload->data('file_name');
    //                         $this->item_m->add($post);
    //                         if($this->db->affected_rows() > 0 ){
    //                             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
    //                         } else{ 
    //                             }
    //                         redirect('item');
    //             } else{
    //                     $error =$this->upload->display_errors();
    //                     $this->session->set_flashdata('error','data gagal disimpan');
	// 			        redirect('item/add');
    //             }
    //          } else{
    //             $post['image'] =null;
    //             $this->item_m->add($post);
    //             if($this->db->affected_rows() > 0 ){
    //                 $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
    //             }
    //             redirect('item');

    //          }
                    
                
    //         }
            
    //      } else if (isset ($_POST['edit'])){
    //          if($this->item_m->check_barcode($post['barcode'],$post['item_id'])->num_rows()>0){
    //             $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
    //             redirect('item/edit/'.$post['item_id']);
    //          } else{  
    //              if(@$_FILES['image']['name'] != null){
    //                 if($this->upload->do_upload('image')){
    //                      $item =$this->item_m->get($post['item_id'])->row();
    //                         if($item->image != null){
    //                              $target_file ='./uploads/product/'.$item->image;
    //                                 unlink($target_file);
    //                           }
    //                         $post['image'] =$this->upload->data('file_name');
    //                         $this->item_m->edit($post);
    //                         if($this->db->affected_rows() > 0 ){
    //                             $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
    //                         }
    //                         redirect('item');
    //             } else{
    //                     $error =$this->upload->display_errors();
    //                     $this->session->set_flashdata('error',$error);
	// 			        redirect('item/add');
    //             }
    //          } else{
    //             $post['image'] =null;
    //             $this->item_m->edit($post);
    //             if($this->db->affected_rows() > 0 ){
    //                 $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
    //             }
    //             redirect('item');

    //                 }
    //             }
    //         }
    //     }
    
    // public function edit($id)
	// {
	// 	$query = $this->item_m->get($id);
	// 	if($query->num_rows() > 0) {
	// 		$item = $query->row();
	// 		$query_category = $this->category_m->get();

	// 		$query_unit = $this->unit_m->get();
	// 		$unit[null] = '- Pilih -';
	// 		foreach ($query_unit->result() as $unt) {
	// 			$unit[$unt->unit_id] = $unt->name;
	// 		}

	// 		$data = array(
	// 			'page' => 'edit',
	// 			'row' => $item,
	// 			'category' => $query_category,
    //             'unit' => $unit, 'selectedunit' => $item->unit_id,
    //             'kode' => $this->item_m->kode()
	// 		);
	// 		$this->template->load('template','item/item_form', $data);
	// 	} else {
	// 		echo "<script>alert('Data tidak ditemukan');";
    //         echo "window.location='".site_url('item')."';</script>";
	// 	}
	// }



    public function username_check($post) {
           $post = $this->input->post(null, TRUE);
        // $query = $this->db->query("SELECT * FROM login WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
          $query =$this->db->query("SELECT * FROM login WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
          if($query->num_rows() > 0) {
             $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
             return FALSE;
         }else{
             return TRUE;
         }
    }
  
    public function del(){
        $id = $this->input->post('user_id');

        $this->user_m->del($id);

        if($this->db->affected_rows() > 0 ){
            echo "<script> alert ('data berhasil di hapus');</script>";
        }
            echo "<script> window.location='".site_url('user')."';</script>";
    


    }
}
