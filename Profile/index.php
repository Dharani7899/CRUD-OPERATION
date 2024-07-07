<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP CRUD Operation</title>
    <style>
      body {
        background-color: #f8f9fa;
      }
      .modal-header {
        background-color: #007bff;
        color: white;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">STUDENT REGISTRATION FORM</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-primary nav-link active" data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
    <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>Serial No</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>ADDRESS</th>
        <th>ACTIONS</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "connection.php";
        $sql = "SELECT @rownum := @rownum + 1 AS serial_no, t.* FROM crud2 t, (SELECT @rownum := 0) r";
        $result = $conn->query($sql);
        if(!$result){
          die("Invalid query!");
        }
        while($row = $result->fetch_assoc()){
          echo "
      <tr>
        <th>$row[serial_no]</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>
                  <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
                  <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
                </td>
      </tr>
      ";
        }
      ?>
    </tbody>
  </table>
      </div>

    <div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addNewModalLabel">Create New Member</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="addNewForm" class="needs-validation" novalidate>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <div class="invalid-feedback">
                  Please enter a name.
                </div>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <div class="invalid-feedback">
                  Please enter a valid email.
                </div>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
                <div class="invalid-feedback">
                  Please enter a phone number.

                </div>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
                <div class="invalid-feedback">
                  Please enter an address.
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
              form.classList.add('was-validated')
            }, false)
          })
      })();
      $(document).ready(function(){
        $('#name, #email, #phone, #address').on('input', function(){
          $(this).val($(this).val().toUpperCase());
        });

        $('#addNewForm').on('submit', function(e){
          e.preventDefault();
          if (this.checkValidity() === false) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
          }
          $.ajax({
            type: 'POST',
            url: 'create_ajax.php',
            data: $(this).serialize(),
            success: function(response){
              location.reload(); 
            },
            error: function(){
              alert('Error adding new member');
            }
          });
        });
      });
    </script>
  </body>
</html>
