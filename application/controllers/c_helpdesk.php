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
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        if($status == "") $status = 1;
        if($bulan == "") $bulan = date("n");
        if($tahun == "") $tahun = date('Y');

        // JANGAN DIBACA WKWKKW
        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput, tgl_perubahan_status FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = $status AND month(tgl_perubahan_status) = $bulan AND YEAR(tgl_perubahan_status) = $tahun";
                    //SELECT * FROM `pengajuan_baru` WHERE month(tgl_input) = 3 AND YEAR(tgl_input) = 2020
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result();
        $data['sql'] = $query;

        $data['param'] = array(
            'status' => $status
        );

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_daftar_pengajuan_baru', $data);
        $this->load->view('template/v_footer');
        
    }

    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++===+++ PENGAJUAN BARU ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    //daftar pending
    public function pengajuan_baru($id){

        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput, form_permohonan, identitas, bukti_transfer, buku_tabungan, keterangan, status FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idasuransi = $id";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];

        $data['pengajuan_baru']->pemegang_polis = strtolower(str_replace(" ", "_", $data['pengajuan_baru']->pemegang_polis));

     
        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_pengajuan_baru', $data);
        $this->load->view('template/v_footer');

    }
    //daftar approved
    public function pengajuan_baru_appv($id){

        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput, form_permohonan, identitas, bukti_transfer, buku_tabungan, keterangan, status FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = 2 AND idasuransi = $id";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];
        // echo '<pre>';
        // var_dump($data);
        // echo '<pre>';
        // die();

        $data['pengajuan_baru']->pemegang_polis = strtolower(str_replace(" ", "_", $data['pengajuan_baru']->pemegang_polis));

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_pengajuan_baru_view', $data);
        $this->load->view('template/v_footer');

    }
    //daftar rejected
    public function pengajuan_baru_rjct($id){

        $query = "SELECT idasuransi, pemegang_polis, nama_status, tgl_input, penginput, form_permohonan, identitas, bukti_transfer, buku_tabungan, keterangan, status FROM pengajuan_baru
                    INNER JOIN status_polis ON status = idstatus WHERE status = 3 AND idasuransi = $id";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];

        $data['pengajuan_baru']->pemegang_polis = strtolower(str_replace(" ", "_", $data['pengajuan_baru']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_pengajuan_baru_view', $data);
        $this->load->view('template/v_footer');

    }
    // +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++===++ END PENGAJUAN BARU ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ PERPANJANGAN BARU ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
    //pending
    public function perpanjangan_polis($id){

        $query = "SELECT idperpanjang, pemegang_polis, nama_status, tgl_input, penginput, perpanjangan_polis, identitas, keterangan, status FROM perpanjangan_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idperpanjang = $id";
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $data['perpanjangan']->pemegang_polis = strtolower(str_replace(" ", "_", $data['perpanjangan']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_perpanjangan_polis', $data);
        $this->load->view('template/v_footer');

    }

    //approve
    public function perpanjangan_polis_appv($id){

        $query = "SELECT idperpanjang, pemegang_polis, nama_status, tgl_input, penginput, perpanjangan_polis, identitas, keterangan, status FROM perpanjangan_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 2 AND idperpanjang = $id";
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $data['perpanjangan']->pemegang_polis = strtolower(str_replace(" ", "_", $data['perpanjangan']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_perpanjangan_polis_view', $data);
        $this->load->view('template/v_footer');

    }
    //rejected
    public function perpanjangan_polis_rjct($id){

        $query = "SELECT idperpanjang, pemegang_polis, nama_status, tgl_input, penginput, perpanjangan_polis, identitas, keterangan, status FROM perpanjangan_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 3 AND idperpanjang = $id";
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $data['perpanjangan']->pemegang_polis = strtolower(str_replace(" ", "_", $data['perpanjangan']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_perpanjangan_polis_view', $data);
        $this->load->view('template/v_footer');

    }
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ END PERPANJANGAN BARU ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ KLAIM POLIS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
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
    //pending
    public function klaim_polis($id){

        $query = "SELECT idklaim, pemegang_polis, nama_status, tgl_input, penginput, pengajuan_klaim, identitas, form_polis, keterangan, status FROM klaim_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 1 AND idklaim = $id";
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];

        $data['klaim']->pemegang_polis = strtolower(str_replace(" ", "_", $data['klaim']->pemegang_polis));

        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_klaim_polis', $data);
        $this->load->view('template/v_footer');

    }
    //approved
    public function klaim_polis_appv($id){

        $query = "SELECT idklaim, pemegang_polis, nama_status, tgl_input, penginput, pengajuan_klaim, identitas, form_polis, keterangan, status FROM klaim_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 2 AND idklaim = $id";
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];

        $data['klaim']->pemegang_polis = strtolower(str_replace(" ", "_", $data['klaim']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_klaim_polis_view', $data);
        $this->load->view('template/v_footer');

    }
    //rejected
    public function klaim_polis_rjct($id){

        $query = "SELECT idklaim, pemegang_polis, nama_status, tgl_input, penginput, pengajuan_klaim, identitas, form_polis, keterangan, status FROM klaim_polis
                    INNER JOIN status_polis ON status = idstatus WHERE status = 3 AND idklaim = $id";
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];

        $data['klaim']->pemegang_polis = strtolower(str_replace(" ", "_", $data['klaim']->pemegang_polis));


        $this->load->view('template/v_header');
        $this->load->view('template/helpdesk/v_klaim_polis_view', $data);
        $this->load->view('template/v_footer');

    }
    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ END KLAIM POLIS ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++



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

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Ganti Password +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

    function ganti_password_aksi(){
        $Pbaru = $this->input->post('password_baru');
        $Pulang = $this->input->post('password_ulang');
    
        $this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang','Ulangi Password', 'required');
    
        if($this->form_validation->run() != false ){
            $id = $this->session->userdata('iduser');
            $where = array(
                       'iduser'=>$id
                        );
            $data = array(
                        'password'=>md5($Pbaru)
                        );
            $this->m_data->update_data($where,$data,'users');
                redirect(site_url().'c_helpdesk/change_password?alert=sukses');
        }else{
            $this->load->view('template/v_header');
            $this->load->view('template/v_change_password');
            $this->load->view('template/v_footer');    
        }
    }
    
}