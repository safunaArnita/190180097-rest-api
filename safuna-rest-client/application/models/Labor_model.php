<?php 
use GuzzleHttp\Client;

class Labor_model extends CI_model 
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/safuna-rest-server/api/',
            'auth' => ['safuna', 'arnita2000']
        ]);
    }

    public function getAllLabor()
    {
        $response = $this->_client->request('GET', 'Labor', [
            'query' => [
                'X-API-KEY' => 'rahasia',
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'];
    }

    public function getLaborById($id)
    {
        $response = $this->_client->request('GET', 'Labor', [
            'query' => [
                'X-API-KEY' => 'rahasia',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['message'][0];
    }

    public function tambahDataLabor()
    {
        $data = [
            "nama_ruangan" => $this->input->post('nama_ruangan', true),
            "status_ruangan" => $this->input->post('status_ruangan', true),
            "penanggung_jawab" => $this->input->post('penanggung_jawab', true),
            'X-API-KEY' => 'rahasia'
        ];

        $response = $this->_client->request('POST', 'labor', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataLabor($id)
    {
        $response = $this->_client->request('DELETE', 'labor', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => 'rahasia'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function ubahDataLabor()
    {
        $data = [
            "nama_ruangan" => $this->input->post('nama_ruangan', true),
            "status_ruangan" => $this->input->post('status_ruangan', true),
            "penanggung_jawab" => $this->input->post('penanggung_jawab', true),
            "id" => $this->input->post('id', true),
            'X-API-KEY' => 'rahasia'
        ];

       $response = $this->_client->request('PUT', 'labor', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataLabor()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama_ruangan', $keyword);
        $this->db->or_like('status_ruangan', $keyword);
        $this->db->or_like('penanggung_jawab', $keyword);
        return $this->db->get('labor')->result_array();
    }
}