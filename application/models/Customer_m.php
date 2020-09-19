<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model{
    function get($id = null)
    {
        $this->db->from('customer');

        if($id != null){
            $this->db->where('customer_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){
        $params['name'] = $post ['name'];
        $params['gender'] = $post ['gender'];
        $params['phone'] = $post ['phone'];
        $params['address'] = $post ['address'];

        $this->db->insert('customer',$params);

    }
    public function edit($post){
        $params['name'] = $post ['name'];
        $params['gender'] = $post ['gender'];
        $params['phone'] = $post ['phone'];
        $params['address'] = $post ['address'];
        $this->db->where('customer_id',$post['customer_id']);
        $this->db->update('customer',$params);
    }
   
    public function del($id){
        $this->db->where('customer_id',$id);
        $this->db->delete('customer');
    }

}