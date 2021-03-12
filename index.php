<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Data Customer</title>
  </head>
  <body>
<div class="container mt-5">
<a href="formInputCustomer.php">[+ Add +]</a>
<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Name</th>
        <th scope="col">Alamat</th>
        <th scope="col">Phone</th>
        <th scope="col">Bank</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include('koneksi.php');
        $koneksi = new database();
        //$koneksi = mysqli_connect("localhost","root","","mini_projek");
        $no = 1;
        $sqldata = "select customer.uniqID_Customer,customer.email_customer,customer.nama_customer,alamat.alamat,customer.phone_customer,rekening.bank_rekening 
        from customer,alamat,rekening 
        where customer.uniqID_Customer=alamat.id_customers and rekening.id_customers=customer.uniqID_Customer"; 
        $data_customer = $koneksi->view($sqldata);
        //$data_customer  = mysqli_query($koneksi,$sqldata);
        if(empty($data_customer)) {
  ?>
      <tr><td colspan="7" align="center">Data Tidak Ditemukan</td></tr>     
  <?php        
        }
        else { foreach($data_customer as $baris) {
	?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $baris['email_customer']; ?></td>
				<td><?php echo $baris['nama_customer']; ?></td>
				<td><?php echo $baris['alamat']; ?></td>
				<td><?php echo $baris['phone_customer']; ?></td>
        <td><?php echo $baris['bank_rekening']; ?></td>
				<td>
          <button type="button" class="btn btn-warning btn-update" data-id="<?php echo $baris['uniqID_Customer']; ?>" data-action="editCustomer">Update</button>
          <button type="button" class="btn btn-danger btn-delete" data-id="<?php echo $baris['uniqID_Customer']; ?>" data-action="deleteCustomer">Delete</button>
				</td>
			</tr>
	<?php 
		    }//mysqli_close($koneksi);
        }
	?>    
    </tbody>
  </table>
</div>
</div>
  </body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="crud.js"></script>  
</html>