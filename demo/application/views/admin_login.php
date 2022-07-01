<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LMS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style-LoginPage.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="global-container">
        <div class="card shadow login-form">
          <div class="card-body">
            <div class="logo">
              <img
                src="<?php echo base_url(); ?>assets/Img/logo-full.png"
                class="img-fluid"
                width="150"
                alt="logo"
              />
            </div>
            <br>
            <h5 class="card-title text-center">Leave Management System</h5>
            <h6 class="card-title text-center">Admin Login</h6>
            <div class="card-text">
              <div id="error"></div>
              <form action="#" method="post" id="FormLogin">
                <div class="form-group">
                  <label>Email address</label>
                  <input
                    type="email"
                    class="form-control form-control-sm"
                    id="email" name="email"
                    placeholder="Enter your email"
                    required
                  />
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input
                    type="password"
                    class="form-control form-control-sm"
                    id="password" name="password"
                    placeholder="Enter your password"
                    required
                  />
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <div class="col">
                      <button
                        type="submit"
                        name="signin"
                        class="btn btn-primary btn-block"
                      >
                        Login
                      </button>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(function () {
        $.validator.setDefaults({
          submitHandler: function () {
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax
              ({
                type: "POST",
                url: "<?php echo base_url(); ?>auth_controller/admin_login",
                data: {
                  "email": email,
                  "password": password
                },
                success: function(data) {
                  if(data =='success')
                  window.location.href= "<?php echo base_url(); ?>admin/dashboard";
                  else if(data == 'invalid_password')
                  $('#error').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid password</div>');
                  else if(data == 'not_exist')
                  $('#error').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Credentials.</div>');
                }
              });
          }
        });
        $('#FormLogin').validate({
          rules: {
            email: {
              required: true,
              email: true,
            },
            password: {
              required: true,
              minlength: 4
            },
          },
          messages: {
            email: {
              required: "Please enter a email address",
              email: "Please enter a vaild email address"
            },
            password: {
              required: "Please provide a password",
              minlength: "Your password must be at least 5 characters long"
            },
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
      });
    </script>
  </body>
</html>