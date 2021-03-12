<?php 	
include('koneksi.php');
$jalur = new database();
$action = $_GET['action'];
if($action == "deleteCustomer") {
    //delete customer
    $sqldeletecustomer = "delete from customer where uniqID_Customer='".$_POST['dataID']."'";
    $hasil = $jalur->delete($sqldeletecustomer);

    //delete alamat
    $sqldeleteaddress = "delete from alamat where id_customers='".$_POST['dataID']."'";
    $hasil = $jalur->delete($sqldeleteaddress);

    //delete rekening
    $sqldeletebank = "delete from rekening where id_customers='".$_POST['dataID']."'";
    $hasil = $jalur->delete($sqldeletebank);
    if ($hasil==true) {
        $response   =   array('status' => 200,'message' => 'Delete Success.','success' => 'OK','location' => 'index.php');
    } else {
        $response   =   array('status' => 400,'message' => 'Delete Error.','success' => 'ERROR');
    }
	echo json_encode($response);
}
?>