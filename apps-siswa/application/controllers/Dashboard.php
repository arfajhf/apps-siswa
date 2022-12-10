<!-- <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class Dashboard extends CI_Controller {

	
// 	public function index()
// 	{
// 		//membuat variabel title 
// 		$data['title']='Dashboard';
//         $this->load->view('template/header',$data);
// 		$this->load->view('template/sidebar',$data);
//         $this->load->view('dashboard');
//         $this->load->view('template/footer');
// 	}
// }


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		if(!$this->Auth_model->current_user()){
			redirect('auth/login');
		}
	$this->load->view('dashboard2')
	}

	// ... ada kode lain di sini ...
}

