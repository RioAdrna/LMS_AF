<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    //Counstructor

    public function __construct(){
        parent::__construct();
        $this->load->model("mdata");
        $this->load->model("mguru");
    }

    function data_guru(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();

        $db = $this->mdata->data_guru()->result();
        $no = 1;
        foreach($db as $db):
            array_push($data['data'],array(
                $no++,
                $db->nm_guru,
                ($db->status_guru == "Y") ? "<span class='badge bg-success'>Aktif</span>":
                    "<span class='badge bg-danger'>Tidak Aktif</span>",
                "<button onclick='detail(\"$db->id_guru \")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail </button> &nbsp;".
                "<button onclick='edit(\"$db->id_guru \")' class='btn btn-success btn-sm'><i class='fas fa-edit'></i> Edit </button> &nbsp;".
                "<button onclick='hapus(\"$db->id_guru \")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus </button>"
            ));  
        endforeach;

        
        echo(json_encode($data));
    }

    function select_guru(){
        $container["results"] = array();
        $data = $this->mguru->select_guru($this->input->get("q"))->result();

        foreach($data as $data):
            array_push($container["results"], array(
                "id" => $data->id_guru,
                "text" => $data->nm_guru
            ));
            // <option value="id_guru">Nama Guru</option>
        endforeach;

        echo(json_encode($container));
    }

    function tambah_data(){
        $id_guru        = $this->mguru->newid();
        $email_guru     = $this->input->post("email_guru");
        $hp_guru        = $this->input->post("hp_guru");           
        $nm_guru        = $this->input->post("nm_guru");
        $status_guru    = $this->input->post("status_guru");
        $password       = $this->input->post("password");   
        $respon         = array();
        $data           = array(
                                "id_guru" => $id_guru,
                                "email_guru" => $email_guru,
                                "hp_guru" => $hp_guru,
                                "nm_guru" => $nm_guru,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status_guru" => $status_guru,
                                "is_admin" => "N"
                                );
        $create         = $this->mguru->newdata($data);

        if($create){
            $respon = array("message" => "Guru berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Guru gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);
        
    }

    function ubah_data(){
        $id_guru        = $this->input->post("id_guru");
        $email_guru     = $this->input->post("email_guru");
        $hp_guru        = $this->input->post("hp_guru");           
        $nm_guru        = $this->input->post("nm_guru"); 
        $status_guru    = $this->input->post("status_guru");
        $password       = $this->input->post("password");     
        $respon         = array();
        if($password == "")
        $data           = array(
                                "id_guru" => $id_guru,
                                "email_guru" => $email_guru,
                                "hp_guru" => $hp_guru,
                                "nm_guru" => $nm_guru,
                                "status_guru" => $status_guru
                                );
        else
        $data           = array(
                                "id_guru" => $id_guru,
                                "email_guru" => $email_guru,
                                "hp_guru" => $hp_guru,
                                "nm_guru" => $nm_guru,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status_guru" => $status_guru
                                );
        
        $where          = array("id_guru" => $id_guru);
        $update         = $this->mguru->updatedata($data, $where);

        if($update){
            $respon = array("message" => "Guru berhasil diubah", "status" => "success");
        } else{
            $respon = array("message" => "Guru gagal diubah", "status" => "error");
        }
        echo json_encode($respon);
        
    }

    function hapus_data(){
        $id_guru = $this->input->post("id");
        $where   = array("id_guru" => $id_guru);
        $tabel   = "m_guru";
        $hapus   = $this->mguru->deletedata($tabel, $where);

        if($hapus)
            $respon = array("message" => "Guru berhasil dihapus", "status" => "success");
        else
            $respon = array("message" => "Guru gagal dihapus", "status" => "error");

        echo json_encode($respon);
    }

    function detail_data(){
        $id_guru = $this->input->post("id_guru");
        $data    = $this->mguru->detail_guru($id_guru);

        echo json_encode($data);
       }

        // DETAIL PERSONAL
    public function detail_personal_post()
    {
        $id_guru = $this->input->post('id_guru');


        try {

            $dbase  =  $this->mguru->detail_guru($id_guru)->row();
           
            $this->response( $dbase, 200 );

        }catch(Exception $e) {

            $massage = array('massage' => 'error');

            $this->response( $massage, 500 );

        }

    }

}
