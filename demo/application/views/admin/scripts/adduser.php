<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script>
      $(function () {
        $.validator.setDefaults({
          submitHandler: function () {
            var email = $('#email').val();
            var password = $('#password').val();
            $.ajax
              ({
                type: "POST",
                url: "<?php echo base_url(); ?>auth_controller/login",
                data: {
                  "email": email,
                  "password": password
                },
                success: function(data) {
                  if(data =='success')
                  window.location.href= "<?php echo base_url(); ?>admin/dashboard";
                  else if(data == 'ok')
                  window.location.href= "<?php echo base_url(); ?>employee/dashboard";
                  else if(data == 'invalid_password')
                  $('#error').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid password</div>');
                  else if(data == 'not_exist')
                  $('#error').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Invalid Credentials.</div>');
                }
              });
          }
        });
        $('#add_user').validate({
          rules: {
            emp_name: {
              required: true,
            },
            emp_email: {
              required: true,
              email: true,
            },
            emp_password: {
              required: true,
              minlength: 4
            },
          },
          messages: {
            emp_name: {
              required: "Please enter Name",
            },
            emp_email: {
              required: "Please enter a email address",
              email: "Please enter a vaild email address"
            },
            emp_password: {
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
    