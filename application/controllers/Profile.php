<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    // function __construct()
    // {
    //     parent ::__construct();
     
    //     check_not_login();
    //     check_admin();
    //     $this->load->model('user_m');

    // }
	public function index()
	{
		$this->template->load('template', 'profile/profile_data');
    }

    public function foto_edit_user($post){


        if (isset ($_POST['edit_photo'])){
        $config['upload_path']      = './uploads/user';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']         = 2040;
        $config['file_name']         = 'user-'.date('ymd').'-'.substr(md5(rand()),0,10);
            if(@$_FILES['image']['name'] != null){
                if($this->upload->do_upload('image')){
                    $user=$this->user_m->get($post['user_id'])->row();
                        if($user->image != null){
                            $target_file ='./uploads/user/'.$user->image;
                                unlink($target_file);
                            }
                        $post['image'] =$this->upload->data('file_name');
                        $this->user_m->edit($post);
                        if($this->db->affected_rows() > 0 ){
                            $this->session->set_flashdata('success', 'Photo Berhasil Diedit');
                        }
                        redirect('profile');
            } else{
                    $error =$this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    redirect('profile/foto_edit_user');
            }
        } else{
            $post['image'] =null;
            $this->user_m->edit($post);
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            }
            redirect('profile');

        }
      }
    }
 }