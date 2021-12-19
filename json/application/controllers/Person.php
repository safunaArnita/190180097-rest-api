<?php

require APPPATH . 'libraries/REST_Controller.php';

class Person extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PersonM');
  }

  // method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->PersonM->all_laboratorium();
    $this->response($response);
  }

  // untuk menambah person menaggunakan method post
  public function index_post(){
    $response = $this->PersonM->add_laboratorium(
        $this->post('nama_ruangan'),
        $this->post('status-ruangan'),
		$this->post('penanggung_jawab')
      );
    $this->response($response);
  }

  // update data person menggunakan method put
  public function index_put(){
    $response = $this->PersonM->update_laboratorium(
        $this->put('nama_ruangan'),
        $this->put('status-ruangan'),
        $this->put('penanggung_jawab')
      );
    $this->response($response);
  }

  // hapus data person menggunakan method delete
  public function index_delete(){
    $response = $this->PersonM->delete_laboratorium(
        $this->delete('id')
      );
    $this->response($response);
  }

}

?>
