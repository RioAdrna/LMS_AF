<?php

class Majaran extends CI_MODEL{

    function select_ajaran($q = ""){
        if($q != "")
            $this->db->where("nm_kurikulum LIKE '%$q%'");
            
       return $this->db->get("m_ajaran");
    }

    function detail_ajaran($id){
        return $this->db->get_where("m_ajaran", array("id_ajaran" => $id))->row();
    }

    function newid(){
        $query = $this->db->query("SELECT MAX(id_ajaran) as id FROM m_ajaran WHERE id_ajaran LIKE 'Aj%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("Aj%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_ajaran", $data);
        return $query;
    }

    function updatedata($data, $where){
        $this->db->set($data);
        $this->db->where($where);
    $query = $this->db->update("m_ajaran");
    return $query;
    }

    function deletedata($tabel, $where){
             $this->db->where($where);
    $query = $this->db->delete($tabel);

    return $query;
    }

}
