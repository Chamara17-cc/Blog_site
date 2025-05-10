<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/create_user_style.css'); ?>" />
  <title>Document</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <?php if ($this->session->flashdata('success')) : ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "<?php echo $this->session->flashdata('success'); ?>",
        confirmButtonText: 'OK'
      });
    </script>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')) : ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: "<?php echo $this->session->flashdata('error'); ?>",
        confirmButtonText: 'OK'
      });
    </script>
  <?php endif; ?>
</head>

<body>
  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
      <?= $this->session->flashdata('error'); ?>
    </div>
  <?php endif; ?>
  <div class="mainclass">
    <section class="h-100 bg-dark">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col">
            <div class="card card-registration my-4">
              <div class="row g-0">
                <div class="col-xl-6 d-none d-xl-block">
                  <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png"
                    alt="Sample photo" class="img-fluid"
                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; " height="1000" />
                </div>
                <div class="col-xl-6">
                  <div class="card-body p-md-5 text-black">
                    <h3 class="mb-5 text-uppercase">Register to YUMMY</h3>
                    <form action="<?= base_url('api/user_controller/storeuser') ?>" method="post" enctype="multipart/form-data">
                      <div class=" row">
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form3Example1m" class="form-control form-control-lg" name="first_name" />
                            <label class="form-label" for="form3Example1m">First name</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form3Example1n" class="form-control form-control-lg" name="last_name" />
                            <label class="form-label" for="form3Example1n">Last name</label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form3Example1m1" class="form-control form-control-lg" name="phone_number" />
                            <label class="form-label" for="form3Example1m1">Phone number</label>
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div data-mdb-input-init class="form-outline">
                            <input type="text" id="form3Example1n1" class="form-control form-control-lg" name="email" />
                            <label class="form-label" for="form3Example1n1">Email Address</label>
                          </div>
                        </div>
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form3Example8" class="form-control form-control-lg" name="aboutme" />
                        <label class="form-label" for="form3Example8">About me</label>
                      </div>

                      <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form3Example8" class="form-control form-control-lg" name="password" />
                        <label class="form-label" for="form3Example8">Password</label>
                      </div>

                      <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                        <h6 class="mb-0 me-4">Gender: </h6>

                        <div class="form-check form-check-inline mb-0 me-4">
                          <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                            value="female" />
                          <label class="form-check-label" for="femaleGender">Female</label>
                        </div>

                        <div class="form-check form-check-inline mb-0 me-4">
                          <input class="form-check-input" type="radio" name="gender" id="maleGender"
                            value="male" />
                          <label class="form-check-label" for="maleGender">Male</label>
                        </div>

                        <div class="form-check form-check-inline mb-0">
                          <input class="form-check-input" type="radio" name="gender" id="otherGender"
                            value="other" />
                          <label class="form-check-label" for="otherGender">Other</label>
                        </div>

                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4">

                          <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" name="state" />
                            <label class="form-label" for="form3Example8">State</label>
                          </div>

                        </div>
                        <div class="col-md-6 mb-4">

                          <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="form3Example8" class="form-control form-control-lg" name="city" />
                            <label class="form-label" for="form3Example8">City</label>
                          </div>

                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="container mt-5">

                            <div class="date_picker">
                              <div class="input-group">
                                <input type="text" class="form-control" id="datepicker" name="dob" placeholder="Select a date" required>
                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                              </div>
                              <label for="datepicker" class="form-label">Date of birth:</label>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <!-- <label for="formFile" class="form-label">Upload Profile Photo</label>
                          <input class="form-control" type="file" id="formFile" name="profile_photo_link"> -->

                          <label for="image-upload">Upload Your Image</label>
                          <div class="file-upload" onclick="document.getElementById('image-upload').click()">
                            <p>Click to upload or drag and drop</p>
                            <input type="file" id="image-upload" name="image" accept="image/*" style="display: none" onchange="previewImage(event)">
                            <img id="image-preview" class="image-preview" style="display: none;">
                          </div>
                        </div>

                        <div class="d-flex justify-content-end pt-3">
                          <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg">Reset all</button>
                          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg ms-2">Submit form</button>
                        </div>

                      </div>
                  </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <script>
    function previewImage(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById('image-preview');
        output.src = reader.result;
        output.style.display = 'block';
      }
      reader.readAsDataURL(event.target.files[0]);
    }

    $(document).ready(function() {
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
      });
    });
  </script>
</body>

</html>