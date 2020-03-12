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
        $this->load->view('template/v_change_password');
        $this->load->view('template/v_footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }
    // ======================================== END OF VIEW ======================================== \\


    // ============================== ACTION ============================== \\
    function aksi_tambah_pengajuan(){

        $maxid = $this->max_asuransi_id()+1;

        $nama_pemegang_polis = $this->input->post('nama_pemegang_polis');
        $nama_folder = strtolower(str_replace(" ", "_", $nama_pemegang_polis));

        $form_permohonan_baru = $this->aksi_upload('form_permohonan_baru', $maxid.'_'.$nama_folder, 'form_permohonan'.'_'.$nama_folder);
        $form_identitas = $this->aksi_upload('form_identitas', $maxid.'_'.$nama_folder, 'form_identitas'.'_'.$nama_folder);
        $form_bukti_transfer = $this->aksi_upload('form_bukti_transfer', $maxid.'_'.$nama_folder, 'form_bukti_transfer'.'_'.$nama_folder);
        $form_buku_tabungan = $this->aksi_upload('form_buku_tabungan', $maxid.'_'.$nama_folder, 'form_buku_tabungan'.'_'.$nama_folder);

        $data = array(
            'nama_pemegang_polis'=>$nama_pemegang_polis,
            'form_permohonan'=>$form_permohonan_baru,
            'form_identitas'=>$form_identitas,
            'form_bukti_transfer'=>$form_bukti_transfer,
            'form_buku_tabungan'=>$form_buku_tabungan,
            'status'=>1,
            'keterangan'=>'',
            'tgl_input'=>date('Y-m-d H:i:s'),
            'tgl_ganti_status'=>date('Y-m-d H:i:s'),
        );

        $this->m_data->insert_data($data,'asuransi');
        // redirect(site_url().'c_agency/pengajuan_baru');
    }



    // ========================= FUNCTION
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

    function max_asuransi_id(){
        $query = "SELECT COUNT(idasuransi) AS Maxid FROM asuransi";
        $asuransimaxid = $this->m_data->raw_query($query)->result()[0]->Maxid;
        return $asuransimaxid;
    }

    
}