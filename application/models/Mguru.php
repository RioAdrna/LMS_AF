<?php

class Mguru extends CI_MODEL{

    function detail_guru($id){
        return $this->db->get_where("m_guru", array("id_guru" => $id))->row();
    }

    function data_personal($id_guru)
    {
        $this->db->select('*');
        $this->db->from("m_guru");

        // AWAL PENGECEKAN WHERE
        $this->db->where("m_guru.id_guru='$id_guru'");
        // AKHIR PENGECEKAN WHERE

        return $this->db->get();
    }

    function newid(){
        $query = $this->db->query("SELECT MAX(id_guru) as id FROM m_guru WHERE id_guru LIKE 'G%'")->row();
        $id    = (int) substr($query->id, 2, 3); //001 -> 1
        $id    = $id+1;
        $newid = sprintf("G%03s", $id);
        return $newid;
    }

    function newdata($data){
        $query = $this->db->insert("m_guru", $data);
        return $query;
    }

    function updatedata($data, $where){
        $this->db->set($data);
        $this->db->where($where);
    $query = $this->db->update("m_guru");
    return $query;
    }

    function deletedata($tabel, $where){
                $this->db->where($where);
      $querry = $this->db->delete($tabel);

      return $querry;
      
    }

    public function count(){
        return $this->db->count_all("m_guru");
      }
}