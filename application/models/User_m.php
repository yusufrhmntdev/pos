<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    public function login($post)
    {

            $this->db->select('*');
            $this->db->from('login');
            $this->db->where('username',$post['username']); //sesuai nama database dan name di html
            $this->db->where('password',sha1($post['password']));
            $query = $this->db->get();
            
            return $query;
    }

    function get($id = null)
    {
        $this->db->from('login');

        if($id != null){
            $this->db->where('user_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }

    public function add($post){
        $params['name'] = $post ['fullname'];
        $params['username'] = $post ['username'];
        $params['password'] = sha1($post ['password']);
        $params['address'] = $post ['address'];
        $params['level'] = $post ['level'];
        $params['photo'] = $post ['photo'];

        $this->db->insert('login',$params);

    }
    public function edit($post){
        $params['name'] = $post ['fullname'];
        $params['username'] = $post ['username'];
        if(!empty($post['password'])){
        $params['password'] = sha1($post ['password']);
        }
        $params['address'] = $post ['address'];
        $params['level'] = $post ['level'];
        if($post['photo'] != null){
        $params['photo'] = $post ['photo'];

        }
        $this->db->where('user_id',$post['user_id']);
        $this->db->update('login',$params);

       
    }
   
    public function username_check($query){
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

    public function del($id){
        $this->db->where('user_id',$id);
        $this->db->delete('login');
    }
  
}
?>