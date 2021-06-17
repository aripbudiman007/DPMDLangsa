<?php 
include('../include/connection.php');

class Login{

    private $username;
    private $password;
    private $nik;

    public function set_username($username){
        $this->username = $username;
    }
    
    public function set_password($password){
        $this->password = $password;
    }

    public function set_nik($nik) {
        $this->nik = $nik;
    }

    public function get_username(){
		return $this->username;
	}
	
	public function get_password(){
		return $this->password;
	}

    public function get_nik(){
        return $this->nik;
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

    function cek_user(){
        $sql = "SELECT * FROM tb_penduduk WHERE nik='".$this->get_nik()."'";
        $query = $this->koneksi()->query($sql);
        $row = $query->num_rows;

        if($row === 0){
            $msg = "Nik Belum Terdaftar Pada Sistem Kami";
            redirectJS("register.php?status=failed&msg=$msg");
        }else {
            $sql = "SELECT * FROM tb_user WHERE nik='".$this->get_nik()."'";
            $query = $this->koneksi()->query($sql);
            $row = $query->num_rows;

            if($row > 0){
                $msg = "Nik Sudah Terdaftar";
                redirectJS("register.php?status=failed&msg=$msg");
            }else {
                $sql = "SELECT * FROM tb_user WHERE username='".$this->get_username()."'";
                $query = $this->koneksi()->query($sql);
                $row = $query->num_rows;

                if($row > 0){
                    $msg = "Username Sudah Terdapat";
                    redirectJS("register.php?status=failed&msg=$msg");
                }else {
                    $this->register();
                }
            }
        }
        
    }


    function register(){
        $status = 1;
        $level = 2;
        $sql = "INSERT INTO tb_user(username,password,nik,level,status) VALUES('".$this->get_username()."','".$this->get_password()."','".$this->get_nik()."','".$level."','".$status."')";
        $query = $this->koneksi()->query($sql);

        if($query) {
            $msg = "Pendaftaran Berhasil";
            redirectJS("login.php?status=success&msg=$msg");
        }else{
            $msg = "Maaf Terjadi Kesalahan";
            redirectJS("login.php?status=failed&msg=$msg");
        }
    }
}
?>