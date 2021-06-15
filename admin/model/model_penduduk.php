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
}
?>