<?php
// include('./include/connection.php');

class Penduduk {
    private $nik;
    private $nama_lengkap;
    private $jenis_kelamin;
    private $tempat_lahir;
    private $tanggal_lahir;
    private $alamat;
    private $status;
    private $berkas;
    private $jenis_berkas;

    function koneksi(){
        $db = new Connection();

        $koneksi = $db->ConnectionMySQLi();

        return $koneksi;
    }

    public function set_nik($nik){
        $this->nik = $nik;
    }

    public function set_nama_lengkap($nama_lengkap){
        $this->nama_lengkap = $nama_lengkap;
    }

    public function set_jenis_kelamin($jenis_kelamin){
        $this->jenis_kelamin = $jenis_kelamin;
    }

    public function set_tempat_lahir($tempat_lahir){
        $this->tempat_lahir = $tempat_lahir;
    }

    public function set_tanggal_lahir($tanggal_lahir){
        $this->tanggal_lahir = $tanggal_lahir;
    }

    public function set_alamat($alamat){
        $this->alamat = $alamat;
    }

    public function set_status($status){
        $this->status = $status;
    }

    public function set_berkas($berkas){
        $this->berkas = $berkas;
    }

    public function set_jenis_berkas($jenis_berkas){
        $this->jenis_berkas = $jenis_berkas;
    }

    public function get_nik(){
        return $this->nik;
    }

    public function get_nama_lengkap(){
        return $this->nama_lengkap;
    }

    public function get_jenis_kelamin(){
        return $this->jenis_kelamin;
    }

    public function get_tempat_lahir(){
        return $this->tempat_lahir;
    }

    public function get_tanggal_lahir(){
        return $this->tanggal_lahir;
    }

    public function get_alamat(){
        return $this->alamat;
    }

    public function get_status(){
        return $this->status;
    }

    public function get_berkas(){
        return $this->berkas;
    }

    public function get_jenis_berkas(){
        return $this->jenis_berkas;
    }

    function get_data_penduduk(){
        $data = [];
        $sql = "SELECT * FROM tb_penduduk";
        $query = $this->koneksi()->query($sql);
        while($row = $query->fetch_array()){
            $data[]  = $row;
        }

        return $data;
    }

    function insert_data_penduduk(){
        $sql = "INSERT INTO tb_penduduk (nik,nama_lengkap,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,status) VALUES ('".$this->get_nik()."','".$this->get_nama_lengkap()."',
                '".$this->get_jenis_kelamin()."','".$this->get_tempat_lahir()."','".$this->get_tanggal_lahir()."','".$this->get_alamat()."','".$this->get_status()."')";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=penduduk&msg=berhasil");
        }else{
            redirectJS("?page=penduduk&msg=gagal");
        }
    }

    function delete_data_penduduk($id){
        $sql = "DELETE FROM tb_penduduk WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=penduduk&msg=berhasil");
        }else{
            redirectJS("?page=penduduk&msg=gagal");
        }
    }

    function edit_data_penduduk($id, $field){
        $sql = "SELECT * FROM tb_penduduk WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);
        $data = $query->fetch_array();

        if($field == "nik"){return $data['nik'];}
        elseif($field == "nama_lengkap"){return $data['nama_lengkap'];}
        elseif($field == "jenis_kelamin"){return $data['jenis_kelamin'];}
        elseif($field == "tempat_lahir"){return $data['tempat_lahir'];}
        elseif($field == "tanggal_lahir"){return $data['tanggal_lahir'];}
        elseif($field == "alamat"){return $data['alamat'];}
        elseif($field == "status"){return $data['status'];}
    }

    function update_data_penduduk($id){
        $sql = "UPDATE tb_penduduk SET nik='".$this->get_nik()."', nama_lengkap='".$this->get_nama_lengkap()."', 
                jenis_kelamin='".$this->get_jenis_kelamin()."', tempat_lahir='".$this->get_tempat_lahir()."', 
                tanggal_lahir='".$this->get_tanggal_lahir()."', alamat='".$this->get_alamat()."', status='".$this->get_status()."' WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        if($query) {
            redirectJS("?page=penduduk&msg=berhasil");
        }else{
            redirectJS("?page=penduduk&msg=gagal");
        }
    }

    function upload_ktp(){
        $lokasi_file    = $_FILES['ktp'] ['tmp_name'];
        $nama_file      = $_FILES['ktp'] ['name'];
        $direktori      = "./uploads/ktp/$nama_file";

        if(!empty($lokasi_file)){
            move_uploaded_file($lokasi_file, $direktori);
            $sql = "INSERT INTO tb_berkas_penduduk (nik, berkas, jenis_berkas) VALUES ('".$this->get_nik()."','".$nama_file."','".$this->get_jenis_berkas()."')";
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas_pribadi&msg=berhasil");
            }else{
                redirectJS("?page=berkas_pribadi&msg=gagal");
            }
        }
    }

    function upload_kk(){
        $lokasi_file    = $_FILES['kk'] ['tmp_name'];
        $nama_file      = $_FILES['kk'] ['name'];
        $direktori      = "./uploads/kk/$nama_file";

        if(!empty($lokasi_file)){
            move_uploaded_file($lokasi_file, $direktori);
            $sql = "INSERT INTO tb_berkas_penduduk (nik, berkas, jenis_berkas) VALUES ('".$this->get_nik()."','".$nama_file."','".$this->get_jenis_berkas()."')";
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas_pribadi&msg=berhasil");
            }else{
                redirectJS("?page=berkas_pribadi&msg=gagal");
            }
        }
    }

    function upload_akte(){
        $lokasi_file    = $_FILES['akte'] ['tmp_name'];
        $nama_file      = $_FILES['akte'] ['name'];
        $direktori      = "./uploads/akte/$nama_file";

        if(!empty($lokasi_file)){
            move_uploaded_file($lokasi_file, $direktori);
            $sql = "INSERT INTO tb_berkas_penduduk (nik, berkas, jenis_berkas) VALUES ('".$this->get_nik()."','".$nama_file."','".$this->get_jenis_berkas()."')";
            $query = $this->koneksi()->query($sql);

            if($query) {
                redirectJS("?page=berkas_pribadi&msg=berhasil");
            }else{
                redirectJS("?page=berkas_pribadi&msg=gagal");
            }
        }
    }

    function get_status_berkas($nik, $jenis_berkas){
        $sql = "SELECT jenis_berkas FROM tb_berkas_penduduk WHERE nik='".$nik."' AND jenis_berkas='".$jenis_berkas."'";
        $query = $this->koneksi()->query($sql);
        $data = $query->fetch_array();
        $row = $query->num_rows;

        // if($row > 0){
            return true;
        // }else {
        //     return 'error';
        // }

    }
}
?>