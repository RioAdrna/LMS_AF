<?php

class Mmateri extends CI_Model{

    function select_materi($q = ""){
        if($q != "")
            $this->db->where("nm_mapel LIKE '%$q%'");

        return $this->db->get("m_mapel");
    }

    function select_kelas($q = ""){
        if($q != "")
            $this->db->where("nm_kelas LIKE '%$q%'");

        return $this->db->get("m_kelas");
    }

    function detail_materi($id){
        return $this->db->get_where("m_materi", array("id_materi" => $id))->row();
    }

    function newid(){
        $query = $this->db->query("SELECT MAX(id_materi) as id FROM m_materi WHERE id_materi LIKE 'MA%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("MA%03s", $id);
        return $newid;
    }

    function newidtrx(){
        $date  = date("ymd");
        $query = $this->db->query("SELECT MAX(id_trxmateri) as id FROM trx_materi WHERE id_trxmateri LIKE 'TRXM$date%'")->row();
        $id    = (int) substr($query->id, 10, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("TRXM$date%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_materi", $data);
        return $query;
    }

    function newdatatrx($data){
        $query = $this->db->insert("trx_materi", $data);
        return $query;
    }

    function updatedata($data, $where){
                 $this->db->set($data);
                 $this->db->where($where);
        $query = $this->db->update("m_materi");
        return $query;
    }

    function deletedata($tabel, $where){
                 $this->db->where($where);
        $query = $this->db->delete($tabel);

        return $query;
    }

    public function count(){
        return $this->db->count_all("m_materi");
      }
    
}