<!DOCTYPE html>
<html lang="en">
<?php
$this->load->view("public/header");
?>
	<body>
    <div id="wrapper">
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<?php
$this->load->view("public/head");
$this->load->view("public/menu");
?>
	</nav>
<?php
$this->load->view("public/content");
?>
    </div>
    <?php $this->load->view("public/modal");?>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>
    <script src="/assets/js/base.js"></script>
	<script>
        bind_ajax();
	</script>
</body>
</html>