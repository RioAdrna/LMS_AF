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
            $respon = array("message" => "Data berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Data gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);
        
    }

    function ubah_data(){
        $id_guru        = $this->input->post("id_guru");
        $email_guru     = $this->input->post("email_guru");
        $hp_guru        = $this->input->post("hp_guru");           
        $nm_guru        = $this->input->post("nm_guru"); 
        $nip_guru        = $this->input->post("nip_guru"); 
        $nik_guru        = $this->input->post("nik_guru"); 
        $tmt_lahir        = $this->input->post("tmt_lahir"); 
        $tgl_lahir        = $this->input->post("tgl_lahir"); 
        $agama        = $this->input->post("agama"); 
        $alamat_guru        = $this->input->post("alamat_guru"); 
        $status_guru    = $this->input->post("status_guru");
        $password       = $this->input->post("password");     
        $jenis_kelamin       = $this->input->post("jenis_kelamin");     
        $respon         = array();
        if($password == "")
        $data           = array(
                                "id_guru" => $id_guru,
                                "nik_guru" => $nik_guru,
                                "nip_guru" => $nip_guru,
                                "alamat_guru" => $alamat_guru,
                                "tmt_lahir" => $tmt_lahir,
                                "tgl_lahir" => $tgl_lahir,
                                "agama" => $agama,
                                "email_guru" => $email_guru,
                                "hp_guru" => $hp_guru,
                                "nm_guru" => $nm_guru,
                                "jenis_kelamin" => $jenis_kelamin,
                                "status_guru" => $status_guru
                                );
        else
        $data           = array(
                                "id_guru" => $id_guru,
                                "nip_guru" => $nip_guru,
                                "nik_guru" => $nik_guru,
                                "alamat_guru" => $alamat_guru,
                                "agama" => $agama,
                                "tmt_lahir" => $tmt_lahir,
                                "tgl_lahir" => $tgl_lahir,
                                "email_guru" => $email_guru,
                                "hp_guru" => $hp_guru,
                                "nm_guru" => $nm_guru,
                                "jenis_kelamin" => $jenis_kelamin,
                                "password" => password_hash($password, PASSWORD_DEFAULT),
                                "status_guru" => $status_guru
                                );
        
        $where          = array("id_guru" => $id_guru);
        $update         = $this->mguru->updatedata($data, $where);

        if($update){
            $respon = array("message" => "Data berhasil diubah", "status" => "success");
        } else{
            $respon = array("message" => "Data gagal diubah", "status" => "error");
        }
        echo json_encode($respon);
        
    }

    function hapus_data(){
        $id_guru = $this->input->post("id");
        $where   = array("id_guru" => $id_guru);
        $tabel   = "m_guru";
        $hapus   = $this->mguru->deletedata($tabel, $where);

        if($hapus)
            $respon = array("message" => "Data berhasil dihapus", "status" => "success");
        else
            $respon = array("message" => "Data gagal dihapus", "status" => "error");

        echo json_encode($respon);
    }

    // Detail edit
      function detail_data(){
        $id_guru = $this->input->post("id_guru");
        $data    = $this->mguru->detail_guru($id_guru);

        echo json_encode($data);
       }

        // DETAIL PERSONAL
        public function detail_personal()
        {
            $id_guru = $this->input->post('id_guru');
        
            try {
                $dbase = $this->mguru->data_personal($id_guru)->row();
        
                echo json_encode($dbase);
            } catch (Exception $e) {
                $message = array('message' => 'error');
                $this->output->set_status_header(500)->set_output(json_encode($message));
            }
        }

              //UPLOAD FILE
    public function upload_file()
    {
            $id_guru       = $this->input->get('id_guru');
       
            $filename = $id_guru.".jpg";

            $config['upload_path']          = './assets/files/profile/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 3000;
            $config['file_name']            = $filename;

            $this->load->library('upload', $config);

            $this->upload->overwrite = true;

            if ( ! $this->upload->do_upload('jpeg'))
            {
                    $res = array('sts' => "0", 'msg' => $this->upload->display_errors());

            }
            else
            {
                    // $data = array('sts' => $this->upload->data());
                    $res = array('sts' =>'1', 'msg'=> "SUKSES", "nm_file" => $filename);

            }

            echo json_encode($res);
    }

            public function hapus_file(){
            $file = $this->input->post("nm_file");

            unlink("./assets/files/profile/$file");
            echo json_encode(array("status" => "File berhasil dihapus"));

}
        

}
