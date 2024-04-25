<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {
    //constructor
     
    public function __construct(){

        parent::__construct();
        $this->load->model("mdata");
        $this->load->model("mmapel");
    }

    function data_mapel(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();

        $db = $this->mdata->data_mapel('Y')->result();
        $no =1;
        foreach($db as $db):  
            array_push($data['data'],array(
                $no++,
                $db->nm_mapel,
                $db->note_mapel,
                ($db->status_mapel == "Y") ? "<span class='badge bg-success'>Aktif</span>":
                    "<span class='badge bg-danger'>Tidak Aktif</span>",

                "<button onclick='detail(\"$db->id_mapel\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail </button> &nbsp;".
                "<button onclick='hapus(\"$db->id_mapel\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus </button>"
            ));
        endforeach;

        
        echo(json_encode($data));
    }

    function data_mapel_arsip(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();

        $db = $this->mdata->data_mapel('N')->result();
        $no =1;
        foreach($db as $db):  
            array_push($data['data'],array(
                $no++,
                $db->nm_mapel,
                $db->note_mapel,
                ($db->status_mapel == "Y") ? "<span class='badge bg-success'>Aktif</span>":
                    "<span class='badge bg-danger'>Tidak Aktif</span>",

                "<button onclick='detail(\"$db->id_mapel\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail </button> &nbsp;".
                "<button onclick='hapus(\"$db->id_mapel\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus </button>"
            ));
        endforeach;

        
        echo(json_encode($data));
    }

    function select_mapel(){
        $container["results"] = array();
        $data = $this->mmapel->select_mapel($this->input->get("q"))->result();

        foreach ($data as $data):
            array_push($container["results"], array(
                "id" => $data ->id_mapel,
                "text" => $data->nm_mapel
            ));
            //<option value="id_mapel">Nama Mapel</option>//
        endforeach;
        
        echo(json_encode($container));
    }
    function tambah_data(){
        $id_mapel       = $this->mmapel->newid();
        $muatan         = $this->input->post("muatan");
        $nm_mapel       = $this->input->post("nm_mapel");           
        $note_mapel     = $this->input->post("note_mapel");   
        $status_mapel   = $this->input->post("status_mapel");
        $respon         = array();
        $data           = array(
                                "id_mapel" => $id_mapel,
                                "muatan" => $muatan,
                                "nm_mapel" => $nm_mapel,
                                "note_mapel" => $note_mapel,
                                "status_mapel" => $status_mapel
                                );
        $create         = $this->mmapel->newdata($data);

        if($create){
            $respon = array("message" => "Mata Pelajaran baru berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Mata Pelajaran baru gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);
        
    }

    function ubah_data(){
        $id_mapel       = $this->input->post("id_mapel");
        $muatan         = $this->input->post("muatan");
        $nm_mapel       = $this->input->post("nm_mapel");           
        $note_mapel     = $this->input->post("note_mapel");   
        $status_mapel   = $this->input->post("status_mapel");
        $respon         = array();
        $data           = array(
                                "id_mapel" => $id_mapel,
                                "muatan" => $muatan,
                                "nm_mapel" => $nm_mapel,
                                "note_mapel" => $note_mapel,
                                "status_mapel" => $status_mapel
                                );

        $where          = array("id_mapel" => $id_mapel);
        $update         = $this->mmapel->updatedata($data, $where);

        if($update){
            $respon = array("message" => "Matapelajaran baru berhasil diubah", "status" => "success");
        } else{
            $respon = array("message" => "Matapelajaran baru gagal diubah", "status" => "error");
        }
        echo json_encode($respon);

    }

    function hapus_data(){
        $id_mapel  = $this->input->post("id");
        $where     = array("id_mapel" => $id_mapel);
        $tabel     = "m_mapel";
        $hapus     = $this->mmapel->deletedata($tabel, $where);

        if($hapus){
            $respon = array("message" => "Mata Pelajaran berhasil dihapus", "status" => "success");
        } else{
            $respon = array("message" => "Mata Pelajaran gagal dihapus", "status" => "error");
        }
        echo json_encode($respon);
    }

    function detail_data(){
        $id_mapel  = $this->input->post("id_mapel");
        $data      = $this->mmapel->detail_mapel($id_mapel);

        echo json_encode($data);

    }
}