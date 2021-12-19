<?php

// extends class Model
class PersonM extends CI_Model{

  // response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  // function untuk insert data ke tabel tb_laboratorium
  public function add_laboratorium($nama_ruangan,$status_ruangan,$penanggung_jawab){

    if(empty($nama_ruangan) || empty($status_ruangan) || empty($penanggung_jawab)){
      return $this->empty_response();
    }else{
      $data = array(
        "nama_ruangan"=>$nama_ruangan,
        "status_ruangan"=>$status_ruangan,
		"penanggung_jawab"=>$penanggung_jawab
      );

      $insert = $this->db->insert("tb_laboratorium", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data laboratorium ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data laboratorium gagal ditambahkan.';
        return $response;
      }
    }

  }

  // mengambil semua data person
  public function all_laboratorium(){

    $all = $this->db->get("tb_laboratorium")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;

  }

  // hapus data person
  public function delete_laboratorium($id){

    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $this->db->where($where);
      $delete = $this->db->delete("tb_laboratorium");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data laboratorium dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data laboratorium gagal dihapus.';
        return $response;
      }
    }

  }

  // update person
  public function update_laboratorium($id,$nama_ruangan,$status_ruangan,$penanggung_jawab){

    if($id == '' || empty($nama_ruangan) || empty($status_ruangan) || empty($penanggung_jawab)){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $set = array(
        "nama_ruangan"=>$nama_ruangan,
        "status_ruangan"=>$status_ruangan,
        "penanggung_jawab"=>$penanggung_jawab
      );

      $this->db->where($where);
      $update = $this->db->update("tb_laboratorium",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data laboratorium diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data laboratorium gagal diubah.';
        return $response;
      }
    }

  }

}

?>
