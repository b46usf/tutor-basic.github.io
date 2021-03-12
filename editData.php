<?php 	
include('koneksi.php');
$jalur = new database();
$action = $_GET['action'];
if($action == "editCustomer")
{
    $sqlselect  =   "select * from customer a,alamat b,rekening c 
    where a.uniqID_Customer=b.id_customers and a.uniqID_Customer=c.id_customers and a.uniqID_Customer='".$_POST['dataID']."'";
    $hasil = $jalur->view($sqlselect);
    $response   =   array('status' => 200,'message' => 'View Success.','success' => 'OK','data'=>$hasil);
    echo json_encode($response);
}
?>