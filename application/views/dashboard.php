<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-user.php'); ?>

<h1>Ini Halaman User</h1>
<a href="<?=base_url('User/logout')?>">Logout</a>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>