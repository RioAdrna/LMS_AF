<?php

class Mjurusan extends CI_MODEL{

    function select_jurusan($q = ""){
        if($q != "")
            $this->db->where("nm_jurusan LIKE '%$q%'");
            
       return $this->db->get("m_jurusan");
    }

    function select_ajaran($q = ""){
        if($q != "")
            $this->db->where("tahun_ajaran1 LIKE '%$q%'");
            
       return $this->db->get("m_ajaran");
    }

    function detail_jurusan($id){
        return $this->db->get_where("m_jurusan", array("id_jurusan" => $id))->row();
    }

    function newid(){
        $query = $this->db->query("SELECT MAX(id_jurusan) as id FROM m_jurusan WHERE id_jurusan LIKE 'J%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("J%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_jurusan", $data);
        return $query;
    }

    function updatedata($data, $where){
        $this->db->set($data);
        $this->db->where($where);
    $query = $this->db->update("m_jurusan");
    return $query;
    }

    function deletedata($tabel, $where){
             $this->db->where($where);
    $query = $this->db->delete($tabel);

    return $query;
    }

}