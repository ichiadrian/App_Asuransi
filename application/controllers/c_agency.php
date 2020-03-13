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
                FROM asuransi WHERE penginput = '".$username."'";
        $data['asuransi'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("asuransi", "perpanjangan_polis", $query);
        $data['perpanjangan'] = $this->m_data->raw_query($query)->result()[0];

        $query = str_replace("perpanjangan_polis", "pengajuan_klaim", $query);
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

        $nama_table = "asuransi";
        $maxid = $this->max_id($nama_table)+1;

        $nama_pemegang_polis = $this->input->post('nama_pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $nama_pemegang_polis));

        $form_permohonan_baru = $this->aksi_upload('form_permohonan_baru', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_identitas = $this->aksi_upload('form_identitas', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_bukti_transfer = $this->aksi_upload('form_bukti_transfer', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_buku_tabungan = $this->aksi_upload('form_buku_tabungan', $maxid.'_pengajuan_baru_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'nama_pemegang_polis'=>$nama_pemegang_polis,
            'form_permohonan'=>$form_permohonan_baru,
            'form_identitas'=>$form_identitas,
            'form_bukti_transfer'=>$form_bukti_transfer,
            'form_buku_tabungan'=>$form_buku_tabungan,
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

        $nama_pemegang_polis = $this->input->post('nama_pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $nama_pemegang_polis));
        
        $form_perpanjangan_polis = $this->aksi_upload('form_perpanjangan_polis', $maxid.'_perpanjangan_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_identitas = $this->aksi_upload('form_identitas', $maxid.'_perpanjangan_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'nama_pemegang_polis'=>$nama_pemegang_polis,
            'form_perpanjangan_polis'=>$form_perpanjangan_polis,
            'form_identitas'=>$form_identitas,
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

        $nama_table = "pengajuan_klaim";
        $maxid = $this->max_id($nama_table)+1;

        $nama_pemegang_polis = $this->input->post('nama_pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $nama_pemegang_polis));

        $form_pengajuan_klaim = $this->aksi_upload('form_pengajuan_klaim', $maxid.'_klaim_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_identitas = $this->aksi_upload('form_identitas', $maxid.'_klaim_'.$nama_folder, $maxid.'_'.$nama_folder);
        $form_polis = $this->aksi_upload('form_polis', $maxid.'_klaim_'.$nama_folder, $maxid.'_'.$nama_folder);

        $data = array(
            'nama_pemegang_polis'=>$nama_pemegang_polis,
            'form_pengajuan_klaim'=>$form_pengajuan_klaim,
            'form_identitas'=>$form_identitas,
            'form_polis'=>$form_polis,
            'status'=>1,
            'keterangan'=>'',
            'tgl_input'=>date('Y-m-d H:i:s'),
            'tgl_perubahan_status'=>date('Y-m-d H:i:s'),
            'penginput'=>$this->session->userdata('username'),
        );

        // tambahin alert gagal atau suksesnysa
        $this->m_data->insert_data($data,'perpanjangan_polis');
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