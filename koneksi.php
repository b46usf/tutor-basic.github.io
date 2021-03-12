<?php
class database{
    // konfigurasi koneksi
	var $server = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "mini_projek";
    var $koneksi = "";

	function __construct() {
		$this->koneksi = mysqli_connect($this->server, $this->user, $this->pass, $this->db); // setting koneksi
		if(mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

    function view($sql) {
		$data = mysqli_query($this->koneksi,$sql);
        if ($data->num_rows==0) {
            return false;
        } else {
            while($row = mysqli_fetch_array($data)) { 
                $hasil[] = $row;
            }
        }
        // end looping
        return $hasil;
	}

    function insert($sql) {
        $data   = mysqli_query($this->koneksi,$sql);
        if ($data) { return true; } else { return false; }
    }

    function update($sql) {
        $data   = mysqli_query($this->koneksi,$sql);
        if ($data) { return true; } else { return false; }
    }

    function delete($sql) {
        $data   = mysqli_query($this->koneksi,$sql);
        if ($data) { return true; } else { return false; }
    }
}
?>