<?php
// extends class Model
class m_barang extends CI_Model{
    // response jika field ada yang kosong
    public function empty_response(){
        $response['status']= 502;
        $response['error']= true;
        $response['message']='Data barang kosong.';
        return $response;
    }
    // function untuk insert data ke tabel tb_person
    public function add_barang($data_barang){
        if(empty($data_barang)){
            return $this->empty_response();
            }else{
            $insert = $this->db->insert("data_barang", $data_barang);
        if($insert){
                $response['status']=200;
                $response['error']=false;
                $response['message']='Data barang ditambahkan.';
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data barang gagal ditambahkan.';
                return $response;
            }
            }
    }   
    // mengambil semua data barang
    public function all_barang(){
        $data = $this->db->get("data_barang")->result();
            $response['status']= 200;
            $response['error']= false;
            $response['barang']=$data;
            return $response;
        }
    // hapus data barang
    public function delete_barang($id){
    if($id == ''){
        return $this->empty_response();
        }else{
        $where = array(
            "id_barang"=>$id
        );
        $this->db->where($where);
            $delete = $this->db->delete("data_barang");
            if($delete){
                $response['status']=200;
                $response['error']= false;
                $response['message']='Data barang dihapus.';
                return $response;
            }else{
                $response['status']=502;
                $response['error']=true;
                $response['message']='Data barang gagal dihapus.';
                return $response;
            }
            }
    }
    // update barang
    public function update_barang($data,$where){
        if(empty($where) || empty($data)){
            return $this->empty_response();
            }else{
            
            $this->db->where($where);
        $update = $this->db->update("data_barang",$data);
        if($update){
            $response['status']=200;
            $response['error']=false;
            $response['message']='Data barang diubah.';
            return $response;
        }else{
            $response['status']=502;
            $response['error']=true;
            $response['message']='Data barang gagal diubah.';
            return $response;
        }
        }
    }
}
?>