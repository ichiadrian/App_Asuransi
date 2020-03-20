<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_helpdesk extends CI_Controller {

    function __construct(){
            parent::__construct();
            // cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
                if($this->session->userdata('role')!="2"){
                redirect(base_url().'c_login?alert=belum_login');
                }
    }

    // ======================================== VIEW ======================================== \\

    //untuk menampilkan ke halaman dashboard
    public function index(){

        // ============================ DATA DASHBOARD
        $query = "SELECT 
                    COUNT(IF(status = 1, 1, NULL)) AS Pending,
                    COUNT(IF(status = 2, 1, NULL)) AS Approved,
                    COUNT(IF(status = 3, 1, NULL)) AS Rejected
                FROM pengajuan_baru";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("pengajuan_baru", "perpanjangan_polis", $query);
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("perpanjangan_polis", "klaim_polis", $query);
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];
        // ============================ DATA DASHBOARD

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_helpdesk_dashboard', $data);
        $this->load->view('template/v_footer');
    }

    public function change_password(){
        $this->load->view('template/v_header');
        $this->load->view('template/v_change_password');
        $this->load->view('template/v_footer');
    }

    public function daftar_pengajuan_baru(){

        $status = $this->input->post('status');
        if($status == "") $status = 1;

        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = $status";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result();
        $data['param'] = array(
            'status' => $status
        );

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_daftar_pengajuan_baru', $data);
        $this->load->view('template/v_footer');
        
    }

    public function pengajuan_baru($id){

        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput, form_permohonan, identitas, bukti_transfer, buku_tabungan FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idasuransi = $id";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_pengajuan_baru', $data);
        $this->load->view('template/v_footer');

    }
    
    public function daftar_perpanjangan_polis(){

        $status = $this->input->post('status');
        if($status == "") $status = 1;

        $query = "SELECT idperpanjang, pemegang_polis, nama_status, tgl_input, penginput FROM perpanjangan_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = $status";
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result();
        $data['param'] = array(
            'status' => $status
        );
        
        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_daftar_perpanjangan_polis', $data);
        $this->load->view('template/v_footer');
        
    }
    
    public function perpanjangan_polis($id){

        $query = "SELECT idperpanjang, pemegang_polis, nama_status, tgl_input, penginput, perpanjangan_polis, identitas FROM perpanjangan_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idperpanjang = $id";
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_perpanjangan_polis', $data);
        $this->load->view('template/v_footer');

    }

    public function daftar_klaim_polis(){

        $status = $this->input->post('status');
        if($status == "") $status = 1;

        $query = "SELECT idklaim, pemegang_polis, nama_status, tgl_input, penginput FROM klaim_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = $status";
        $data['klaim'] = $this->m_data->raw_query($query)->result();
        $data['param'] = array(
            'status' => $status
        );
        
        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_daftar_klaim_polis', $data);
        $this->load->view('template/v_footer');
        
    }
    
    public function klaim_polis($id){

        $query = "SELECT idklaim, pemegang_polis, nama_status, tgl_input, penginput, pengajuan_klaim, identitas, form_polis FROM klaim_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idklaim = $id";
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_klaim_polis', $data);
        $this->load->view('template/v_footer');

    }



    // ======================================================== AKSI

    function aksi_ubah_status(){

        $id = $this->input->post('id');
        $idname = $this->input->post('idname');
        $status = $this->input->post('status');
        $keterangan = $this->input->post('keterangan');
        $table_flag = $this->input->post('table_flag');
        $redirect = $this->input->post('redirect');

        $where = array(
                        $idname=>$id
                        );
        $data = array(
                        'status'=>$status,
                        'keterangan'=>$keterangan,
                        );
                        
        $this->m_data->update_data($where,$data,$table_flag);
        redirect(site_url().'c_helpdesk/'.$redirect);
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }
    
}