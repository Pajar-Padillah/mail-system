<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Halaman Home</title>
  <!-- Bootstrap -->
  <?php $this->load->view('link');?> <!--Include link-->
</head>
<body>
  <?php $this->session->userdata('ses_username');?>
  <?php $this->session->userdata('ses_id');?>
  
  <div class="wrapper-home">
    <?php $this->load->view('menu');?> <!--Include menu-->
    <?php $this->load->view('header');?> <!--Include header-->


    <div class="wrapper-konten">
     
      <div class="row">
        <div class="col-md-4 ">
          <div class="card text-white bg-secondary">
            <div class="card-header ">
              Jumlah Permintaan
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $queryCountPmt->jumlah_permintaan?> Data</h5>

            </div>
            <div class="card-footer text-center text-white">
              <a href="<?php echo base_url('permintaan/diajukan') ?>" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Lihat Data</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 ">
          <div class="card text-white bg-success">
            <div class="card-header">
              Jumlah Wilker
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $queryCountWil->jumlah_wilker ?> Data</h5>


            </div>
             <div class="card-footer text-center">
              <a href="<?php echo base_url('wilker') ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Lihat Data</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 ">
          <div class="card text-white bg-danger">
            <div class="card-header">
              Jenis Sertifikat
            </div>
            <div class="card-body">
              <h5 class="card-title"><?php echo $queryCountJS->jumlah_jenis ?> Data</h5>


            </div>
            <div class="card-footer text-center">
              <a href="<?php echo base_url('jenis_sertifikat') ?>" class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Lihat Data</a>
            </div>
          </div>
        </div>

      </div>

    </div>

    <?php $this->load->view('footer');?> <!--Include footer-->
  </div>

</body>

<?php $this->load->view('javascriptnya');?> <!--Include javascript-->
</html>
