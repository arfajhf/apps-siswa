<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct()
    {
        //function yang pertama dijalankan 
        parent ::__construct();
        $this->load->model('Guru_Model');

    }
	
	public function index()
	{
		
        $data['title']='Guru';
        $data['Guru']=$this -> Guru_Model-> get_data('tb_guru')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Guru',$data);
       $this->load->view('template/footer',$data);
    }
    
    public function tambah(){
        $data['title']='Tambah Guru';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Tambah_Guru',$data);
       $this->load->view('template/footer',$data);
    }

    public function _rules(){
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required',array(
            'required' => '%s Harus di isi'
        ));
        $this->form_validation->set_rules('alamat', 'alamat', 'required', array(
             'required' => '%s Harus di isi'
         ));
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required', array(
            'required' => '%s Harus di isi'
        ));
    }
    public function tambah_aksi(){
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama_guru' => $this->input->post('nama_guru'),
                'alamat' => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
            );
                $this->Guru_Model->insert_data($data, 'tb_guru');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Di tambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru');
        }
    }

    public function edit($id_guru)
    {
        $this->_rules();
    if($this->form_validation->run()==FALSE){
        $this-index();
    } else{
        $data=array(
            'id_guru' => $id_guru,
            'nama_guru' => $this->input->post('nama_guru'),
            'alamat_guru' => $this->input->post('alamat_guru'),
            'no_telepon' => $this->input->post('no_telepon'),
        );
        $this->Guru_Model->update_data($data, 'tb_guru');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Di ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('guru');
        }
    }

    public function delete($id)
    {
        $where = array('id_guru' => $id);

        $this->Guru_Model->delete($where, 'tb_guru');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil Di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('guru');
    }
}

