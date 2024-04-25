<?php

class Mrombel extends CI_Model{

    function select_rombel($q = ""){
        if($q != "")
            $this->db->where("nm_jurusan LIKE '%$q%'");

        return $this->db->get("m_jurusan");
    }

    function select_ajaran($q = ""){
        if($q != "")
            $this->db->where("tahun_ajaran1 LIKE '%$q%'");

        return $this->db->get("m_ajaran");
    }

    function detail_rombel($id){
        return $this->db->get_where("m_kelas",array("id_kelas" => $id))->row();
    }
    
    function newid(){
        $query = $this->db->query("SELECT MAX(id_kelas) as id FROM m_kelas WHERE id_kelas LIKE 'K%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("K%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_kelas", $data);
        return $query;
    }

    function updatedata($data, $where){
                 $this->db->set($data);
                 $this->db->where($where);
        $query = $this->db->update("m_kelas");
        return $query;
    }
    
    function deletedata($tabel, $where){
              $this->db->where($where);
    $query = $this->db->delete($tabel);
    
    return $query;
    
    }
}
