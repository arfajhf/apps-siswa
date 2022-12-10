<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelas extends CI_Controller {

    public function __construct()
    {
        //function yang pertama dijalankan 
        parent ::__construct();
        $this->load->model('Kelas_Model');

    }
	
	public function index()
	{
		
        $data['title']='Kelas';
        $data['Kelas']=$this -> Kelas_Model-> get_data('tb_kelas')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Kelas',$data);
       $this->load->view('template/footer',$data);
    }
    public function tambah(){
        $data['title']='Tambah Kelas';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Tambah_Kelas',$data);
       $this->load->view('template/footer',$data);
    }

    public function _rules(){
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required',array(
            'required' => '%s Harus di isi'
        ));
        $this->form_validation->set_rules('kelas', 'Kelas', 'required', array(
             'required' => '%s Harus di isi'
         ));
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required', array(
            'required' => '%s Harus di isi'
        ));
    }
    public function tambah_aksi(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'kode_kelas' => $this->input->post('kode_kelas'),
                'kelas' => $this->input->post('kelas'),
                'jurusan' => $this->input->post('jurusan'),
            );
                $this->Kelas_Model->insert_data($data, 'tb_kelas');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Di tambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('kelas');
        }
    }

    public function edit($id_kelas)
    {
        $this->_rules();
    if($this->form_validation->run()==FALSE){
        $this-index();
    } else{
        $data=array(
            'id_kelas' => $id_kelas,
            'kode_kelas' => $this->input->post('kode_kelas'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $this->Kelas_Model->update_data($data, 'tb_kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Di ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('kelas');
        }
    }

    public function delete($id)
    {
        $where = array('id_kelas' => $id);

        $this->Kelas_Model->delete($where, 'tb_kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil Di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('kelas');
    }
}
