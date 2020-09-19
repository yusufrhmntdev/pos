<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		
		$this->load->model('sale_m');

	}

	public function index()
	{
		$this->load->model(['customer_m','item_m']);
		$customer =$this->customer_m->get()->result();
		$item =$this->item_m->get()->result();
		$cart =$this->sale_m->get_cart();
		$data = array(
						'customer' =>$customer,
						'item'     =>$item,
						'cartt'     =>$cart,
						'invoice'  =>$this->sale_m->invoice_no(),
	    );
		$this->template->load('template', 'transacition/sale/sale_form',$data);
	}

	public function process(){

		$data = $this->input->post(null,TRUE);

		if(isset($_POST['add_cart'])){
		  $item_id = $this->input->post('item_id');	
		  $check_cart= $this->sale_m->get_cart(['t_chart.item_id' => $item_id ]);
		  if ($check_cart->num_rows() > 0) {
		  	$this->sale_m->update_cart_qty($data);
		  }else{
		  	$this->sale_m->add_cart($data);
		  }
			if($this->db->affected_rows() > 0){
			$params = array("success" => true);
			} else{
			$params = array("success" => false);
			}

			echo json_encode($params);

		}

		if(isset($_POST['edit_cart'])){
			$this->sale_m->edit_cart($data);

			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			} else{
				$params = array("success" => false);
			}

			echo json_encode($params);
		}

		if(isset($_POST['process_payment'])){

		$sale_id =	$this->sale_m->add_sale($data);



		$cart = $this->sale_m->get_cart()->result();

		$row = [];

				foreach($cart as $value){
					array_push($row,array(

						// kiri tabel t_sale_detail, kanan tabel t_chart
						'sale_id' => $sale_id,
						'item_id' => $value->item_id,
						'price'	  => $value->price,
						'qty'	  => $value->qty,
						'discount_item' => $value->discount,
						'total'  	=> $value ->total,
					
					)
				);
			}
			 $this->sale_m->add_sale_detail($row);
			$this->sale_m->del_cart(['user_id' => $this->session->userdata('user_id')]);
			if($this->db->affected_rows() > 0) {
				$params = array("success" => true, "sale_id" => $sale_id);
			} else {
				$params = array("success" => false);
			}
	
				echo json_encode($params);
		}
		
	}
		
		function cart_data(){

			$cart = $this->sale_m->get_cart();
			$data['cartt'] = $cart;
			$this->load->view('transacition/sale/cart_data',$data);

	}

	public function cart_del(){

		$cart_id = $this->input->post('cart_id');
		
		$this->sale_m->del_cart(['cart_id' => $cart_id]);

		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
			} else{
			$params = array("success" => false);
			}

			echo json_encode($params);
	}


}
