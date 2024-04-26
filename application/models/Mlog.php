<?php
class Mlog extends CI_Model{

    function user_check($username){
		$table = "m_guru" ;
		$check = array("email_guru" => $username, "status_guru" => "Y") ;

      return $this->db->get_where($table, $check);
    }
}
