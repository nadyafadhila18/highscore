<?php

namespace App\Controllers;
use App\Models\Users_model;  //mengambil Model pada folder Model dengan menggunakan namespace
use App\Models\Admin_model;  

class Login extends BaseController {
	protected $users_model;
	protected $admin_model;

	public function __construct() {
		parent::__construct();		
		$this->load->model('m_highscore');
	}

    //tampilin halaman login
	public function index() {
		if ($this->session->userdata('login')) {
			if ($this->session->userdata('level') == 'admin') {
				redirect('highscore/dashboard');
			} else {
				if ($this->session->userdata('isVote')) {
					redirect('highscore/terimakasih');
				} else {
					redirect('highscore/dashboard');
				}
			}
		} else {
			$this->load->view('login');
		}
	}

    //buat ngeproses login
    public function signin() {
        //tutorial, kalo udah selesai mungkin bisa dihapus, atau dicut dimana gitu
	    $whereuser = array(
            'nim' => $this->input->post('username')
		);
		$whereadmin = array(
            'username' => $this->input->post('username')
		);
		$userpass = $this->input->post('password');
		if($this->m_highscore->can_login_admin($whereadmin, $userpass)){
			redirect('login/enter_admin');
		}
		else if($this->m_highscore->can_login_user($whereuser, $userpass)){
			if ($this->session->userdata('isVote')) {
				redirect('highscore/terimakasih');
			} else {
				redirect('highscore/dashboard');
			}
		}
		else{
			$this->session->set_flashdata('error','Silakan cek username atau password anda');
			redirect('login');
		}
	}
	public function enter_user() {
		if ($this->session->userdata('login')) {
			redirect('highscore/dashboard');
		} else {
			redirect('login');
		}
	}
	public function enter_admin() {
		if ($this->session->userdata('login')) {
			redirect('highscore/dashboard');
		} else {
			redirect('login');
		}
	}
        //ambil kiriman data email itu buat email user atau username admin
        //ambil juga passwordnya. Jadi nanti action diarahin ke sini

        //manfaatin function can_login dari user_model sama admin_model
        //kalo hasilnya true buat function user, redirect ke halaman home buat user (index buat tamu)
        //kalo hasilnya true buat function user, redirect ke halaman admin yang nanti dibuat dila

        //untuk nanti buat ngakses halaman admin, nanti buat controller admin lagi ya. Buat user pake highscore aja controllernya
    }

    
}
