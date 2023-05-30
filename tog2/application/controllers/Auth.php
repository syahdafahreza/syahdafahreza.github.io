<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct() //method untuk menerapkan seluruh fungsi didalamnya ke dalam seluruh method di controller
    {
        parent::__construct(); // syarat method
        $this->load->library('form_validation'); // untuk memvalidasi inputan
    }

    public function index()
    {
        if ($this->session->userdata('email')) { //penge checkan apabila sdh login tidak bisa ke halaman login kecuali logout dahulu
            redirect('user');
        }

        $this->form_validation->set_rules("email", "Email", "required|valid_email|trim");
        $this->form_validation->set_rules("password", "Password", "required|trim");
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login | Token of Gratitude';
            $this->load->view('templates/auth/auth_header', $data);
            $this->load->view('templates/auth/auth_login');
            $this->load->view('templates/auth/auth_footer');
        } else {
            //validation success menggunakan method private
            $this->_login();
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars(md5($this->input->post('password')));

        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($user) { // jika usernya ada

            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['userrole']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('welcome');
                } else {
                    redirect('welcome');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" style="margin-top: 1rem;" role="alert">Wrong password: <br>'.$password.' And<br>'.$user['password'].'</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" style="margin-top: 1rem;" role="alert">Email is not registered</div>');
            redirect('auth');
        }
    }
}