   <?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Labor extends REST_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Labor_model', 'labor');
		
		$this->methods['index_get']['limit'] = 100;
		$this->methods['index_post']['limit'] = 100;
		$this->methods['index_put']['limit'] = 100;
		$this->methods['index_delete']['limit'] = 100;
	}
	
	public function index_get()
	{
		$id = $this->get('id');
		if ($id === null) {
			$labor = $this->labor->getLabor();
		}else {
			$labor = $this->labor->getLabor($id);
		}
		
		if($labor) {
			 $this->response([
                    'status' => true,
                    'message' => $labor
                ], REST_Controller::HTTP_OK);
		}else {
			$this->response([
                    'status' => false,
                    'message' => 'id tidak ada'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	
	}
	
	public function index_delete()
	{
		$id = $this->delete('id');
		
		if($id === null) {
			$this->response([
                    'status' => false,
                    'message' => 'provide an id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if($this->labor->deleteLabor($id) > 0 ) {
				// ok
				 $this->response([
                    'status' => true,
					'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_NO_CONTENT);
			} else {
				// id not found
				$this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}
	
	
	public function index_post ()
	{
		$data = [
			'nama_ruangan' => $this->post('nama_ruangan'),
			'status_ruangan' => $this->post('status_ruangan'),
			'penanggung_jawab' => $this->post('penanggung_jawab')
		];
		
		if($this->labor->createLabor($data) > 0 ) {
			$this->response([
                'status' => true,
                'message' => 'data laboratorium di tambah'
            ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'data tidak berhasil ditambah!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
	
	
	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama_ruangan' => $this->put('nama_ruangan'),
			'status_ruangan' => $this->put('status_ruangan'),
			'penanggung_jawab' => $this->put('penanggung_jawab')
		];
		
		if($this->labor->updateLabor($data, $id) > 0 ) {
			$this->response([
                'status' => true,
                'message' => 'data laboratorium berhasil diubah'
            ], REST_Controller::HTTP_NO_CONTENT);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'data tidak berhasil diubah!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}
}