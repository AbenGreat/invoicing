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
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="/assets/js/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/js/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>
	<script>
	$(".get").unbind().on("click",function() {
		var url = $(this).data("url");
		create_ajax(url,"",$("#content"));
	    });
	var create_ajax = function(url,data,content) {
		var pageContent = content || $("#content-result");
		$.ajax({
		type:"POST",
		url:url,
		data:data,
		dataType:"html",
		cache:false,
		success : function(res) {
                pageContent.html(res);
            },
            error : function(xhr, ajaxOptions, thrownError) {
                pageContent.html('<h4>Could not load the requested content.</h4>');
            }
		});
	}
	
	</script>
</body>
</html>