<?php
class Mdata extends CI_Model{

    function data_materi($status){
        $this->db->join("m_mapel", "m_mapel.id_mapel = m_materi.id_mapel", "inner");
        return $this->db->get_where("m_materi", array("status_materi" => $status, "id_guru" => $this->session->userdata("id")));
    }

    function data_rombel(){
        $this->db->join("m_jurusan", "m_jurusan.id_jurusan = m_kelas.id_jurusan", "inner");
        $this->db->join("m_ajaran", "m_ajaran.id_ajaran = m_kelas.id_ajaran", "inner");
        return $this->db->get("m_kelas");
             
    }
    

    function data_tugas($status){
        $this->db->join("m_mapel", "m_mapel.id_mapel = m_tugas.id_mapel", "inner");
    
        return $this->db->get_where("m_tugas", array("status_tugas" => $status,  "id_guru" => $this->session->userdata("id")));   

    }


    function data_mapel($status){ 
        return $this->db->get_where('m_mapel', array("status_mapel" => $status));
 
    }

    function data_guru(){
        return  $this->db->get('m_guru');
    }
    
    function data_jurusan(){
        $this->db->join("m_ajaran", "m_ajaran.id_ajaran = m_jurusan.id_ajaran", "inner");
        return $this->db->get('m_jurusan');
    }
    function data_ajaran(){
        return  $this->db->get('m_ajaran');
    }

    function data_jadwal(){
        $this->db->join("m_guru", "m_guru.id_guru = trx_jadwal_mengajar.id_guru", "inner");
        $this->db->join("m_kelas", "m_kelas.id_kelas = trx_jadwal_mengajar.id_kelas", "inner");
        $this->db->join("m_mapel", "m_mapel.id_mapel = trx_jadwal_mengajar.id_mapel", "inner");
        return $this->db->get("trx_jadwal_mengajar");
             
    }
}


