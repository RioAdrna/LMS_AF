<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {
   //Constructor

   public function __construct(){
      parent::__construct();
      $this->load->model("mdata");
      $this->load->model("mtugas");
      date_default_timezone_set("Asia/Jakarta");
   }
    function data_tugas(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();
         
         $db = $this->mdata->data_tugas('Y')->result();
         $no = 1;
         foreach($db as $db):        
         array_push($data['data'],array(
            $no++,
            $db->nm_mapel,
            $db->judul_tugas,
            "<button onclick='detail(\"$db->id_tugas\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail</button> &nbsp;".
            "<button onclick='hapus(\"$db->id_tugas\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus</button>"
        
        ));
    endforeach;

        echo(json_encode($data));
    }

    function data_tugas_arsip(){
        //Deklarasi Array (Lari) Kosong
        $data['data'] = array();

        $db = $this->mdata->data_tugas('N')->result();
        $no =1;
        foreach($db as $db):  
            array_push($data['data'],array(
                $no++,
                $db->nm_mapel,
                $db->judul_tugas,
                "<button onclick='detail(\"$db->id_tugas\")' class='btn btn-primary btn-sm'><i class='fas fa-search-plus'></i> Detail </button>".
                "<button onclick='hapus(\"$db->id_tugas\")' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Hapus </button>"
            ));
        endforeach;


        echo(json_encode($data));
    }
    

    function select_tugas(){
        $container["results"] = array();
        $data = $this->mtugas->select_tugas($this->input->get("q"))->result();

        foreach($data as $data):
              array_push($container["results"], array(
                  "id" => $data->id_mapel,
                  "text" => $data->nm_mapel

              ));
              //<option value="id_tugas">Nama Tugas</option>
        endforeach;

        echo(json_encode($container));
    }

    function select_kelas(){
        $container["results"] = array();
        $data = $this->mtugas->select_kelas($this->input->get("q"))->result();

        foreach($data as $data):
            array_push($container["results"], array(
                "id" => $data->id_kelas,
                "text" => $data->nm_kelas
            ));
            //<option value="id_mapel">Nama Matapelajaran</option>
        endforeach;

        echo(json_encode($container));
    }
    function tambah_data(){
        $id_mapel       = $this->input->post("id_mapel");    
        $judul_tugas    = $this->input->post("judul_tugas");
        $konten         = $this->input->post("konten");        
        $status         = $this->input->post("status");
        $id_guru        = $this->session->userdata("id");
        $tgl_posting    = date("Y-m-d H:i:s");
        $id_tugas       = $this->mtugas->newid();
        $respon         = array();
        $kelas          = json_decode($this->input->post("kelas"));
        $jenis          = $this->input->post("jenis");

        if($jenis == "file")
            $data           = array(
                                "id_tugas" => $id_tugas,
                                "id_mapel" => $id_mapel,
                                "id_guru" => $id_guru,
                                "judul_tugas" => $judul_tugas,
                                "file_tugas" => $konten,
                                "tgl_posting" => $tgl_posting,
                                "status_tugas" => $status
                                );
        else                       
           $data           = array(
                               "id_tugas" => $id_tugas,
                               "id_mapel" => $id_mapel,
                               "id_guru" => $id_guru,
                               "judul_tugas" => $judul_tugas,
                               "konten_tugas" => $konten,
                               "tgl_posting" => $tgl_posting,
                               "status_tugas" => $status
                               );
        $create         = $this->mtugas->newdata($data);
       
        if($create){
            $respon = array("message" => "Tugas baru berhasil ditambahkan", "status" => "success");
        } else{
            $respon = array("message" => "Tugas baru gagal ditambahkan", "status" => "error");
        }
        echo json_encode($respon);

    }

    function ubah_data(){
        $id_mapel       = $this->input->post("id_mapel");    
        $judul_tugas    = $this->input->post("judul_tugas"); 
        $konten         = $this->input->post("konten");               
        $link_gform     = $this->input->post("link_gform");    
        $status         = $this->input->post("status");
        $id_guru        = $this->session->userdata("id");
        $tgl_posting    = date("Y-m-d H:i:s");
        $id_tugas       = $this->input->post("id_tugas");
        $respon         = array();
        $data           = array(
                                "id_mapel" => $id_mapel,
                                "judul_tugas" => $judul_tugas,
                                "konten_tugas" => $konten,
                                "link_gform" => $link_gform,
                                "status_tugas" => $status
                                );
        $where          = array("id_tugas" => $id_tugas);
        $update         = $this->mtugas->updatedata($data, $where);

        if($update){
            $respon = array("message" => "Tugas baru berhasil diubah", "status" => "success");
        } else{
            $respon = array("message" => "Tugas baru gagal diubah", "status" => "error");
        }
        echo json_encode($respon);

    }

    function hapus_data(){
        $id_tugas = $this->input->post("id");
        $where   = array("id_tugas" => $id_tugas);
        $tabel   = "m_tugas";
        $hapus   = $this->mtugas->deletedata($tabel, $where);

        if($hapus)
            $respon = array("message" => "Tugas berhasil dihapus", "status" => "success");
        else
            $respon = array("message" => "Tugas gagal dihapus", "status" => "error");

        echo json_encode($respon);
    }
    
    function detail_data(){
        $id_tugas = $this->input->post("id_tugas");
        $data      = $this->mtugas->detail_tugas($id_tugas);

        echo json_encode($data);
    }
    
       //UPLOAD FILE
       public function upload_file()
       {
           if($this->input->get("file")){
               $path = $this->input->get("file");
           } else{
               $path = $_FILES['file_tugas']['name'];
           }
           $ext = pathinfo($path, PATHINFO_EXTENSION);
           $filename = time().".".$ext;

               $config['upload_path']          = './assets/files/tugas/';
               $config['allowed_types']        = 'doc|docx|xls|xlsx|ppt|pptx|pdf|zip|jpeg|jpg|png|gif|svg';
               $config['max_size']             = 7000;
               $config['file_name']            = $filename;
               $this->load->library('upload', $config);
               
               $this->upload->overwrite = true;
           
               if ( ! $this->upload->do_upload('file_tugas'))
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

               unlink("./assets/files/tugas/$file");
               echo json_encode(array("status" => "File berhasil dihapus"));
       
   }
   
}