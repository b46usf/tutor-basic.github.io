<?php 	
include('koneksi.php');
$jalur = new database();
$action = $_GET['action'];
if($action == "addCustomer")
{
    if (!empty($_POST['inputIDCustomer'])) {
        //update customer
        $sqlupdatecustomer = "update customer set email_customer='".$_POST['inputEmail']."',nama_customer='".$_POST['inputName']."',
        bod_customer='".$_POST['inputBOD']."',phone_customer='".$_POST['inputPhone']."' where uniqID_Customer='".$_POST['inputIDCustomer']."'";
        $hasil = $jalur->update($sqlupdatecustomer);

        //update alamat
        $sqlupdateaddress = "update alamat set alamat='".$_POST['inputAddress']."' where id_customers='".$_POST['inputIDCustomer']."'";
        $hasil = $jalur->update($sqlupdateaddress);

        //update rekening
        $sqlupdatebank = "update rekening set nomor_rekening='".$_POST['inputRekening']."',bank_rekening='".$_POST['inputBank']."' where id_customers='".$_POST['inputIDCustomer']."'";
        $hasil = $jalur->update($sqlupdatebank);
    } else {
        $uniqID = 'Cust-'.hash('crc32', $_POST['inputEmail']);
        //insert customer
        $sqlcustomer = "insert into customer (uniqID_Customer,email_customer,nama_customer,bod_customer,phone_customer) 
        values ('$uniqID','".$_POST['inputEmail']."','".$_POST['inputName']."','".$_POST['inputBOD']."','".$_POST['inputPhone']."')";
        $hasil = $jalur->insert($sqlcustomer);

        //insert alamat
        $sqladdress = "insert into alamat (id_customers,alamat) 
        values ('$uniqID','".$_POST['inputAddress']."')";
        $hasil = $jalur->insert($sqladdress);

        //insert rekening
        $sqlbank = "insert into rekening (id_customers,nomor_rekening,bank_rekening) 
        values ('$uniqID','".$_POST['inputRekening']."','".$_POST['inputBank']."')";
        $hasil = $jalur->insert($sqlbank);
    }

    if ($hasil==true) {
        $response   =   array('status' => 200,'message' => 'Save Success.','success' => 'OK','location' => 'index.php');
    } else {
        $response   =   array('status' => 400,'message' => 'Save Error.','success' => 'ERROR');
    }
	echo json_encode($response);
}
if($action == "addProduk")
{
}
?>