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

    function get_all_berkas(){
        $data = [];
        $sql = "SELECT * FROM tb_berkas";
        $query = $this->koneksi()->query($sql);
        while($row = $query->fetch_array()){
            $data[] = $row;
        }

        return $data;
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

    function edit_data_berkas($id, $field) {
        $sql = "SELECT * FROM tb_berkas WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);
        $data = $query->fetch_array();

        if($field == "nama_berkas"){return $data['nama_berkas'];}
        elseif($field == "jenis_berkas"){return $data['jenis_berkas'];}
        elseif($field == "berkas_desc"){return $this->get_jenis_berkas_desc($data['jenis_berkas']);}
    }

    function update_data_berkas($id){
        $lokasi_file    = $_FILES['berkas'] ['tmp_name'];
        $nama_file      = $_FILES['berkas'] ['name'];
        $direktori      = "./uploads/$nama_file";
        
        if(!empty($lokasi_file)){
                        
            $cek_file = $this->koneksi()->query("SELECT berkas FROM tb_berkas WHERE id='".$id."'");
            $result = $cek_file->fetch_array();
            $file = $result['berkas'];
            unlink("./uploads/$file");

            move_uploaded_file($lokasi_file, $direktori);
            $sql = "UPDATE tb_berkas SET nama_berkas='".$this->get_nama_berkas()."', jenis_berkas='".$this->get_jenis_berkas()."', berkas='".$nama_file."' WHERE id='".$id."'";
            
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas&msg=berhasil");
            }else{
                redirectJS("?page=berkas&msg=gagal");
            }
        }else {
            $sql = "UPDATE tb_berkas SET nama_berkas='".$this->get_nama_berkas()."', jenis_berkas='".$this->get_jenis_berkas()."' WHERE id='".$id."'";
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas&msg=berhasil");
            }else{
                redirectJS("?page=berkas&msg=gagal");
            }
        }
    }

    function delete_berkas($id){

        $cek_file = $this->koneksi()->query("SELECT berkas FROM tb_berkas WHERE id='".$id."'");
        $result = $cek_file->fetch_array();
        $file = $result['berkas'];
        unlink("./uploads/$file");

        $sql = "DELETE FROM tb_berkas WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=berkas&msg=berhasil");
        }else{
            redirectJS("?page=berkas&msg=gagal");
        }
    }

    function get_all_jenis_berkas(){
        $data = [];
        $sql = 'SELECT * FROM tb_jenis_berkas';
        $query = $this->koneksi()->query($sql);
        while($row = $query->fetch_array()){
            $data[] = $row;
        }

        return $data;
    }

    function get_jenis_berkas_desc($id){
        $sql = "SELECT jenis_berkas FROM tb_jenis_berkas WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        $data = $query->fetch_array();

        return $data['jenis_berkas'];
    }

    function simpan_jenis_berkas(){
        $sql = "INSERT INTO tb_jenis_berkas (jenis_berkas) VALUES ('".$this->get_jenis_berkas()."')";
        $query = $this->koneksi()->query($sql);
        
        if($query) {
            redirectJS("?page=jenis_berkas&msg=berhasil");
        }else{
            redirectJS("?page=jenis_berkas&msg=gagal");
        }
    }

    function update_jenis_berkas($id){
        $sql = "UPDATE tb_jenis_berkas SET jenis_berkas='".$this->get_jenis_berkas()."' WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=jenis_berkas&msg=berhasil");
        }else{
            redirectJS("?page=jenis_berkas&msg=gagal");
        }
    }

    function delete_jenis_berkas($id){
        $sql = "DELETE FROM tb_jenis_berkas WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=jenis_berkas&msg=berhasil");
        }else{
            redirectJS("?page=jenis_berkas&msg=gagal");
        }
    }
}

?>