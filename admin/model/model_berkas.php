<?php
include('./include/connection.php');

class Berkas {
    private $nama_berkas;
    private $jenis_berkas;

    function koneksi(){
        $db = new Connection();

        $koneksi = $db->ConnectionMySQLi();

        return $koneksi;
    }
    
    public function set_nama_berkas($nama_berkas){
        $this->nama_berkas = $nama_berkas;
    }

    public function set_jenis_berkas($jenis_berkas){
        $this->jenis_berkas = $jenis_berkas;
    }

    public function get_nama_berkas(){
        return $this->nama_berkas;
    }

    public function get_jenis_berkas(){
        return $this->jenis_berkas;
    }

    function simpan_berkas(){
        $lokasi_file    = $_FILES['berkas'] ['tmp_name'];
        $nama_file      = $_FILES['berkas'] ['name'];
        $direktori      = "./uploads/$nama_file";

        if(!empty($lokasi_file)){
            move_uploaded_file($lokasi_file, $direktori);
            $sql = "INSERT INTO tb_berkas (nama_berkas, jenis_berkas, berkas) VALUES ('".$this->get_nama_berkas()."','".$this->get_jenis_berkas()."','".$nama_file."')";
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas&msg=berhasil");
            }else{
                redirectJS("?page=berkas&msg=gagal");
            }
        }
    }
}

?>