<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    public function __construct()
    {
        //function yang pertama dijalankan 
        parent ::__construct();
        $this->load->model('Jurusan_Model');

    }
	
	public function index()
	{
		
        $data['title']='Jurusan';
        $data['Jurusan']=$this -> Jurusan_Model-> get_data('tb_jurusan')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Jurusan',$data);
       $this->load->view('template/footer',$data);
    }
    
    public function tambah(){
        $data['title']='Tambah Jurusan';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Tambah_Jurusan',$data);
       $this->load->view('template/footer',$data);
    }

    public function _rules(){
        $this->form_validation->set_rules('id_jurusan', 'id jurusan', 'required',array(
            'required' => '%s Harus di isi'
        ));
        $this->form_validation->set_rules('nama', 'nama', 'required', array(
             'required' => '%s Harus di isi'
         ));
    }
    public function tambah_aksi(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_jurusan' => $this->input->post('id_jurusan'),
                'nama' => $this->input->post('nama'),
            );
                $this-> Jurusan_Model->insert_data($data, 'tb_jurusan');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Di tambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('jurusan');
        }
    }

    public function edit($id_jurusan)
    {
        $this->_rules();
    if($this->form_validation->run()==FALSE){
        $this-index();
    } else{
        $data=array(
            'id_jurusan' => $id_jurusan,
            'nama' => $this->input->post('nama'),
        );
        $this->Jurusan_Model->update_data($data, 'tb_jurusan');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Di ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('jurusan');
        }
    }

    public function delete($id)
    {
        $where = array('id_jurusan' => $id);

        $this->Jurusan_Model->delete($where, 'tb_jurusan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil Di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('jurusan');
    }
}

