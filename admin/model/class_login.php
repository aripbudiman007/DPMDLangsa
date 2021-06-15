<?php 
include('../include/connection.php');

class Login{

    private $username;
    private $password;

    public function set_username($username){
      $this->username = $username;
    }
    
    public function set_password($password){
      $this->password = $password;
    }

    public function get_username(){
		  return $this->username;
	  }
	
	  public function get_password(){
		  return $this->password;
	  }

    function koneksi(){
      $db = new Connection();

      $koneksi = $db->ConnectionMySQLi();

      return $koneksi;
  }

    function cek_login(){
		$sql = "SELECT * FROM tb_user WHERE username='".$this->get_username()."'  AND password='".$this->get_password()."'";
		$query = $this->koneksi()->query($sql);
        $row = $query->num_rows;
        
		return $row;
    }

    function get_login($field){
      $sql = "SELECT * FROM tb_user WHERE username='".$this->get_username()."' AND password='".$this->get_password()."'";
      $query = $this->koneksi()->query($sql);
      $data = $query->fetch_array();

      if($field == "username"){return $data['username'];}
      elseif($field == "password"){return $data['password'];}
      elseif($field == "nik"){return $data['nik'];}
      elseif($field == "level"){return $data['level'];}
    }

}
?>