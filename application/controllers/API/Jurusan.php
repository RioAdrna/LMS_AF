<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
    //constructor
    public function __construct(){
        parent::__construct();
        $this->load->model("mdata");
        $this->load->model("mjurusan");
    }

    function data_jurusan(){
        $data['data'] = array();

        $db = $this->mdata->data_jurusan()->result();
        $no = 1;
        foreach($db as $db):
        array_push($data['data'],array(
            $no++,
            $db->nm_jurusan, 
            $db->tahun_ajaran1." - ".$db->tahun_ajaran2,       
            "<button onclick='detail(\"$db->id_jurusan\")' class='btn btn-primary'><i class='fas fa-search-plus'></i> Detail </button> &nbsp; ".
            "<button onclick='hapus(\"$db->id_jurusan\")' class='btn btn-danger'><i class='fas fa-trash'></i> Hapus </button>"
        ));
    endforeach;

        echo(json_encode($data));
        }
        
        function select_jurusan(){
            $container["results"] = array();
            $data = $this->mjurusan->select_jurusan($this->input->get("q"))->result();
    
            foreach ($data as $data):
                array_push($container["results"], array(
                    "id" => $data ->id_jurusan,
                    "text" => $data->nm_jurusan
                ));
                //<option value="id_mapel">Nama Mapel</option>//
            endforeach;
            
            echo(json_encode($container));
        }

        function select_ajaran(){
            $container["results"] = array();
            $data = $this->mjurusan->select_ajaran($this->input->get("q"))->result();
    
            foreach($data as $data):
                array_push($container["results"], array(
                    "id" => $data->id_ajaran,
                    "text" => $data->tahun_ajaran1
                ));
                //<option value="id_mapel">Nama Matapelajaran</option>
            endforeach;
    
            echo(json_encode($container));
        }

        function tambah_data(){
            $id_jurusan    = $this->mjurusan->newid();
            $nm_jurusan    = $this->input->post("nm_jurusan");
            $id_ajaran     = $this->input->post("id_ajaran");
            $respon        = array();
            $data          = array(
                                   "id_jurusan" => $id_jurusan,
                                   "nm_jurusan" => $nm_jurusan,
                                   "id_ajaran" => $id_ajaran
                                     
                                  );
            $create        = $this->mjurusan->newdata($data);
            
            if($create){
                $respon = array("message" => "Jurusan baru berhasil ditambahkan", "status" => "success");
            } else{
                $respon = array("message" => "Jurusan baru gagal ditambahkan", "status" => "error");
            }
            echo json_encode($respon);

        }

        function ubah_data(){
            $id_jurusan    = $this->input->post("id_jurusan");
            $nm_jurusan    = $this->input->post("nm_jurusan");
            $id_ajaran     = $this->input->post("id_ajaran");
            $respon        = array();
            $data          = array(
                                   "id_jurusan" => $id_jurusan,
                                   "nm_jurusan" => $nm_jurusan,
                                   "id_ajaran" => $id_ajaran
                                     
                                  );
            $where         = array("id_jurusan" => $id_jurusan);
            $update        = $this->mjurusan->updatedata($data, $where);
            
            if($update){
                $respon = array("message" => "Jurusan baru berhasil ditambahkan", "status" => "success");
            } else{
                $respon = array("message" => "Jurusan baru gagal ditambahkan", "status" => "error");
            }
            echo json_encode($respon);

        }


        function hapus_data(){
            $id_jurusan = $this->input->post("id");
            $where     = array("id_jurusan" => $id_jurusan);
            $tabel     = "m_jurusan";
            $hapus     = $this->mjurusan->deletedata($tabel, $where);
    
            if($hapus){
                $respon = array("message" => "Mata Pelajaran berhasil dihapus", "status" => "success");
            } else{
                $respon = array("message" => "Mata Pelajaran gagal dihapus", "status" => "error");
            }
            echo json_encode($respon);
        }

        function detail_data(){
            $id_jurusan = $this->input->post("id_jurusan");
            $data      = $this->mjurusan->detail_jurusan($id_jurusan);
            
            echo json_encode($data);
        }

    
}