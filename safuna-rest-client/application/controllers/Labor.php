<?php

class Labor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Labor_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Labor';
        $data['labor'] = $this->Labor_model->getAllLabor();
        if( $this->input->post('keyword') ) {
            $data['labor'] = $this->Labor_model->cariDataLabor();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('labor/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Labor';

        $this->form_validation->set_rules('nama_ruangan', 'Nama_Ruangan', 'required');
        $this->form_validation->set_rules('status_ruangan', 'Status_Ruangan', 'required|numeric');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung_Jawab', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('labor/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Labor_model->tambahDataLabor();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('labor');
        }
    }

    public function hapus($id)
    {
        $this->Labor_model->hapusDataLabor($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('labor');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Labor';
        $data['labor'] = $this->Labor_model->getLaborById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('labor/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Labor';
        $data['labor'] = $this->Labor_model->getLaborById($id);
        $data['nama_ruangan'] = ['Lab Informatika', 'Lab Sistem Informasi', 'Lab Bahasa', 'Lab Biologi', 'Lab Pintar'];

        $this->form_validation->set_rules('status_ruangan', 'Status_Ruangan', 'required|numeric');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung_Jawab', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('labor/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Labor_model->ubahDataLabor();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('labor');
        }
    }

}
