<?php

class Mtugas extends CI_Model{

    function select_tugas($q = ""){
        if($q != "")
            $this->db->where("nm_mapel LIKE '%$q%'");

        return $this->db->get("m_mapel");
    }

    function select_kelas($q = ""){
        if($q != "")
            $this->db->where("nm_kelas LIKE '%$q%'");

        return $this->db->get("m_kelas");
    }

    function detail_tugas($id){
        return $this->db->get_where("m_tugas", array("id_tugas" => $id))->row();
    }

    function newid(){
        $query = $this->db->query("SELECT MAX(id_tugas) as id FROM m_tugas WHERE id_tugas LIKE 'T%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 
        $id    = $id+1;
        $newid = sprintf("T%03s", $id);
        return $newid;
    }

    function newidtrx(){
        $date  = date("ymd");
        $query = $this->db->query("SELECT MAX(id_trxtugas) as id FROM trx_tugas WHERE id_trxtugas LIKE 'TRXT$date%'")->row();
        $id    = (int) substr($query->id, 10, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("TRXT$date%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_tugas", $data);
        return $query;
    }

    function newdatatrx($data){
        $query = $this->db->insert("trx_tugas", $data);
        return $query;
    }

    function updatedata($data, $where){
                 $this->db->set($data);
                 $this->db->where($where);
        $query = $this->db->update("m_tugas");
        return $query;
    }

    function deletedata($tabel, $where){
                 $this->db->where($where);
        $query = $this->db->delete($tabel);

        return $query;
    }

    public function count(){
        return $this->db->count_all("m_tugas");
      }
}