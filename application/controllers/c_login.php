<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class C_login extends CI_Controller {

        function __construct(){
            parent::__construct();
        }
        //Menampilkan Function Index
        public function index(){
            $this->load->view('v_login');
        }

        //Validasi login
        function aksi_login(){
            $username = $this->input->POST('username'); 
            $password = $this->input->POST('password');
            //required adalah wajib di isi
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() != false){
                $data = $where = array(
                            'username'=>$username,
                            'password'=>md5($password),
                            'role'=>'1'
                            );
                // var_dump($where);
                // die();
                //kondisi ke-1 apabila login sebagai admin
                if($data['role']=='1'){
                    $cek = $this->m_data->cek_login($where,'1')->num_rows();
                    $data = $this->m_data->cek_login($where,'1')->row();

                    if($cek > 0){
                        $data_session = array(
                                            'iduser'=> $data->iduser,
                                            'username'=>$data->username,
                                            'role'=>'1'
                                            );
                        $this->session->set_userdata($data_session);
                        redirect(base_url().'c_admin');
                    }else{
                        redirect(base_url().'c_login?alert=gagal');
                    }
                // kondisi ke-2 apabila login sebagai petugas
                }
        }else{

            $this->load->view('v_login');
        }
    }
}
    