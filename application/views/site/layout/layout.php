<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('site/layout/meta-link');?>
</head>
<body>
	<?php $this->load->view('site/layout/navigation');?>
	<?php $this->load->view($main_view); ?>
	<?php $this->load->view('site/layout/footer');?>
</body>
</html>