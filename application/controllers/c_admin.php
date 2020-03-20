<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_admin extends CI_Controller {

    function __construct(){
            parent::__construct();
            // cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
                if($this->session->userdata('role')!="1"){
                redirect(base_url().'c_login?alert=belum_login');
                }
    }

    // ======================================== VIEW ======================================== \\

    //untuk menampilkan ke halaman dashboard
    public function index(){

        $query = "SELECT 
                    COUNT(IF(role = 1, 1, NULL)) AS Total_Admin,
                    COUNT(IF(role = 2, 1, NULL)) AS Total_Helpdesk,
                    COUNT(IF(role = 3, 1, NULL)) AS Total_Agency
                FROM users;";
        $data['total_user'] = $this->m_data->raw_query($query)->result()[0];


        $this->load->view('template/v_header');
        $this->load->view('template/admin/v_admin_dashboard', $data);
        $this->load->view('template/v_footer');
    }
    //form ubah password
    public function change_password(){
        $this->load->view('template/v_header');
        $this->load->view('template/v_change_password');
        $this->load->view('template/v_footer');
    }

    //untuk menampilkan ke halaman user 
    function daftar_user(){

        $query = "SELECT iduser, username, rolename FROM users INNER JOIN user_role ON users.role = user_role.idrole";
        $data['users'] = $this->m_data->raw_query($query)->result();

        $this->load->view('template/v_header');
        $this->load->view('template/admin/v_daftar_user', $data);
        $this->load->view('template/v_footer');
    }

    // untuk tambah data produk
    function tambah_user(){

        $query = "SELECT * FROM user_role";
        $data['roles'] = $this->m_data->raw_query($query)->result();
        
        $this->load->view('template/v_header');
        $this->load->view('template/admin/v_tambah_user', $data);
        $this->load->view('template/v_footer'); 
    }

    // untuk view data produk
    function edit_user($id){

        $where = array('iduser'=> $id);
        $data['data_user'] = $this->m_data->edit_data($where,'users')->result()[0];

        $query = "SELECT * FROM user_role";
        $data['roles'] = $this->m_data->raw_query($query)->result();

        $this->load->view('template/v_header');
        $this->load->view('template/admin/v_edit_user',$data);
        $this->load->view('template/v_footer'); 
    }

    //untuk menampilkan ke halaman produk 
    function produk_baru(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_produk_baru');
        $this->load->view('admin/v_footer');
    }

    // menampilkan form ganti password user
    function ganti_password(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_ganti_password');
        $this->load->view('admin/v_footer');
    }

    //Untuk edit data petugas user
    function petugas_edit($id){
        $where = array('id'=> $id);
        $data['data_petugas'] = $this->m_data->edit_data($where,'petugas')->result();

        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_edit',$data);
        $this->load->view('admin/v_footer'); 
    }

    // untuk testing
    function testimage(){
        $this->load->view('admin/v_test_image');
    }

    // ======================================== END OF VIEW ======================================== \\


    // ===================================================== AKSI ===================================================== \\
    //fungsi untuk membuat user admin logout
    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }

    // upload image
    public function aksi_upload($gambars){
        $config['upload_path'] = './gambar/produk_catalog/';
        $config['allowed_types'] = 'gif|jpg|png';
    
        $this->load->library('upload', $config);
        print_r($this->input->post());

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

    // ----------------------------- CRUD Produk
    // Tambah Produk (INSERT)
    function produk_tambah_aksi(){
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $panjang = $this->input->post('panjang');
        $lebar = $this->input->post('lebar');
        $tebal = $this->input->post('tebal');
        $diameter = $this->input->post('diameter');
        $berat = $this->input->post('berat');
        $tonase = $this->input->post('tonase');
        $kadar = $this->input->post('kadar');
       
        // upload gambar
        $gambar1 = $this->aksi_upload('gambar1');
        $gambar2 = $this->aksi_upload('gambar2');

        $data = array(
            'nama_barang'=>$nama_barang,
            'deskripsi'=>$deskripsi,
            'panjang'=>$panjang,
            'lebar'=>$lebar,
            'tebal'=>$tebal,
            'diameter'=>$diameter,
            'berat'=>$berat,
            'tonase'=>$tonase,
            'kadar'=>$kadar,
            'gambar1'=>$gambar1,
            'gambar2'=>$gambar2,
        );

        $this->m_data->insert_data($data,'catalog_list');
        redirect(site_url().'c_admin/produk');
    }

    // Update data produk
    function produk_update(){
        $id = $this->input->post('id');
        $nama_barang = $this->input->post('nama_barang');
        $deskripsi = $this->input->post('deskripsi');
        $panjang = $this->input->post('panjang');
        $lebar = $this->input->post('lebar');
        $tebal = $this->input->post('tebal');
        $diameter = $this->input->post('diameter');
        $berat = $this->input->post('berat');
        $tonase = $this->input->post('tonase');
        $kadar = $this->input->post('kadar');

        // cek data 
        $where = array('id'=>$id);
       
        // upload gambar jika ada gambar baru ============= GAMBAR 1
        if ($_FILES['gambar1']['tmp_name'] == "" ) $gambar1 = $this->input->post('gambarlama1');
        else {
            $gambar1 = $this->aksi_upload('gambar1'); // return nama file
            unlink("gambar/produk_catalog/".$this->input->post('gambarlama1')); //delete file

        }

        // upload gambar jika ada gambar baru ============= GAMBAR 2
        if ($_FILES['gambar2']['tmp_name'] == "" ) $gambar2 = $this->input->post('gambarlama2');
        else {
            $gambar2 = $this->aksi_upload('gambar2'); // return nama file
            unlink("gambar/produk_catalog/".$this->input->post('gambarlama2')); //delete file
        }
        

        $data = array(
            'nama_barang'=>$nama_barang,
            'deskripsi'=>$deskripsi,
            'panjang'=>$panjang,
            'lebar'=>$lebar,
            'tebal'=>$tebal,
            'diameter'=>$diameter,
            'berat'=>$berat,
            'tonase'=>$tonase,
            'kadar'=>$kadar,
            'gambar1'=>$gambar1,
            'gambar2'=>$gambar2,
        );

        $result = $this->m_data->update_data($where,$data,'catalog_list');
        // print_r($result);
        // echo "<br>";
        // print_r($this->input->post());
        redirect(site_url().'c_admin/produk');
    }

    // Hapus Produk
    function produk_hapus($id){
        $where = array('id'=>$id);
        $data['data_catalog'] = $this->m_data->edit_data($where,'catalog_list')->result();
        $data = $data['data_catalog'][0];

        // untuk hapus gambar
        if ($data->gambar1 != null) unlink("gambar/produk_catalog/".$data->gambar1); //delete file kalo ada
        if ($data->gambar2 != null) unlink("gambar/produk_catalog/".$data->gambar2); //delete file kalo ada

            // menghapus data petugas dari database sesuai id
        $this->m_data->delete_data($where,'catalog_list');

            // mengalihkan halaman ke halaman data petugas
        redirect(site_url().'c_admin/produk');
    }

    // ----------------------------- CRUD Petugas
    function petugas(){
        //mengambil data dari database
        $data['data_petugas'] = $this->m_data->get_data('petugas')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas',$data);
        $this->load->view('admin/v_footer'); 
    }
        //menambahkan data ke petugas
    function petugas_tambah(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_tambah');
        $this->load->view('admin/v_footer'); 
    }
        //meambahkan user petugas
    function petugas_tambah_aksi(){
        $nama     = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
                    'nama'=>$nama,
                    'username'=>$username,
                    'password'=>md5($password),
                    );


            //insert ke dalam tabel petugas
        $this->m_data->insert_data($data,'petugas');
        redirect(site_url().'c_admin/petugas');
    }

        //Update data petugas
    function petugas_update(){
        $id       = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array('id'=>$id);

            //cek apakah form password di isi atau tidak
        if($password ==""){
            $data = array(
                        'nama'=>$nama,
                        'username'=>$username
                        );
            //update data ke database

            $this->m_data->update_data($where,$data,'petugas');

        }else{
            $data = array(
                        'nama'=>$nama,
                        'username'=>$username,
                        'password'=>md5($password)                       
                        );
            //update data ke database

            $this->m_data->update_data($where,$data,'petugas');
        }
        redirect(site_url().'c_admin/petugas');
    }

        //function hapus data
    function petugas_hapus($id){
        $where = array('id'=>$id);

            // menghapus data petugas dari database sesuai id
        $this->m_data->delete_data($where,'petugas');

            // mengalihkan halaman ke halaman data petugas
        redirect(site_url().'c_admin/petugas');
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
            redirect(site_url().'c_admin/change_password?alert=sukses');
        }else{
            $this->load->view('template/v_header');
            $this->load->view('template/v_change_password');
            $this->load->view('template/v_footer');    
        }
    }
   

    // ===================================================== END OF AKSI ===================================================== \\
    
}