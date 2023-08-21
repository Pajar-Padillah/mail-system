<div class="wrapper-menu">

  <ul class="menu-sidebar">
    <!--Akses Menu Untuk ADMIN-->
    <?php if ($this->session->userdata('akses') == '1') : ?>

      <div class="data-user">
        <img src="<?php echo base_url() . '/assets/images/gambar1.png' ?>" class="avatar">
        <a href=""></a><i class="" aria-hidden="true"><span><?php echo $this->session->userdata('ses_nama'); ?></span>
          <p> <?php echo 'Admin '; ?></p>
        </i>&nbsp;

      </div>
      <li class="active isi-menu"><a href="<?php echo base_url() . 'home' ?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;<b>Dashboard</b></a></li>

      <button class="dropdown-btn"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;<b>Data Master</b>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <li class="isi-menu"><a href="<?php echo base_url() . 'user' ?>"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;User</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'jenis_sertifikat' ?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;Jenis Sertifikat</a></li>
        <!--  <li class="isi-menu"><a href="<?php echo base_url() . 'jenis_keterangan' ?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;Jenis Keterangan</a></li> -->
        <li class="isi-menu"><a href="<?php echo base_url() . 'status' ?>"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp;Status</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'wilker' ?>"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp;Wilker</a></li>
        <!-- <li class="isi-menu"><a href="<?php echo base_url() . 'masuk' ?>"><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp;Masuk</a></li> -->
        <!-- <li class="isi-menu"><a href="<?php echo base_url() . 'pejabat' ?>"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp;Pejabat</a></li> -->
      </div>



      <button class="dropdown-btn"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;<b>Data Sertifikat</b>
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <!--  <li class="isi-menu"><a href="<?php echo base_url() . 'sertifikat' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Sertifikat</a></li>
      <li class="isi-menu"><a href="<?php echo base_url() . 'sertifikat/sertifikatAll' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Rekap Sertifikat</a></li> -->
        <li class="isi-menu"><a href="<?php echo base_url() . 'permintaan' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Semua Permintaan Masuk</a></li>
        <!-- <li class="isi-menu"><a href="<?php echo base_url() . 'permintaan/diajukan' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Permintaan Masuk</a></li> -->
        <li class="isi-menu"><a href="<?php echo base_url() . 'permintaan/verifikasi' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Diverifikasi</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'masuk' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Transaksi Masuk</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'keluar' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Transaksi Keluar</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'masuk/persediaan' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Laporan Persediaan</a></li>
        <li class="isi-menu"><a href="<?php echo base_url() . 'keluar/transaksi' ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Laporan Transaksi</a></li>
      </div>


      <!-- <li class="isi-menu"><a href="<?php echo base_url() . 'auth/logout' ?>"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;<b>Sign Out</b></a></li> -->



    <?php elseif ($this->session->userdata('akses') == '2') : ?>
      <div class="data-user">
        <img src="<?php echo base_url() . '/assets/images/avatar1.png' ?>" class="avatar">
        <a href=""></a><i class="" aria-hidden="true"><span><?php echo $this->session->userdata('ses_nama'); ?></span>
          <p> <?php echo 'Kantor Pos'; ?></p>
        </i>&nbsp;
      </div>

      <li class="isi-menu"><a href="<?php echo base_url() . 'home2' ?>"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Dashboard</a></li>
      <li class="isi-menu"><a href="<?php echo base_url() . 'jenis_sertifikat' ?>"><i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp;Jenis Sertifikat</a></li>
      <li class="isi-menu"><a href="<?php echo base_url() . 'permintaan/permintaan_wilker' ?>/<?php echo $this->session->userdata('ses_wilker'); ?>"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>&nbsp;Permintaan</a></li>
      <li class="isi-menu"><a href="<?php echo base_url() . 'keluar/transaksi_wilker' ?>/<?php echo $this->session->userdata('ses_wilker'); ?>"><i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>&nbsp;Transaksi Masuk</a></li>

      <!-- <li class="isi-menu"><a href="<?php echo base_url() . 'auth/logout' ?>"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>&nbsp;Sign Out</a></li> -->



    <?php endif; ?>
  </ul>
</div>