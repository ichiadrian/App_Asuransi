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

    // untuk tambah data 
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
    // ===================================================== AKSI ===================================================== \\
    //Aksi Tambah Data

    function user_baru(){
        $username   = $this->input->POST('username');
        $password   = $this->input->POST('password');
        $role       = $this->input->POST('role');

        $data = array ( 
                    'username'=>$username,
                    'password'=>md5($password),
                    'role'=>$role
                    );

        $this->m_data->insert_data($data, 'users');
        redirect(base_url().'c_admin/index');
    }


    //Update perubahan data user

    function aksi_update(){
        $id         = $this->input->post('iduser');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        $role       = $this->input->post('role');

        $where = array('iduser'=>$id);

        if($password==""){
            $data = array(
                'username'=>$username,
                'role'=>$role                     
                );
            $this->m_data->update_data($where,$data,'users');

        }else{
            $data = array(
                'username'=>$username,
                'password'=>md5($password),
                'role'=>$role                     
                );
            $this->m_data->update_data($where,$data,'users');
        }
        redirect(site_url().'c_admin/daftar_user');



    }
    


    //fungsi untuk membuat user admin logout
    function logout(){
        $this->session->sess_destroy();
        redirect(site_url().'c_login?alert=logout');
    }

    //Hapus Data
    function delete_user($id){
        $where = array('iduser'=>$id);

        $this->m_data->delete_data($where,'users');
        redirect(base_url().'c_admin/daftar_user');

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