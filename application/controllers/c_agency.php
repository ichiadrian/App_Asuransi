<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_agency extends CI_Controller {

    function __construct(){
            parent::__construct();
            // cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
                if($this->session->userdata('role')!="3"){
                redirect(base_url().'c_login?alert=belum_login');
                }
    }

    // ======================================== VIEW ======================================== \\

    //untuk menampilkan ke halaman dashboard
    public function index(){
        $this->load->view('template/v_header');
        $this->load->view('template/agency/v_agency_dashboard');
        $this->load->view('template/v_footer');
    }

    public function pengajuan_baru(){
        $this->load->view('template/v_header');
        $this->load->view('template/agency/v_pengajuan_baru');
        $this->load->view('template/v_footer');
    }

    public function pengajuan_perpanjangan(){
        $this->load->view('template/v_header');
        $this->load->view('template/agency/v_pengajuan_perpanjangan');
        $this->load->view('template/v_footer');
    }

    public function pengajuan_klaim(){
        $this->load->view('template/v_header');
        $this->load->view('template/agency/v_pengajuan_klaim');
        $this->load->view('template/v_footer');
    }

    public function change_password(){
        $this->load->view('template/v_header');
        $this->load->view();
        $this->load->view('template/v_footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }

    
}