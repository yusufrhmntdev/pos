<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_m extends CI_Model{
    function get($id = null)
    {
        $this->db->from('unit');

        if($id != null){
            $this->db->where('unit_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){
        $params['name'] = $post ['name'];

        $this->db->insert('unit',$params);

    }
    public function edit($post){
        $params = [

            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        // $params['name'] = $post ['name'];
        // $params['updated'] = date('Y-m-d H:i:s');
   
       
        $this->db->where('unit_id',$post['unit_id']);
        $this->db->update('unit',$params);
    }
   
    public function del($id){
        $this->db->where('unit_id',$id);
        $this->db->delete('unit');
    }

}