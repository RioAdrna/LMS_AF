<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rombel extends CI_Controller {
    //Constructor
    public function __construct(){
        parent::__construct();
        $this->load->model("mdata");
        $this->load->model("mrombel");
    }

    function data_rombel(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();

        $db = $this->mdata->data_rombel()->result();
        $no = 1;
        foreach($db as $db):
            array_push($data['data'],array(
                $no++,
                $db->nm_kelas,
                $db->nm_jurusan,
                $db->tahun_ajaran1." - ".$db->tahun_ajaran2,
                "<button onclick='detail(\"$db->id_kelas\")' class='btn btn-primary'><i class='fas fa-search-plus'></i> Detail </button> &nbsp;".
                "<button onclick='hapus(\"$db->id_kelas\")' class='btn btn-danger'><i class='fas fa-trash'></i> Hapus </button>"       
            ));
        endforeach;    

        
        echo(json_encode($data));
    }
    
    function select_rombel(){
        $container["results"] = array();
        $data = $this->mrombel->select_rombel($this->input->get("q"))->result();

        foreach($data as $data):
            array_push($container["results"], array(
                "id" => $data->id_jurusan,
                "text" => $data->nm_jurusan
            ));
            //<option value=="id_jurusan">Nama Jurusan</option>
        endforeach;
        echo(json_encode($container));
    }

    function select_ajaran(){
        $container["results"] = array();
        $data = $this->mrombel->select_ajaran($this->input->get("q"))->result();

        foreach($data as $data):
            array_push($container["results"], array(
                "id" => $data->id_ajaran,
                "text" => $data->tahun_ajaran1
            ));
            //<option value=="id_jurusan">Nama Jurusan</option>
        endforeach;
        echo(json_encode($container));
    }
    function tambah_data(){
        $id_jurusan       = $this->input->post("id_jurusan"); 
        $id_ajaran        = $this->input->post("id_ajaran");   
        $nm_kelas         = $this->input->post("nm_kelas");        
        $id_kelas         = $this->mrombel->newid();
        $respon           = array();
        $data             = array(
                                "id_kelas" => $id_kelas,
                                "id_jurusan" => $id_jurusan,
                                "id_ajaran" => $id_ajaran,
                                "nm_kelas" => $nm_kelas,
                                );
        $create         = $this->mrombel->newdata($data);

        if($create){
            $respon = array("message" => "Rombel baru berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Rombel baru gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);


    }

    function ubah_data(){
        $id_jurusan       = $this->input->post("id_jurusan"); 
        $id_ajaran        = $this->input->post("id_ajaran");   
        $nm_kelas         = $this->input->post("nm_kelas");        
        $id_kelas         = $this->input->post("id_kelas");
        $respon           = array();
        $data             = array(
                                "id_jurusan" => $id_jurusan,
                                "id_ajaran" => $id_ajaran,
                                "nm_kelas" => $nm_kelas,
                                );
        $where           = array("id_kelas" => $id_kelas);
        $update          = $this->mrombel->updatedata($data, $where);

        if($update){
            $respon = array("message" => "Rombel  berhasil diupdate", "status" => "success");
        } else{
            $respon = array("message" => "Rombel  gagal diupdate", "status" => "error");
        }
        echo json_encode($respon);

    }
    function hapus_data(){
        $id_kelas = $this->input->post("id");
        $where    = array("id_kelas" => $id_kelas);
        $tabel    = "m_kelas";
        $hapus    = $this->mrombel->deletedata($tabel, $where);
    
        if($hapus)
            $respon = array("message" => "Rombel Berhasil Dihapus", "status" => "success");
        else
            $respon = array("message" => "Rombel gagal Dihapus", "status" => "error");
    
        echo json_encode($respon);    
    }

    function detail_data(){
        $id_kelas = $this->input->post("id_kelas");
        $data       = $this->mrombel->detail_rombel($id_kelas);

        echo json_encode($data);
    }
        
}

