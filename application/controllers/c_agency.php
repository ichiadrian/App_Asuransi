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

        // ============================ DATA DASHBOARD
        $username = $this->session->userdata('username');
        $query = "SELECT 
                    COUNT(IF(status = 1, 1, NULL)) AS Pending,
                    COUNT(IF(status = 2, 1, NULL)) AS Approved,
                    COUNT(IF(status = 3, 1, NULL)) AS Rejected
                FROM pengajuan_baru WHERE penginput = '".$username."'";
        $data['pengajuan_baru'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("pengajuan_baru", "perpanjangan_polis", $query);
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("perpanjangan_polis", "klaim_polis", $query);
        $data['klaim'] = $this->m_data->raw_query($query)->result()[0];
        // ============================ DATA DASHBOARD

        $this->load->view('template/v_header');
        $this->load->view('template/agency/v_agency_dashboard', $data);
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
        $this->load->view('template/v_change_password');
        $this->load->view('template/v_footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }
    // ======================================== END OF VIEW ======================================== \\


    // ============================== ACTION ============================== \\

    // -------------------------------- PENGAJUAN BARU
    function aksi_tambah_pengajuan(){

        $nama_table = "pengajuan_baru";
        $maxid = $this->max_id($nama_table)+1;

        $pemegang_polis = $this->input->post('pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $pemegang_polis));

        $form_permohonan = $this->aksi_upload('form_permohonan', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $identitas = $this->aksi_upload('identitas', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $bukti_transfer = $this->aksi_upload('bukti_transfer', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $buku_tabungan = $this->aksi_upload('buku_tabungan', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'pemegang_polis'=>$pemegang_polis,
            'form_permohonan'=>$form_permohonan,
            'identitas'=>$identitas,
            'bukti_transfer'=>$bukti_transfer,
            'buku_tabungan'=>$buku_tabungan,
            'status'=>1,
            'keterangan'=>'',
            'tgl_input'=>date('Y-m-d H:i:s'),
            'tgl_perubahan_status'=>date('Y-m-d H:i:s'),
            'penginput'=>$this->session->userdata('username'),
        );

        // tambahin alert yan gagal atau suksesnya
        $this->m_data->insert_data($data,'pengajuan_baru');
        $success = $this->m_data->db->affected_rows() > 0 ? true : false;

        if($success == 1)
        {
            // alert kalo success
            redirect(site_url().'c_agency/pengajuan_baru');
        }
        else
        {
            // alert kalo fail
            redirect(site_url().'c_agency/pengajuan_baru');
        }
    }

    
    // -------------------------------- PERPANJANGAN
    function aksi_tambah_perpanjangan(){

        $nama_table = "perpanjangan_polis";
        $maxid = $this->max_id($nama_table)+1;

        $pemegang_polis = $this->input->post('pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $pemegang_polis));
        
        $perpanjangan_polis = $this->aksi_upload('perpanjangan_polis', $maxid.'_perpanjangan_'.$nama_folder, $maxid.'_'.$nama_folder);
        $identitas = $this->aksi_upload('identitas', $maxid.'_perpanjangan_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'pemegang_polis'=>$pemegang_polis,
            'perpanjangan_polis'=>$perpanjangan_polis,
            'identitas'=>$identitas,
            'status'=>1,
            'keterangan'=>'',
            'tgl_input'=>date('Y-m-d H:i:s'),
            'tgl_perubahan_status'=>date('Y-m-d H:i:s'),
            'penginput'=>$this->session->userdata('username'),
        );

        // tambahin alert yan gagal atau suksesnya
        $this->m_data->insert_data($data,'perpanjangan_polis');
        $success = $this->m_data->db->affected_rows() > 0 ? true : false;

        if($success == 1)
        {
            // alert kalo success
            redirect(site_url().'c_agency/pengajuan_perpanjangan');
        }
        else
        {
            // alert kalo fail
            redirect(site_url().'c_agency/pengajuan_perpanjangan');
        }
        

    }


    // -------------------------------- PENGAJUAN KLAIM
    function aksi_tambah_klaim(){

        $nama_table = "klaim_polis";
        $maxid = $this->max_id($nama_table)+1;

        $pemegang_polis = $this->input->post('pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $pemegang_polis));

        $pengajuan_klaim = $this->aksi_upload('pengajuan_klaim', $maxid.'_klaim_polis_'.$nama_folder, $maxid.'_'.$nama_folder);
        $identitas = $this->aksi_upload('identitas', $maxid.'_klaim_polis_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_polis = $this->aksi_upload('form_polis', $maxid.'_klaim_polis_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'pemegang_polis'=>$pemegang_polis,
            'pengajuan_klaim'=>$pengajuan_klaim,
            'identitas'=>$identitas,
            'form_polis'=>$form_polis,
            'status'=>1,
            'keterangan'=>'',
            'tgl_input'=>date('Y-m-d H:i:s'),
            'tgl_perubahan_status'=>date('Y-m-d H:i:s'),
            'penginput'=>$this->session->userdata('username'),
        );

        // tambahin alert gagal atau suksesnysa
        $this->m_data->insert_data($data,'klaim_polis');
        $success = $this->m_data->db->affected_rows() > 0 ? true : false;

        if($success == 1)
        {
            // alert kalo success
            redirect(site_url().'c_agency/pengajuan_klaim');
        }
        else
        {
            // alert kalo fail
            redirect(site_url().'c_agency/pengajuan_klaim');
        }

    }



    // ========================= GENERAL FUNCTION
    public function aksi_upload($gambars, $url, $filename){
        $config['upload_path'] = './gambar/'.$url.'/';
        $config['max_size'] = '1024';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $filename;
    
        $this->load->library('upload', $config);

        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }
        // print_r($this->input->post());

        if ( ! $this->upload->do_upload($gambars)){
            $error = array('error' => $this->upload->display_errors());
            // print_r($error);
            return ""; // return string kosong kalo gagal upload
        }else{
            $data = array('upload_data' => $this->upload->data());
            // print_r($data);
            return $data['upload_data']['file_name']; // return nama file jika berhasil upload
        }
    }

    function max_id($table_name){
        $query = "SELECT COUNT(*) AS Maxid FROM ".$table_name;
        $maxid = $this->m_data->raw_query($query)->result()[0]->Maxid;
        return $maxid;
    }

    
}