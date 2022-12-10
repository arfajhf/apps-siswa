<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        //function yang pertama dijalankan 
        parent ::__construct();
        $this->load->model('Siswa_Model');

    }
	
	public function index()
	{
		
        $data['title']='Siswa';
        $data['Siswa']=$this -> Siswa_Model-> get_data('tb_siswa')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Siswa',$data);
       $this->load->view('template/footer',$data);
    }
    
    public function tambah(){
        $data['title']='Tambah Siswa';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar',$data);
        $this->load->view('Tambah_Siswa',$data);
       $this->load->view('template/footer',$data);
    }
    public function _rules(){
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required',array(
            'required' => '%s Harus di isi'
        )); $this->form_validation->set_rules('kelas_siswa', 'kelas Siswa', 'required',array(
            'required' => '%s Harus di isi'
        ));
        $this->form_validation->set_rules('alamat_siswa', 'alamat Siswa', 'required', array(
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
                'nama_siswa' => $this->input->post('nama_siswa'),
                'kelas_siswa' => $this->input->post('kelas_siswa'),
                'alamat_siswa' => $this->input->post('alamat_siswa'),
                'no_telepon' => $this->input->post('no_telepon'),
            );
                $this->Siswa_Model->insert_data($data, 'tb_siswa');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Di tambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('siswa');
        }
    }
    public function edit($id_siswa)
    {
        $this->_rules();
    if($this->form_validation->run()==FALSE){
        $this-index();
    } else{
        $data=array(
            'id_siswa' => $id_siswa,
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas_siswa' => $this->input->post('kelas_siswa'),
            'alamat_siswa' => $this->input->post('alamat_siswa'),
            'no_telepon' => $this->input->post('no_telepon'),
        );
        $this->Siswa_Model->update_data($data, 'tb_siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil Di ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa');
        }
    }

    public function delete($id)
    {
        $where = array('id_siswa' => $id);

        $this->Siswa_Model->delete($where, 'tb_siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Berhasil Di hapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('siswa');
    }
}
