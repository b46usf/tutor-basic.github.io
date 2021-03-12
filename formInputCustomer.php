<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Form Input</title>
  </head>
  <body>
<div class="container mt-5">
    <form id="fromCustomer" method="post" action="createData.php?action=addCustomer" class="needs-validation" novalidate>
      <div class="form-row">
          <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input type="hidden" class="form-control" id="inputIDCustomer" name="inputIDCustomer" required>
          <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required>
          <div class="invalid-feedback">Masukan Email.</div>
          </div>
          <div class="form-group col-md-6">
          <label for="inputName">Name</label>
          <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" required>
          <div class="invalid-feedback">Masukan Name.</div>
          </div>
      </div>
      <div class="form-group">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="1234 Main St" required>
          <div class="invalid-feedback">Masukan Address.</div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-3">
          <label for="inputPhone">Phone</label>
          <input type="text" class="form-control" id="inputPhone" name="inputPhone" placeholder="Phone" required>
          <div class="invalid-feedback">Masukan Phone.</div>
          </div>
          <div class="form-group col-md-3">
          <label for="inputBOD">BOD</label>
          <input type="date" class="form-control" id="inputBOD" name="inputBOD" placeholder="BOD" required>
          <div class="invalid-feedback">Masukan BOD.</div>
          </div>
          <div class="form-group col-md-3">
          <label for="inputRekening">Rekening</label>
          <input type="text" class="form-control" id="inputRekening" name="inputRekening" placeholder="Rekening" required>
          <div class="invalid-feedback">Masukan Rekening.</div>
          </div>
          <div class="form-group col-md-3">
          <label for="inputBank">Bank</label>
          <input type="text" class="form-control" id="inputBank" name="inputBank" placeholder="Bank" required>
          <div class="invalid-feedback">Masukan Bank.</div>
          </div>
      </div>
    </form>
    <button onclick="history.back()" class="btn btn-primary btn-back">Back</button>
    <button type="button" class="btn btn-primary btn-save">Save</button>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="crud.js"></script>
  </body>
</html>