<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct() //method untuk menerapkan seluruh fungsi didalamnya ke dalam seluruh method di controller
	{
		parent::__construct(); // syarat method

	}
	public function index()
	{
		if ($this->session->userdata('username')) { //penge checkan apabila sdh login tidak bisa ke halaman login kecuali logout dahulu
			echo "is login!";
			$user = $this->db->get_where('users', ['username'])->row_array();
			$data = [
				'username' => $user['username'],
				'userrole' => $user['userrole']
			];
			// $this->session->set_userdata($data);
			if ($user['userrole'] == 1) {
				$this->load->view('templates/sidebaradmin');
				echo $user['username'];
				echo $user['userrole'];
			} else if ($user['userrole'] == 3) {
				$this->load->view('templates/sidebaruser');
			} else {

			}
		} else {
			echo "not login!";
			$this->load->view('templates/sidebar');
			// $this->load->view('dashboard');
		}

		// $this->load->view('templates/sidebar');
		// $this->load->view('dashboard');
	}
}