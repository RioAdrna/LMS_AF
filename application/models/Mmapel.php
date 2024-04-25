<?php

class Mmapel extends CI_Model{

    function select_mapel($m = ""){
        if($m != "")
            $this->db->where("nm_mapel LIKE '%$m%'");
            
       return $this->db->get("m_mapel");
    }

    function detail_mapel($id){
        return $this->db->get_where("m_mapel",array("id_mapel" => $id))->row();
    }
    function newid(){
        $query = $this->db->query("SELECT MAX(id_mapel) as id FROM m_mapel WHERE id_mapel LIKE 'M%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("M%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_mapel", $data);
        return $query;
    }

    function updatedata($data, $where){
            $this->db->set($data);
            $this->db->where($where);
     $query = $this->db->update("m_mapel");
     return $query;
    }
    function deletedata($tabel, $where){
             $this->db->where($where);
    $query = $this->db->delete($tabel);

    return $query;
    }
}

 