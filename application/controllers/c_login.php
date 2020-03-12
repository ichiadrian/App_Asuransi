<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class C_login extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->model('m_data');
        }
        //Menampilkan Function Index
        public function index(){
            $this->load->view('v_login');
        }

        //Validasi login
        function aksi_login(){
            // $this->output->enable_profiler(TRUE);

            $username = $this->input->POST('username',TRUE); 
            $password = $this->input->POST('password',TRUE);
            //required adalah wajib di isi
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() != false){
                $where = array(
                            'username'=>$username,
                            'password'=>md5($password),
                            );

                //kondisi ke-1 apabila login sebagai admin
                
                $cek_login = $this->m_data->cek_login($where,'users')->num_rows();
                $data = $this->m_data->cek_login($where,'users')->row();
                    
                if($cek_login > 0){

                    $data_session = array(
                        'iduser'=> $data->iduser,
                        'username'=>$data->username,
                        'role'=>$data->role
                    );

                    $this->session->set_userdata($data_session);
                    
                    switch ($data->role) {
                        case 1:
                            redirect(base_url().'c_admin');
                            break;
                        case 2:
                            redirect(base_url().'c_helpdesk');
                            break;
                        case 3:
                            redirect(base_url().'c_agency');
                            break;
                        default:
                            # code...
                            break;
                    }

                }else{
                    redirect(base_url().'c_login?alert=gagal');
                }
                
            }else{

            $this->load->view('v_login');
            }
        }
    }
    