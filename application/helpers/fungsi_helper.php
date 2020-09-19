<?php
        
    function check_already_login(){
        $ci =& get_instance();

        $user_session = $ci->session->userdata('user_id');

        if($user_session){
            
            redirect('dashboard');
        }
    }

    function check_not_login(){
        $ci =& get_instance();

        $user_session = $ci->session->userdata('user_id');

        if(!$user_session){
            redirect('auth/login');
        }
    }
    function check_admin(){
        $ci =& get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level != 1){
            redirect('dashboard');
        }
    }
    function indo_currency($nominal)
    {
        $result ="Rp.".number_format($nominal, 0, ",", ".");
         return  $result;
    }

    function indo_date($date){
        // array hari dan bulan
        $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
        $Bulan = array("Januari","Februari","Maret","April","Mei","Juni",
                       "Juli","Agustus","September","Oktober","November","Desember");
        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date,0,4);
        $bulan = substr($date,5,2);
        $tgl = substr($date,8,2);
        $waktu = substr($date,11,5);
        $hari = date("w",strtotime($date));
        $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." ";
        return $result;
    }

    function sf_upload($nama_gambar,$lokasi_gambar,$tipe_gambar,$ukuran_gambar,$nama_file_form){

        $CI                         =&get_instance();
        $nmfile                     = $nama_gambar . "_" .time();
        $config['upload_path']      ='./' . $lokasi_gambar;
        $config['allowed_types']    = $tipe_gambar;
        $config['max_size']         = $ukuran_gambar;
        $config['file_name']        = $nmfile;
        $CI->load->library('upload',$config);
        $CI->upload->do_upload($nama_file_form);
        $result1 = $CI->upload->data();
        $result = ['photo' => $result1];
        $dfile = $result['photo']['file_name'];
        return $dfile; 


    }