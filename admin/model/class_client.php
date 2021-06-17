<?php

include('./admin/include/connection.php');

class Client{

    function koneksi(){
        $db = new Connection();

        $koneksi = $db->ConnectionMySQLi();

        return $koneksi;
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

    function get_jenis_berkas_desc($id){
        $sql = "SELECT jenis_berkas FROM tb_jenis_berkas WHERE id='".$id."'";
        $query = $this->koneksi()->query($sql);

        $data = $query->fetch_array();

        return $data['jenis_berkas'];
    }

}
?>