<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaran extends CI_Controller {
    //constructor
    public function __construct(){
        parent::__construct();
        $this->load->model("mdata");
        $this->load->model("majaran");
    }

    function data_ajaran(){
        $data['data'] = array();

        $db = $this->mdata->data_ajaran()->result();
        $no = 1;
        foreach($db as $db):
        array_push($data['data'],array(
            $no++,
            $db->nm_kurikulum, 
            $db->tahun_ajaran1,
            $db->tahun_ajaran2,       
            "<button onclick='detail(\"$db->id_ajaran\")' class='btn btn-primary'><i class='fas fa-search-plus'></i> Detail </button> &nbsp;".
            "<button onclick='hapus(\"$db->id_ajaran\")' class='btn btn-danger'><i class='fas fa-trash'></i> Hapus </button>"
        ));
    endforeach;

        echo(json_encode($data));
    }

    function select_ajaran(){
        $container["results"] = array();
        $data = $this->majaran->select_ajaran($this->input->get("q"))->result();

        foreach ($data as $data):
            array_push($container["results"], array(
                "id" => $data ->id_ajaran,
                "text" => $data->nm_ajaran
            ));
            //<option value="id_mapel">Nama Mapel</option>//
        endforeach;
        
        echo(json_encode($container));
    }

    function tambah_data(){
        $id_ajaran         = $this->majaran->newid();
        $nm_kurikulum      = $this->input->post("nm_kurikulum");
        $tahun_ajaran1     = $this->input->post("tahun_ajaran1");
        $tahun_ajaran2     = $this->input->post("tahun_ajaran2");
        $respon            = array();
        $data              = array(
                               "id_ajaran" => $id_ajaran,
                               "nm_kurikulum" => $nm_kurikulum,
                               "tahun_ajaran1" => $tahun_ajaran1,
                               "tahun_ajaran2" => $tahun_ajaran2
                                 
                              );
        $create        = $this->majaran->newdata($data);
        
        if($create){
            $respon = array("message" => "Data Ajaran baru berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Data Ajaran baru gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);

    }

    function ubah_data(){
        $id_ajaran         = $this->input->post("id_ajaran");
        $nm_kurikulum      = $this->input->post("nm_kurikulum");
        $tahun_ajaran1     = $this->input->post("tahun_ajaran1");
        $tahun_ajaran2     = $this->input->post("tahun_ajaran2");
        $respon            = array();
        $data              = array(
                               "id_ajaran" => $id_ajaran,
                               "nm_kurikulum" => $nm_kurikulum,
                               "tahun_ajaran1" => $tahun_ajaran1,
                               "tahun_ajaran2" => $tahun_ajaran2
                                 
                              );
                              
        $where         = array("id_ajaran" => $id_ajaran);
        $update        = $this->majaran->updatedata($data, $where);
            
        
        if($update){
            $respon = array("message" => "Data Ajaran baru berhasil diupdate", "status" => "success");
        } else{
            $respon = array("message" => "Data Ajaran baru gagal diupdate", "status" => "error");
        }
        echo json_encode($respon);

    }

    function hapus_data(){
        $id_ajaran = $this->input->post("id");
        $where     = array("id_ajaran" => $id_ajaran);
        $tabel     = "m_ajaran";
        $hapus     = $this->majaran->deletedata($tabel, $where);

        if($hapus){
            $respon = array("message" => "Data Ajaran berhasil dihapus", "status" => "success");
        } else{
            $respon = array("message" => "Data Ajran gagal dihapus", "status" => "error");
        }
        echo json_encode($respon);
    }

    function detail_data(){
        $id_ajaran = $this->input->post("id_ajaran");
        $data      = $this->majaran->detail_ajaran($id_ajaran);
        
        echo json_encode($data);
    }

}