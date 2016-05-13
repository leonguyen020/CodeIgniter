<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php $this->load->view('admin/layout/head');?>
    </head>
    <body>
        <?php $this->load->view('admin/layout/header');?>
        <?php $this->load->view('admin/layout/aside');?>
        <?php $this->load->view($admin_view); ?>
        <?php $this->load->view('admin/layout/footer');?>
        <?php $this->load->view('admin/layout/control-sidebar');?>
        <?php $this->load->view('admin/layout/script');?>
    </body>
</html>
