<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Halaman Login</title>
<?php $this->load->view('link');?> <!--Include link-->

</head>
<body class="s">


	

		<?php echo form_open("auth/cek_login"); ?>
			<div class="wrapper-l">

			
        <p class="login-gambar"><img src="<?php echo base_url().'assets/images/logo.png'?>" width="150" height="100"></p>
          <p class="login-text">Badan Karantina Pertanian Lampung</p>
				<div class="input-group flex-nowrap mb-3">
           
				  <span class="input-group-text" ><i class="fa fa-user" aria-hidden="true"></i></span>
				  <input type="text" name="username" id="username " class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
				</div>
				<div class="input-group flex-nowrap mb-3">
				  <span class="input-group-text" ><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
				  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
				</div>
			
     
        <button name="submit" class="btn  btn-login">LOGIN</button>
    
				
         
       
				
				
		</div>

<?php echo form_close(); ?>		

	





 <!-- <script>
      $(document).ready(function() {

        $(".btn-login").click( function() {
        
          var username = $("#username").val();
          var password = $("#password").val();

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username Wajib Diisi !'
            });

          } else if(password.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password Wajib Diisi !'
            });

          } else {

            $.ajax({

              url: "<?php echo base_url() ?>auth/cek_login",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo base_url() ?>index.php/dashboard";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });


                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }

            });

          }

        }); 

      });
    </script> -->

</body>
<?php $this->load->view('javascriptnya');?> <!--Include javascript-->

</html>